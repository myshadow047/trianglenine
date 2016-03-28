<?php

class order extends app_crud_controller {

    function _config_grid() {
        $fields = array_keys($this->_model($this->_name)->list_fields(true));
        $config = array(
            'fields' => $fields,
            'formats' => array('row_detail'),
            'sorts' => $fields,
            'actions' => array(),
        );

        if ($this->CAN_DELETE) {
            $config['actions']['delete'] = $this->_get_uri('delete');
        }

        return $config;
    }

    function _save($id = null) {
        if ($_POST) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['upload_path'] = 'data/order/image';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if (!file_exists('./data/order/image')) {
                mkdir('./data/order/image', 0777, true);
            }

            $_POST['id'] = $id;
            try {
                /* Generate Code */
                if (is_null($id)) {
                    $date = (array) new DateTime();

                    $count = $this->db->query('SELECT * FROM `order` WHERE status = ?', array(1))->result_array();
                    $seq = count($count);
                    if ($seq === 0) {
                        $seq = 1;
                    } else {
                        $seq = $seq + 1;
                    }

                    $length = strlen($seq);
                    if ($length == 1) {
                        $seq = '00'.$seq;
                    } else if ($length == 2) {
                        $seq = '0'.$seq;
                    }

                    $day = date('d');
                    $month = date('m');

                    $_POST['code'] = 'TR-'.$seq.'-'.$day.$month;
                }

                $id = $this->_model()->save($_POST, $id);

                $this->session->set_userdata('last_insert', $id);
                $this->session->set_userdata('code', $_POST['code']);

                if (array_filter($_FILES['image']['name'])) {
                    foreach ($_FILES as $k => $file) {
                        $this->upload->do_upload('image');
                        $images = $this->upload->data();
                    }


                    foreach ($images as $image) {
                        $data = array(
                            'order_id' => $id,
                            'image' => $image['file_name']
                        );
                        $this->_model()->before_save($data);

                        $this->db->trans_start();
                        $this->db->insert('order_image', $data);
                        $this->db->trans_complete();
                    }
                }

                $referrer = site_url('web/confirmation_page');

                if (!$this->input->is_ajax_request()) {
                    redirect(site_url('web/confirmation_page'));
                }
            } catch (Exception $e) {
                add_error(l($e->getMessage()));
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

    function _check_access() {
        $allowed = array(
            'add'
        );
        foreach ($allowed as $allow) {
            if ($this->uri->rsegments[2] == $allow) {
                return true;
            }
        }
        return parent::_check_access();
    }

    function detail($id) {
        $this->load->helper('format');
        $this->_data['fields'] = $this->_model()->list_fields(true);
        $data = $this->_model()->get($id);

        $images = $this->db->query('SELECT * FROM order_image WHERE order_id = ?', array($id))->result_array();
        $data['images'] = $images;

        $this->_data['data'] = $data;
    }

}