<?php

class chandler_default extends CI_Driver {
	function on_restricted() {
		redirect($this->ci->auth->login_page());
        // redirect('user/unauthorized?continue='.current_url());
	}

	function display_output() {
		if (empty($this->ci->_view)) {
            $this->ci->_view = $this->ci->_name . '/' . $this->ci->uri->rsegments[2];
        }
        if (!$this->ci->input->is_ajax_request() && !empty($this->ci->_layout_view)) {
            $view = $this->ci->_layout_view;
        } else {
            $view = $this->ci->_view;
        }
        $this->ci->_data['CI'] = $this->ci;
        $this->ci->load->view($view, $this->ci->_data, false);

		$this->ci->output->_display($this->ci->output->get_output());
	}
}