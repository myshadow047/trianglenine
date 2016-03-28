<?php

if (!class_exists('app_crud_controller')) {
    class app_crud_controller extends crud_controller {

        function _plain_text($value) {
            return word_limiter(strip_tags($value), 20);
        }

    }
}
