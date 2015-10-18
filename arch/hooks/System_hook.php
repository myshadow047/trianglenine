<?php

class System_hook {

    function post_controller_constructor() {
        $CI = &get_instance();
        if (method_exists($CI, '_post_controller_constructor')) {
            $CI->_post_controller_constructor();
        }
    }

    function post_controller() {
        $CI = &get_instance();
        if (method_exists($CI, '_post_controller')) {
            $CI->_post_controller();
        }
        trans_complete();
    }

    function pre_controller() {
        global $IN, $CFG;

        $CFG->load('app');
        if (!$IN->is_cli_request()) {
            if (empty($CFG->config['cookie_path'])) {
                $t = explode($_SERVER['HTTP_HOST'], $CFG->config['base_url']);
                $cookie_path = rtrim($t[1], '/');
                $CFG->set_item('cookie_path', ($cookie_path == '') ? '/' : $cookie_path);
            }
        }

        include APPPATH . 'config/' . ENVIRONMENT . '/database.php';
        $CFG->set_item('use_db', isset($db));
    }

    function display_override() {
        $CI = &get_instance();
        if (isset($CI->chandler)) {
            $CI->chandler->display_output();
        }
    }

}

