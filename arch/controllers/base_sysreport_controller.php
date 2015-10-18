<?php

class base_sysreport_controller extends app_crud_controller {

    function report() {
        if (!empty($_POST)) {
            $this->_model()->save($_POST);
        }
        exit;
    }

    function _check_access() {
        if ($this->uri->rsegments[2] == 'report') {
            return true;
        }
        return parent::_check_access();
    }
}
