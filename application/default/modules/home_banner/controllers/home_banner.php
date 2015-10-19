<?php

class home_banner extends app_crud_controller {

    function _save($id = null) {
        $this->_view = $this->_name . '/show';

        if ($_POST) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['upload_path'] = 'data/home_banner/image';

            if (!file_exists('./data/home_banner/image')) {
                mkdir('./data/home_banner/image', 0755, true);
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

                try {
                    $this->_model()->save($_POST, $id);
                    $referrer = '';
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
        $data = $this->db->get_where('home_banner', array('id' => $id))->row_array();

        unlink('data/home_banner/image/' . $data['image']);

        $image = array('image' => '');

        $this->db->where('id', $id);
        $this->db->update('home_banner', $image);
        redirect('home_banner/edit/' . $id);
    }

}