<?php

class base_sys_controller extends app_base_controller {

    function error() {
        $sq = (empty($_GET['continue'])) ? '' : '?'.$_GET['continue'];
        redirect('user/login'.$qs);
    }

    function set_lang($lang) {
        $this->lang->set_language($lang);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function cache_clean() {
        $this->cache->clean();
    }

    function _check_access() {
        $allows = array(
            'error',
            'set_lang',
        );
        if (in_array($this->uri->rsegments[2], $allows)) {
            return true;
        }
        return parent::_check_access();
    }

}