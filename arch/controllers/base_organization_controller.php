<?php

class base_organization_controller extends app_crud_controller {

    function __construct() {
        parent::__construct();

        $this->_validation = array(
            'add' => array(
                array(
                    'field' => 'name',
                    'label' => l('Company Name'),
                    'rules' => 'required',
                ),
                array(
                    'field' => 'email',
                    'label' => l('Email'),
                    'rules' => 'valid_email',
                ),
            ),
        );
    }

    function _config_grid() {
        $config = parent::_config_grid();
        $config['fields']    = array('name', 'address', 'phone', 'fax', 'email', 'website');
        $config['formats']    = array('row_detail', '', '', '', '', 'url');
        return $config;
    }

    function _save($id = null) {
        if ($_POST) {
            if (is_array($_POST['address'])) {
                $_POST['address'] = trim(implode("\n", $_POST['address']));
            }
        }

        parent::_save($id);

        if (isset($_POST['address']) && !is_array($_POST['address'])) {
            $_POST['address'] = explode("\n", $_POST['address']);
        }
    }

}

