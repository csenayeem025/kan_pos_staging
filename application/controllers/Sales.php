<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public $domain;

    function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->load->model('supplier_model');
        $this->load->model('stores_model');
        $this->load->model('categories_model');
        $this->load->model('products_model');
        $this->load->model('products_type');
        $this->load->model('company_type');
        $this->load->model('customer_type');
        $this->load->model('customers_model');
        $this->load->model('purchase_model');
        $this->load->model('purchasehistory_model');
        $this->domain = ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != 'localhost:8888') ? $_SERVER['HTTP_HOST'] : false;
    }

    public function index() {
        redirect('/admin/banglalogin');
    }

    public function onLogCheck() {
        /* need in all pages for this controller */
        //print_r($_SESSION);
        //die();
        if (isset($_SESSION['MusicUsers_user_id']) && !empty($_SESSION['MusicUsers_user_id'])):

            $user_id = $_SESSION['MusicUsers_user_id'];
            $username = $_SESSION['MusicUsers_username'];
            $full_name = $_SESSION['MusicUsers_full_name'];
            $user_type = $_SESSION['MusicUsers_user_type'];
            $email = $_SESSION['MusicUsers_email'];

            if (isset($_SESSION['MusicUsers_sImage']) && !empty($_SESSION['MusicUsers_sImage'])):
                $sImage = 'avatar2.png';
            else:
                $sImage = $_SESSION['MusicUsers_sImage'];
            endif;

            $data = (array('user_id' => $user_id, 'username' => $username, 'full_name' => $full_name, 'user_type' => $user_type));
        else:
            redirect('/admin/banglalogin');
        endif;
        /* need in all pages for this controller */
    }

    public function reviewSalesTable() {
        $this->onLogCheck();
        echo 'reviewSalesTable';
        die();
    }

}
