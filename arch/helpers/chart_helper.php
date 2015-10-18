<?php

if (!function_exists('chart_load')) {
    function chart_load() {
        static $loaded = false;

        $CI = &get_instance();

        if ($loaded) {
            return;
        }
        $loaded = true;
        return $CI->load->view('helpers/chart_load', array(), true);
    }
}

if (!function_exists('chart_hbar')) {

    function chart_hbar($data, $options = array()) {

        static $loaded = 0;
        static $default_options = array(
            'height' => 250,
        );

        $CI = &get_instance();

        $html = chart_load();

        foreach($default_options as $key => $value) {
            if (empty($options[$key])) {
                $options[$key] = $value;
            }
        }

        $config = array(
            'data' => $data,
            'options' => $options,
            'loaded' => $loaded++,
            'uniqid' => uniqid('chart_hbar_'),
        );

        $html .= $CI->load->view('helpers/chart_hbar', $config, true);
        return $html;
    }

}