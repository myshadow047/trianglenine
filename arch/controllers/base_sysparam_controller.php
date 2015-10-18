<?php

class base_sysparam_controller extends app_crud_controller {

    function _config_grid() {
        $config = parent::_config_grid();
        $config['fields']    = array('sgroup', 'skey', 'svalue', 'lvalue');
        $config['names']    = array('Group', 'Key', 'Short Value', 'Long Value');
        return $config;
    }

}