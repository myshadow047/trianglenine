<?php
/**
 * Description of price *
 * @author generator
 */

class price extends app_crud_controller {

    function _config_grid() {
        $fields = array_keys($this->_model($this->_name)->list_fields(true));
        $config = array(
            'fields' => $fields,
            'formats' => array('callback__plain_text'),
            'sorts' => $fields,
            'show_checkbox' => false,
            'actions' => array(
                'edit' => $this->_get_uri('edit')
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
            $config['upload_path'] = 'data/price/image';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);

            if (!file_exists('./data/price/image')) {
                mkdir('./data/price/image', 0755, true);
            }

            $_POST['id'] = $id;

            try {
                $id = $this->_model()->save($_POST, $id);

                if ($_FILES['image']['name'][0] ) {
                    foreach ($_FILES as $k => $file) {
                        $this->upload->do_upload('image');
                        $images = $this->upload->data();
                    }

                    foreach ($images as $image) {
                        $data = array(
                            'price_id' => $id,
                            'image' => $image['file_name']
                        );
                        $this->_model()->before_save($data);
                        $this->db->insert('price_image', $data);
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
            if ($id !== null) {
                $this->_data['id'] = $id;

                $this->_data['images'] = $this->db->query('SELECT * FROM price_image WHERE price_id = ?', array($id))->result_array();

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
        $data = $this->db->get_where('price_image', array('id' => $id))->row_array();

        unlink('data/price/image/' . $data['image']);

        $this->db->delete('price_image', array('id' => $id));

        redirect('price/edit/' . $product_id);
    }

}
