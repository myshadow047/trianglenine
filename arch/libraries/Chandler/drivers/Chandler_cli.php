<?php

class chandler_cli extends CI_Driver {
    function on_restricted() {
        echo 'Unable to run on restricted module';
        exit;
    }

    function display_output() {

    }
}