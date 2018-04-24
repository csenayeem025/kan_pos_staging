<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        //error_report(0);
        // echo dirname(__FILE__);
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->model('news_model');
        //$this->load->model('home_model');
        //$this->load->model('category_model');
    }

    public function index() {
        redirect('/home/index');
    }
    
    public function login() {

        //$data['datetime'] = $this->home_model->get_datetime();
        $data['title'] = 'News archive';

        $this->load->view('templates/header_login', $data);
        $this->load->view('users/index', $data);
        $this->load->view('templates/footer_login', $data);
    }

}
