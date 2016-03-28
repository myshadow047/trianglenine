<?php

class product extends app_crud_controller {

    function _config_grid() {
        $fields = array_keys($this->_model($this->_name)->list_fields(true));
        $config = array(
            'fields' => $fields,
            'formats' => array('', '', 'param_short', '', '', 'callback__plain_text'),
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
            $config['upload_path'] = 'data/product/image';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if (!file_exists('./data/product/image')) {
                mkdir('./data/product/image', 0755, true);
            }

            $_POST['id'] = $id;
            $_POST['product_identifier'] = url_title($_POST['product_name']);

            try {
                $id = $this->_model()->save($_POST, $id);

                if ($_FILES['images']['name'][0] ) {
                    foreach ($_FILES as $k => $file) {
                        $this->upload->do_upload('images');
                        $images = $this->upload->data();
                    }

                    foreach ($images as $image) {
                        $data = array(
                            'product_id' => $id,
                            'image_name' => $image['file_name']
                        );
                        $this->_model()->before_save($data);
                        $this->db->insert('product_image', $data);
                    }
                }

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
        } else {
            $product_category = $this->db->query('SELECT * FROM product_category WHERE status = ?', array(1))->result_array();
            $data_category = array(
                '' => 'Select Product Category'
            );
            foreach ($product_category as $key => $value) {
                $data_category[$value['product_category_identifier']] = $value['product_category_name'];
            }
            $this->_data['product_category'] = $data_category;

            $printing_type = $this->db->query('SELECT * FROM printing_type WHERE status = ?', array(1))->result_array();
            $data_printing = array(
                '' => 'Select Printing Type'
            );
            foreach ($printing_type as $key => $value) {
                $data_printing[$value['printing_type_identifier']] = $value['printing_type_name'];
            }
            $this->_data['printing_type'] = $data_printing;

            $printing_name = $this->db->query('SELECT * FROM printing WHERE status = ?', array(1))->result_array();
            $data_printing_name = array(
                '' => 'Select Printing Name'
            );
            foreach ($printing_name as $key => $value) {
                $data_printing_name[$value['printing_identifier']] = $value['printing_name'];
            }
            $this->_data['printing_name'] = $data_printing_name;

            if ($id !== null) {
                $this->_data['id'] = $id;

                $this->_data['images'] = $this->db->query('SELECT * FROM product_image WHERE product_id = ?', array($id))->result_array();

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

    function delete_one_image($id, $product_id) {
        $data = $this->db->get_where('product_image', array('id' => $id))->row_array();

        unlink('data/product/image/' . $data['image_name']);

        $this->db->delete('product_image', array('id' => $id));

        redirect('product/edit/' . $product_id);
    }

}