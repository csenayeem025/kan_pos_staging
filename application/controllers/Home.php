<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

        //$data['datetime'] = $this->home_model->get_datetime();
        $data['title'] = 'News archive';

        $this->load->view('templates/header-top', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function login() {
        redirect('/users/login');
    }

}
