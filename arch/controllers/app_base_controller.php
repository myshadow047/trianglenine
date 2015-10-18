<?php

if (!class_exists('app_base_controller')) {

    class app_base_controller extends base_controller {

        function _post_controller_constructor() {
            parent::_post_controller_constructor();

            if (!isset($this->admin_panel)) {
                $this->load->library('xmenu', null, 'admin_panel');
            }
        }
    }

}

