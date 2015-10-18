<?php

class MY_URI extends CI_URI {
	var $extension = '';
	var $original_uri = '';

	function _set_uri_string($str) {
		$this->original_uri = $str;

		$pos = strrpos($str, '.');
		$this->extension = pathinfo($str, PATHINFO_EXTENSION);
		$rpos = strrpos($str, '.');
		if ($rpos !== FALSE) {
			$str = substr($str, 0, $rpos);
		}
		parent::_set_uri_string($str);
	}
}