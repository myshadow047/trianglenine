<?php

class portfolio extends app_crud_controller {

    function _config_grid() {
        $fields = array_keys($this->_model($this->_name)->list_fields(true));
        $config = array(
            'fields' => $fields,
            'formats' => array('', 'param_short'),
            'sorts' => $fields,
            'actions' => array(
                'edit' => $this->_get_uri('edit'),
                'trash' => $this->_get_uri('trash')
            ),
        );

        if ($this->CAN_DELETE) {
            $config['actions']['delete'] = $this->_get_uri('delete');
        }

        return $config;
    }

    function _save($id = null) {
        $this->_view = $this->_name . '/show';

        if ($_POST) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['upload_path'] = 'data/portfolio/logo';

            if (!file_exists('./data/portfolio/logo')) {
                mkdir('./data/portfolio/logo', 0755, true);
            }

            if (!empty($_FILES['logo']['name'])) {
                $_FILES['logo']['name'] = urlencode(str_replace(' ', '_', trim($_FILES['logo']['name'])));
                $config['field'] = 'logo';
                $this->load->library('upload', $config);
            }

            if ($this->_validate()) {
                if (!empty($_FILES['logo']['name'])) {
                    $image = $this->upload->data();
                    $_POST['logo'] = $image[0]['file_name'];
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
        $data = $this->db->get_where('portfolio', array('id' => $id))->row_array();

        unlink('data/portfolio/logo/' . $data['logo']);

        $image = array('logo' => '');

        $this->db->where('id', $id);
        $this->db->update('portfolio', $image);
        redirect('portfolio/edit/' . $id);
    }
}