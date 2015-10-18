<?php

class base_tag_controller extends app_crud_controller {
    function _config_grid() {
        $config = parent::_config_grid();
        $config['fields'] = array('name');
        return $config;
    }
}
