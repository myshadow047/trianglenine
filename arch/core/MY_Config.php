<?php

class MY_Config extends CI_Config {

    function __construct() {
        parent::__construct();
        $this->_config_paths = array(APPPATH, ARCHPATH);
    }

}
