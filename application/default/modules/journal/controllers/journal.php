<?php

class journal extends app_crud_controller {

    function _config_grid() {
        $fields = array_keys($this->_model($this->_name)->list_fields(true));
        $config = array(
            'fields' => $fields,
            'formats' => array('', '', '', '', 'callback__plain_text'),
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
            $config['upload_path'] = 'data/journal/image';

            if (!file_exists('./data/journal/image')) {
                mkdir('./data/journal/image', 0755, true);
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
                $_POST['identifier'] = url_title($_POST['title']);

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
            $category = $this->db->query('SELECT * FROM journal_category WHERE status = ?', array(1))->result_array();
            $data_category = array(
                '' => 'Select Journal Category'
            );
            foreach ($category as $key => $value) {
                $data_category[$value['identifier']] = $value['name'];
            }
            $this->_data['category'] = $data_category;

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
        $data = $this->db->get_where('journal', array('id' => $id))->row_array();

        unlink('data/journal/image/' . $data['image']);

        $image = array('image' => '');

        $this->db->where('id', $id);
        $this->db->update('journal', $image);
        redirect('journal/edit/' . $id);
    }

}