<?php

class web extends app_crud_controller {

    function __construct() {
        parent::__construct();

        $this->_layout_view = 'layouts/web';

        $location = $this->_model()->_db()->query('SELECT * FROM location WHERE status = ?', array(1))->result_array();
        if ($location) {
            $location = array_chunk($location, 2);
        }
        $this->_data['locations'] = $location;

        $product_category = $this->_model()->_db()->query('SELECT * FROM product_category WHERE status = ?', array(1))->result_array();
        $this->_data['product_category'] = $product_category;

        $printing_type = $this->_model()->_db()->query('SELECT * FROM printing_type WHERE status = ?', array(1))->result_array();
        $this->_data['printing_types'] = $printing_type;

        $this->load->helper('format');


        $this->load->library('googlemaps');
        $config['center'] = '-6.239249, 106.980341';
        $config['zoom'] = '15';
        $config['map_type'] = 'ROADMAP';
        $config['zoomControlStyle'] = 'SMALL';
        $config['disableStreetViewControl'] = 'TRUE';
        $config['disableMapTypeControl'] = 'TRUE';
        $config['disableNavigationControl'] = 'TRUE';
        $config['styles'] = array(
          array("name"=>"Trianglenine", "definition"=>array(
            // array("featureType"=>"water", "stylers"=>array(array("color"=>"#f9f9f9"))),
            array("featureType"=>"landscape", "elementType"=>"geometry.fill", "stylers"=>array(array("color"=>"#e2e3e3"))),
            // array("featureType"=>"road", "stylers"=>array(array("color"=>"#c5c5c7"))),
          ))
        );
        $config['stylesAsMapTypes'] = 'TRUE';
        $config['stylesAsMapTypesDefault'] = "Trianglenine";
        $this->googlemaps->initialize($config);

        $locations = $this->_model()->_db()->query('SELECT * FROM location WHERE status = ?', array(1))->result_array();
        foreach ($locations as $key => $location) {
            $marker['position'] = $location['coordinate'];
            $content =  '<div><p style="margin: 0; font-size: 13px;font-family: Abel; text-transform: uppercase">'.$location['location_name'].'</p><p style="color: #c5c5c7; font-size: 13px;font-family: Abel; margin: 0">'.$location['address'].'</p></div>';
            $marker['infowindow_content'] = $content;
            $marker['animation'] = 'DROP';
            $this->googlemaps->add_marker($marker);
        }
        $this->googlemaps->add_marker($marker);
        $this->_data['map'] = $this->googlemaps->create_map();
    }

    function _check_access() {
        return true;
    }

    function index() {
        $banner = $this->getDataBanner();
        $portfolio = $this->getDataPortfolio();

        $product_category = $this->_model()->_db()->query('SELECT * FROM product_category WHERE status = ?', array(1))->result_array();
        $products = array();
        foreach ($product_category as $key => $value) {
            $get_data = $this->db->query('SELECT * FROM product WHERE product_category = ? AND status = 1 LIMIT 4', array($value['product_category_name']))->result_array();
            foreach ($get_data as $k => $product) {
                $get_data[$k]['images'] = $this->db->query('SELECT * FROM product_image WHERE product_id = ? AND status = 1 LIMIT 1', array($product['id']))->row_array();
            }
            $products[$value['product_category_name']] = $get_data;
        }

        $this->_data['products'] = $products;
        $this->_data['home_banner'] = $banner;
        $this->_data['portfolio'] = $portfolio;
    }

    function getDataBanner() {
        $banner = $this->db->query('SELECT * FROM home_banner WHERE status = ?', array(1))->result_array();

        return $banner;
    }

    function about() {
        $about = $this->db->query('SELECT * FROM about WHERE status = ?', array(1))->row_array();

        $this->_data['about'] = $about;
    }

    function portfolio() {
        $portfolio = $this->getDataPortfolio();

        $this->_data['portfolio'] = $portfolio;
    }

    function getDataPortfolio() {
        $portfolio = $this->db->query('SELECT * FROM portfolio WHERE status = ?', array(1))->result_array();

        return $portfolio;
    }

    function journal($category = null, $title = null) {
        $data_journal = array();

        if (is_null($category) && is_null($title)) {
            $data_journal = $this->db->query('SELECT * FROM journal WHERE status = ?', array(1))->result_array();
        } else if (!is_null($category) && is_null($title)) {
            $data_journal = $this->db->query('SELECT * FROM journal WHERE status = ? AND category = ?', array(1, $category))->result_array();
        } else if (!is_null($category) && !is_null($title)) {
            $this->_view = $this->_name . '/journal_detail';
            $data_journal = $this->db->query('SELECT * FROM journal WHERE status = ? AND category = ? AND identifier = ?', array(1, $category, $title))->row_array();
        }

        $this->_data['data_journal'] = $data_journal;
        $this->_data['journal_category'] = $this->getJournalCategory();
        $this->_data['recent'] = $this->getRecent();
    }

    function getRecent() {
        $recent = $this->db->query('SELECT * FROM journal WHERE status = ? LIMIT 5', array(1))->result_array();

        return $recent;
    }

    function getJournalCategory() {
        $getJournal = $this->db->query('SELECT * FROM journal_category WHERE status = ?', array(1))->result_array();

        return $getJournal;
    }

    function journal_detail() {
        $this->_data['journal_category'] = $this->getJournalCategory();
        $this->_data['recent'] = $this->getRecent();
    }

    function product($category = null, $product_identifier = null) {

        if (is_null($category) && is_null($product_identifier)) {
            redirect(base_url());
        }

        if (!is_null($category) && is_null($product_identifier)) {
            $products = $this->db->query('SELECT * FROM product WHERE product_category = ? AND status = 1', array($category))->result_array();
            foreach ($products as $key => $product) {
                $products[$key]['images'] = $this->db->query('SELECT * FROM product_image WHERE product_id = ? AND status = 1 LIMIT 1', array($product['id']))->row_array();
            }
            $this->_data['products'] = $products;
            $this->_data['category'] = $category;

            $this->_view = $this->_name . '/product_by_category';
        } else {
            $products = $this->db->query('SELECT * FROM product WHERE product_identifier = ? AND status = 1', array($product_identifier))->row_array();
            $products['images'] = $this->db->query('SELECT * FROM product_image WHERE product_id = ? AND status = 1', array($products['id']))->result_array();

            $this->_data['products'] = $products;

            $this->_view = $this->_name . '/product_detail';
        }
    }

    function printing($printing_type = null, $printing_name = null, $product_identifier = null) {

        if (is_null($printing_type) && is_null($printing_name)) {
            redirect(base_url());
        }


        if (!is_null($printing_type) && is_null($printing_name) && is_null($product_identifier)) {
            $data = $this->db->query('SELECT * FROM printing WHERE printing_type = ? AND status = 1', array($printing_type))->result_array();
            $this->_data['printing'] = $data;
            $this->_data['printing_type'] = $printing_type;

            $this->_view = $this->_name . '/printing';
        } else if (!is_null($printing_type) && !is_null($printing_name) && is_null($product_identifier)) {
            $data = $this->db->query('SELECT * FROM product WHERE printing_type = ? AND printing_name = ? AND status = 1', array($printing_type, $printing_name))->result_array();
            foreach ($data as $key => $product) {
                $data[$key]['images'] = $this->db->query('SELECT * FROM product_image WHERE product_id = ? AND status = 1 LIMIT 1', array($product['id']))->row_array();
            }
            $this->_data['printing'] = $data;

            $this->_data['printing_type'] = $printing_type;
            $this->_data['printing_name'] = $printing_name;

            $this->_view = $this->_name . '/product_by_printing';
        } else {
            $products = $this->db->query('SELECT * FROM product WHERE product_identifier = ? AND status = 1', array($product_identifier))->row_array();
            $products['images'] = $this->db->query('SELECT * FROM product_image WHERE product_id = ? AND status = 1', array($products['id']))->result_array();

            $this->_data['products'] = $products;

            $this->_view = $this->_name . '/product_detail';
        }
    }

    function order_and_price() {
        $images = array();

        $data = $this->db->query('SELECT * FROM price WHERE status = 1')->row_array();
        if ($data) {
            $images = $this->db->query('SELECT * FROM price_image WHERE price_id = ? AND status = 1', array($data['id']))->result_array();
        }

        $this->_data['data'] = $data;
        $this->_data['images'] = $images;
    }

    function confirmation_page () {
        $last_data = $this->session->userdata('last_insert');
        $code = $this->session->userdata('code');

        $this->_data['code']= $code;
    }
}
