<?php

class web extends app_crud_controller {

    function __construct() {
        parent::__construct();

        $this->_layout_view = 'layouts/web';
    }

    function _check_access() {
        return true;
    }

    function index() {

    }

    function about() {

    }

    function portfolio() {

    }

    function journal() {

    }

    function journal_detail() {

    }

    function product($category = null, $product_name = null) {

        if (is_null($category) && is_null($product_name)) {
            redirect(base_url());
        }

        if (!is_null($category) && is_null($product_name)) {
            $this->_view = $this->_name . '/product_by_category';
        } else {
            $this->_view = $this->_name . '/product_detail';
        }
    }

    function printing($printing_type = null, $printing_name = null, $product_name = null) {

        if (is_null($printing_type) && is_null($printing_name)) {
            redirect(base_url());
        }

        if (!is_null($printing_type) && is_null($printing_name) && is_null($product_name)) {
            $this->_view = $this->_name . '/printing';
        } else if (!is_null($printing_type) && !is_null($printing_name) && is_null($product_name)) {
            $this->_view = $this->_name . '/product_by_printing';
        } else {
            $this->_view = $this->_name . '/product_detail';
        }
    }

    function order_and_price() {

    }
}
