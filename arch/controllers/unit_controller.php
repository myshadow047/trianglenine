<?php

class unit_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('unit_test');

        $this->load->helper('x');
    }

    function _post_controller() {
        echo $this->unit->report();
    }

    function &_model($name = '') {
        if (empty($name)) {
            $remove_pkg = false;
            $name = $this->_name;
        } else {
            $remove_pkg = true;
            if (file_exists(APPMODPATH . $name . '/models/' . $name . '_model.php')) {
                $this->load->add_package_path(APPMODPATH . $name);
            } elseif (file_exists(ARCHMODPATH . $name . '/models/' . $name . '_model.php')) {
                $this->load->add_package_path(ARCHMODPATH . $name);
            }
        }
        $model_name = $name . '_model';
        $this->load->model($model_name);
        return $this->$model_name;
    }

    function index() {
        $methods = get_class_methods($this);
        foreach($methods as $method) {
            if (strpos($method, 'test_') === 0) {
                echo '<fieldset>';
                echo '<legend>Running '.$method."...</legend>\n";
                echo '<pre style="padding: 0; margin: 0">';
                $this->$method();
                echo '</pre>';
                echo '</fieldset>';
            }
        }

    }

}
