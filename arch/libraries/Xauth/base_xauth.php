<?php

abstract class base_xauth extends CI_Driver {
	function __construct() {
		$ci = &get_instance();
		$ci->load->config('xauth', true);
		$config = $ci->config->item('xauth');

		$class = str_replace('xauth_', '', get_class($this));

		foreach($config as $key => $value) {
			if (isset($this->$key) && strpos($key, $class) === 0) {
				$this->$key = $value;
			}
		}
	}
	abstract function try_login($login, $password);
	abstract function try_logout();
	abstract function login_page($continue = '');
	abstract function privilege($uri, $user_id = '');
	abstract function is_login();
}