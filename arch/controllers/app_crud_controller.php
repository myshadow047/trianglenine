<?php

if (!class_exists('app_crud_controller')) {

    class app_crud_controller extends crud_controller {

        function _save($id = null) {
            $this->_view = $this->_name . '/show';

            if ($_POST) {
                if ($this->_validate()) {
                    $_POST['id'] = $id;
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
                $this->_data['program_studi'] = $this->_model('mahasiswa')->get_program_studi();
                $this->_data['jurusan'] = $this->_model('mahasiswa')->get_jurusan();
                $this->_data['kampus'] = $this->_model('mahasiswa')->get_kampus();
                $this->_data['dosen'] = $this->_model('mahasiswa')->get_dosen();
                $this->_data['mata_kuliah'] = $this->_model('mahasiswa')->get_mata_kuliah();

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
    }

}
