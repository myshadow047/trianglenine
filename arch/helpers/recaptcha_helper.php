<?php

if (!function_exists('recaptcha_get_html')) {

    function recaptcha_get_html() {
        $CI = &get_instance();
        $CI->load->library('recaptcha');
        $CI->lang->load('recaptcha');
        return $CI->recaptcha->get_html();
    }

}
