<?php

class printing extends app_crud_controller {

    function _save($id = null) {
        $this->_view = $this->_name . '/show';

        if ($_POST) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['upload_path'] = 'data/printing/image';

            if (!file_exists('./data/printing/image')) {
                mkdir('./data/printing/image', 0755, true);
            }

            if (!empty($_FILES['image']['name'])) {
                $_FILES['image']['name'] = urlencode(str_replace(' ', '_', trim($_FILES['image']['name'])));
                $config['field'] = 'image';
                $this->load->library('upload', $config);
            }

            if ($this->_validate()) {
                if (!empty($_FILES['image']['name'])) {
                    $image = $this->upload->data();
                    $_POST['image'] = $image[0]['file_name'];
                }

                $_POST['id'] = $id;
                $_POST['printing_identifier'] = url_title($_POST['printing_name']);

                try {
                    $this->_model()->save($_POST, $id);
                    $referrer = $this->session->userdata('referrer');
                    if (empty($referrer)) {
                        $referrer = $this->_get_uri('listing');
                    }

                    add_info( ($id) ? l('Record updated') : l('Record added') );

                    if (!$this->input->is_ajax_request()) {
                        redirect($referrer);
                    }
                } catch (Exception $e) {
                    add_error(l($e->getMessage()));
                }
            }
        } else {
            $printing_type = $this->db->query('SELECT * FROM printing_type WHERE status = ?', array(1))->result_array();
            $p_type = array('' => 'Select printing type');
            foreach ($printing_type as $key => $pr) {
                $p_type[$pr['printing_type_identifier']] = $pr['printing_type_name'];
            }
            $this->_data['printing_type'] = $p_type;

            if ($id !== null) {
                $this->_data['id'] = $id;
                $_POST = $this->_model()->get($id);
                if (empty($_POST)) {
                    show_404($this->uri->uri_string);
                }
            }
            $this->load->library('user_agent');
            $this->session->set_userdata('referrer', $this->agent->referrer());
        }
        $this->_data['fields'] = $this->_model()->list_fields(true);
    }

    function delete_one_image($id) {
        $data = $this->db->get_where('printing', array('id' => $id))->row_array();

        unlink('data/printing/image/' . $data['image']);

        $image = array('image' => '');

        $this->db->where('id', $id);
        $this->db->update('printing', $image);
        redirect('printing/edit/' . $id);
    }
}
