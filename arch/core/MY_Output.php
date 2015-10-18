<?php

class MY_Output extends CI_Output {
    function __construct(){
        $this->_zlib_oc = @ini_get('zlib.output_compression');

        include ARCHPATH.'config/mimes.php';

        $this->mime_types = $mimes;

        log_message('debug', "Output Class Initialized");
    }

    function get_mime_type($extension) {
        $mime = (!empty($this->mime_types[$extension])) ? $this->mime_types[$extension] : '';
        if (is_array($mime)) {
            $mime = $mime[0];
        }

        if (empty($mime)) {
            $mime = 'text/html';
        }
        return $mime;
    }
}