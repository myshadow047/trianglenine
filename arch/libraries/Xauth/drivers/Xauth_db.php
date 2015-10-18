<?php

require_once (ARCHPATH.'/libraries/Xauth/base_xauth.php');

class Xauth_db extends base_xauth {
	function try_login($login, $password) {
        $user = $this->ci->_model('user')->get_login(array('login' => $login, 'password' => $password));
        if (!empty($user)) {
            $user['login_mode'] = 'db';
        }
        return $user;
    }

    function try_logout() {
    }

    function privilege($uri, $user_id = '') {
        $result = ($this->ci->_model('user')->privilege($uri->rsegments[1] . '/' . $uri->rsegments[2], $user_id) || $this->ci->_model('user')->privilege($uri->uri_string, $user_id));
        return ($result) ? 1 : 0;
    }

    function login_page($continue = '') {
    }

    function is_login() {
        return true;
    }
}