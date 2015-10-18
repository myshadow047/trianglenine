<?php

class task_scheduler extends App_Crud_Controller {

    function _config_grid() {
        $config = parent::_config_grid();
        $config['formats'] = array();
        return $config;
    }

    function _save($id = null) {
        if ($_POST) {
            $_POST['next_time'] = $this->_model()->get_next_time($_POST);
        }
        parent::_save($id);
    }

    function cron() {
        $this->_model()->cron();
        exit;
    }

}
