<?php

class MY_Log extends CI_Log {
	function get_log_path() {
        return $this->_log_path;
    }
}