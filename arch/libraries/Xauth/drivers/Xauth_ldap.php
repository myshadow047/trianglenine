<?php

require_once (ARCHPATH.'/libraries/Xauth/base_xauth.php');

class xauth_ldap extends base_xauth {

	function try_login($login, $password) {
        // check password to ldap
        $user = $this->ci->_model('user')->get_by_username($login);

        if (empty($user)) {
            return false;
        }

        try {
            $this->ci->load->library('xldap');
            $this->ci->xldap->auth($user['username'], $password);
            $user['login_object'] = $this->ci->xldap->get_user($user['username']);
        } catch (Exception $e) {
            return false;
        }

        if (!empty($user)) {
            $user['login_mode'] = 'ldap';
        }
        return $user;
    }

    function try_logout() {
    }

    function login_page($continue = '') {
    }

    function is_login() {
        return true;
    }

    function privilege($uri, $user_id = '') {
        return -1;
    }

}