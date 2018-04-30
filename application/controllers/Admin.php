<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $domain;

    function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        $this->domain = ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != 'localhost:8888') ? $_SERVER['HTTP_HOST'] : false;
    }

    public function index() {
        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Home | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function banglaadmin() {
        
        if (isset($_SESSION['MusicUsers_user_id']) && !empty($_SESSION['MusicUsers_user_id'])):
            if ($_SESSION['MusicUsers_user_type'] == 'client'):

            endif;
        endif;
        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Dashboard | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer_admin', $data);
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

    public function banglalogin() {
        //echo '<pre>';
        //print_r($_SESSION);
        if (isset($_SESSION['MusicUsers_user_id']) && !empty($_SESSION['MusicUsers_user_id'])):
            redirect('/admin/banglaadmin');
        endif;
        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Login | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        
        $this->load->view('templates/header_login', $data);
        $this->load->view('admin/login', $data);
        $this->load->view('templates/footer_login', $data);
    }

    public function logout() {
        /*
          $this->session->unset_userdata('MusicUsers_user_id');
          $this->session->unset_userdata('MusicUsers_username');
          $this->session->unset_userdata('MusicUsers_full_name');
          $this->session->unset_userdata('MusicUsers_user_type');
          $this->session->unset_userdata('MusicUsers_email');
          $this->session->unset_userdata('MusicUsers_sImage'); */

        $this->session->sess_destroy();
        redirect('/admin/banglalogin');
    }

    public function check_userlogin() {
        $data = array();


        if (!empty($this->input->post('username'))):
            $users = $this->admin_model->get_user_by_username($this->input->post('username'));
            //print_r($users);
            //die();

            if (count($users) > 0):
                //$rowpassword = '5317a859e86d441cdbf9d09554b9a176:WnvTroeiBmd5bjGmmsVUnNjppadH7giK';
                $password = $this->input->post('password');
                //print_r($users);
                $users = $users[0];
                $rowpassword = $users['password'];

                $systempass = $rowpassword;
                $dummysalt = explode(':', $systempass);

                $saltpass = $dummysalt[1];

                $encpass = sha1(sha1($password) . sha1($saltpass));
                $encpass = $encpass . ':' . $saltpass;

                if ($systempass === $encpass) {
                    $data['success'] = true;
                    $data['msg'] = 'Successfully logged in.';

                    $this->session->set_userdata('MusicUsers_user_id', $users['user_id']);
                    $this->session->set_userdata('MusicUsers_username', $users['username']);
                    $this->session->set_userdata('MusicUsers_full_name', $users['full_name']);
                    $this->session->set_userdata('MusicUsers_user_type', $users['user_type']);
                    $this->session->set_userdata('MusicUsers_email', $users['email']);
                    $this->session->set_userdata('MusicUsers_sImage', $users['sImage']);
                } else {
                    $data['success'] = false;
                    $data['msg'] = 'Wrong password, please try again.';
                }
            else:
                $data['success'] = false;
                $data['msg'] = 'User not exist, please try again.';
            endif;
        else:
            $data['success'] = false;
            $data['msg'] = 'Server Processing error, please try again.';
        endif;
        echo json_encode($data);
        //echo '<pre>';
        //print_r($_SESSION);
    }

    public function onGetMyprofile() {

        //echo $_SESSION['MusicUsers_email'];
        $user = $this->admin_model->onGetMyprofile($_SESSION['MusicUsers_email']);
        if (count($user) > 0)
            $user = $user[0];
        $user['success'] = true;
        echo json_encode($user);
    }

    public function services() {

        $this->onLogCheck();
        
        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Services | '.$settings[0]['sitename'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/services', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function addupdateservice() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Add/Update | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/addupdateservice', $data);
        $this->load->view('templates/footer_admin', $data);
    }
    
    public function customers() {

        $this->onLogCheck();
        
        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Services | '.$settings[0]['sitename'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/customers', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function addupdatecustomer() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Add/Update | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/addupdatecustomer', $data);
        $this->load->view('templates/footer_admin', $data);
    }
    
    public function stores() {

        $this->onLogCheck();
        
        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Services | '.$settings[0]['sitename'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/stores', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function addupdatestore() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Add/Update | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/addupdatestore', $data);
        $this->load->view('templates/footer_admin', $data);
    }
    
    public function suppliers() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Suppliers | '.$settings[0]['sitename'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/suppliers', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function addupdatesupplier() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Add/Update | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/addupdatesupplier', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function myprofile() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'My Profile | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/myprofile', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function settings() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Settings | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/settings', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function users() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Users | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function addupdateuser() {

        $this->onLogCheck();

        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Add/Update |  '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/addupdateuser', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function updateMyprofile() {

        $data = array();

        if (!empty($this->input->post())):
            $data['full_name'] = $this->input->post('full_name');
            $data['phone'] = $this->input->post('phone');
            $data['address'] = $this->input->post('address');
            $message = $this->admin_model->updateMyprofile($_SESSION['MusicUsers_user_id'], $data);

            //setcookie("MusicUsers_full_name", empty($this->request->data['full_name']) ? 'Your Name' : $this->request->data['full_name'], strtotime('+1 days'), '/',$this->domain);
            $cookie = array(
                'name' => 'MusicUsers_full_name',
                'value' => empty($this->input->post('full_name')) ? 'Your Name' : $this->input->post('full_name'),
                'expire' => strtotime('+1 days'),
                'secure' => TRUE
            );
            $this->input->set_cookie($cookie);
            $data['success'] = true;
            $data['msg'] = 'Successfully stored in our system.';
        else:
            $data['success'] = false;
            $data['msg'] = 'Server Processing error, please try again.';
        endif;
        echo json_encode($data);
    }

    public function updateSettings() {

        $data = array();

        if (!empty($this->input->post())):
            /* check is valid user */
            $user = $this->admin_model->onGetMyprofile($_SESSION['MusicUsers_email']);
            if (count($user) > 0)
                $user = $user[0];

            if ($this->input->post('newpassword') != $this->input->post('re_newpassword')):
                $data['success'] = false;
                $data['msg'] = 'Sorry, newpassword and re-type password not match.';
            else:
                if (count($user) > 0):
//$rowpassword = '5317a859e86d441cdbf9d09554b9a176:WnvTroeiBmd5bjGmmsVUnNjppadH7giK';
                    $password = $this->input->post('password');
                    $rowpassword = $user['password'];

                    $systempass = $rowpassword;
                    $dummysalt = explode(':', $systempass);

                    $saltpass = $dummysalt[1];

                    $encpass = sha1(sha1($password) . sha1($saltpass));
                    $encpass = $encpass . ':' . $saltpass;

                    if ($systempass === $encpass) :
                        /* check is valid user */
                        $password = $this->input->post('newpassword');
                        $saltpass = $this->generateToken(32);
                        $token = $saltpass;
                        $password = sha1(sha1($password) . sha1($saltpass)) . ':' . $saltpass;
                        /* ==Save Data== */
                        $datanew['password'] = $password;
                        $message = $this->admin_model->updateSettings($_SESSION['MusicUsers_user_id'], $datanew);

                        $data['success'] = true;
                        $data['msg'] = 'Successfully stored in our system.';
                    else:
                        $data['success'] = false;
                        $data['msg'] = 'Sorry, current password not match.';
                    endif;
                else:
                    $data['success'] = false;
                    $data['msg'] = 'Sorry, no such user.';
                endif;
            endif;

        else:
            $data['success'] = false;
            $data['msg'] = 'Server Processing error, please try again.';
        endif;
        echo json_encode($data);
    }

    public function onGetSettings() {
        $data = $this->admin_model->onGetSettings();
        if (count($data) > 0)
            $data = $data[0];

        $data['success'] = true;
        echo json_encode($data);
    }

    public function updateMySettings() {

        $data = array();

        if (!empty($this->input->post())):
            /* ==Save Data== */
            $datanew = array();
            $datanew['sitename'] = $this->input->post('sitename');
            $datanew['email'] = $this->input->post('email');
            $datanew['address'] = $this->input->post('address');
            $datanew['hotline'] = $this->input->post('hotline');
            $datanew['phone'] = $this->input->post('phone');
            $datanew['topslogan'] = $this->input->post('topslogan');
            /* $datanew['openinghour'] = $this->input->post('openinghour');
              $datanew['facebook'] = $this->input->post('facebook');
              $datanew['twitter']= $this->input->post('twitter');
              $datanew['linkedin'] = $this->input->post('linkedin');
              $datanew['youtube'] = $this->input->post('youtube');
              $datanew['gplus'] = $this->input->post('gplus');
              $datanew['footerfblink'] = $this->input->post('footerfblink');
              $datanew['fb_app_id'] = $this->input->post('fb_app_id');
              $datanew['fb_pages'] = $this->input->post('fb_pages'); */
            $datanew['descriptions'] = $this->input->post('descriptions');
            $datanew['copyright'] = $this->input->post('copyright');
            //$datanew['twitter_site'] = $this->input->post('twitter_site');
            $datanew['GA_ID'] = $this->input->post('GA_ID');
            $datanew['keywords'] = $this->input->post('keywords');

            $this->admin_model->updateMySettings($datanew);
            $data['success'] = true;
            $data['msg'] = 'Successfully stored in our system.';
        else:
            $data['success'] = false;
            $data['msg'] = 'Server Processing error, please try again.';
        endif;
        echo json_encode($data);
    }

    public function userProcessing($action = null) {
        $data = array();

        $sSearch = $_POST['sSearch'];
        $limit = $_POST['iDisplayLength'];
        $offset = $_POST['iDisplayStart'];
        
        $conditions = array();

        if (isset($sSearch) && !empty($sSearch)):
            $like=$sSearch;
            $quizMasterTotal = $this->user_model->get_all_users('','',$like);
            $quizQuestions = $this->user_model->get_all_users($limit, $offset,$like); 
        
        else:
            $quizMasterTotal = $this->user_model->get_all_users();
            $quizQuestions = $this->user_model->get_all_users($limit, $offset); 
        endif;

        $totalTotal = count($quizMasterTotal);
        $total = count($quizQuestions);
        $data['sEcho'] = intval($_POST['sEcho']);
        $data['iTotalRecords'] = $total;
        $data['iTotalDisplayRecords'] = $totalTotal;

        $f = 0;
        $serial = $_POST['iDisplayStart'] + 1;

        foreach ($quizQuestions as $value) {

            $rowData = array();
            $rowData[0] = $value['user_id'];
            $rowData[1] = $serial;
            $rowData[2] = $value['username'];
            $rowData[3] = $value['email'];
            $rowData[4] = $value['user_type'];
            $rowData[5] = '';
            $rowData[6] = $value['isActive'];

            $x = "<img class='pEdit' src='" . base_url() . "assets/images/i_edit.png' />";
            if( $value['user_type']!='Admin')
                $x .= "<img class='pDrop' src='" . base_url() . "assets/images/i_drop.png' />";

            $rowData[7] = $x;
            $rowData[8] = $value['full_name'];
            $rowData[9] = $value['phone'];


            $data['aaData'][] = $rowData;
            $serial++;
        }/// end of while()
        if ($total == 0)
            $data['aaData'] = array();
        echo json_encode($data);
    }
    
    public function userSaveUpdate() {
        
        $data = 0;
        $users = (object) array();
        if (!empty($this->input->post())):
            $post = array();
            $newpassword=$this->input->post('newpassword');
            if (isset($newpassword)&&!empty($newpassword)):
                $password = $this->input->post('newpassword');
                $saltpass = $this->generateToken(32);
                $token = $saltpass;
                $password = sha1(sha1($password) . sha1($saltpass)) . ':' . $saltpass;
                $post['password'] = $password;
            endif;
            $checking=$this->input->post('id');
            if (isset($checking)&&!empty($checking)):
                $post['user_id'] = $this->input->post('id');
            endif;
            //print_r($post);
            //echo 0;
            //die();
            $post['full_name'] = $this->input->post('full_name');
            $post['phone'] = $this->input->post('phone');
            $post['user_type'] = $this->input->post('user_type');
            $post['email'] = $this->input->post('email');
            $post['username'] = $this->input->post('email');
            $post['isActive'] = $this->input->post('isActive');
            //print_r($users);
            //die();
            $this->user_model->addupdate_user($post);
            $data = 1;
        else:
            $data = 0;
        endif;
        echo $data;
    }

    public function onGetCurrentFormEditData(){
        $user = $this->user_model->get_user_data_all($this->input->post('contentid'));
        if (count($user) > 0)
            $user = $user[0];
        $user['success'] = true;
        echo json_encode($user);
    }
    
    public function onDeleteUser() {
        $data= 0;
         if (!empty($this->input->post())):
            $this->user_model->delete_user($this->input->post('id'));
            $data= 1;
        else:
            $data= 0;
        endif;
        echo $data;
    }
    
    public function fileupload() {

        $action = $_GET['action'];
        if ($action == "avatarfileupload"):
            $image_info = getimagesize($_FILES["image"]["tmp_name"]);
            $image_size = $_FILES["image"]["size"];
            $image_width = $image_info[0];
            $image_height = $image_info[1];

            $responseObj = (Object) array(
                        'status' => false,
                        'error' => 'Invalid file type.',
                        'imgurl' => ''
            );

            if ($image_size < 5050000 && $image_size != 0 && $image_width <= 6000 && $image_height <= 6000) {
                $sImage = 'avatars-' . (time() + 1) . '.jpg';
                /**
                 * SERVER IMAGE SETUP
                 */
                $targetFolder = $targetPath = realpath('uploads/avatars'); // Relative to the root                    

                if ($_FILES['image']['tmp_name'] != '') {
                    $tempFile = $_FILES['image']['tmp_name'];
                    $filename = $sImage;
                    $targetFile = rtrim($targetPath) . '/' . $filename;

                    move_uploaded_file($tempFile, $targetFile);
                }
                $imgurl = 'uploads/avatars/' . $filename;
                $responseObj = (Object) array(
                            'status' => true,
                            'imgurl' => $imgurl
                );
                /* ==Save Data== */
                $message = $this->admin_model->update_avater($_SESSION['MusicUsers_user_id'], $filename);

                //setcookie("MusicUsers_sImage", empty($filename) ? 'Your Name' : $filename, strtotime('+1 days'), '/',$this->domain);
                $cookie = array(
                    'name' => 'MusicUsers_sImage',
                    'value' => empty($filename) ? 'Your Name' : $filename,
                    'expire' => strtotime('+1 days'),
                    'secure' => TRUE
                );
                $this->input->set_cookie($cookie);
            } else {
                $responseObj = (Object) array(
                            'status' => false,
                            'error' => 'Your image size is large. Image size will be max 5MB and 6000X6000 px.'
                );
            } elseif ($action == "logofileupload"):
            $image_info = getimagesize($_FILES["image"]["tmp_name"]);
            $image_size = $_FILES["image"]["size"];
            $image_width = $image_info[0];
            $image_height = $image_info[1];

            $responseObj = (Object) array(
                        'status' => false,
                        'error' => 'Invalid file type.',
                        'imgurl' => ''
            );

            if ($image_size < 5050000 && $image_size != 0 && $image_width <= 6000 && $image_height <= 6000) {

                if ($_GET['localData'] == ''):
                    $sImage = 'logo.png';
                elseif ($_GET['localData'] == 1):
                    $sImage = 'magazine-logo.png';
                elseif ($_GET['localData'] == 2):
                    $sImage = 'footer-logo.png';
                else:
                    $sImage = 'other.png';
                endif;
                /**
                 * SERVER IMAGE SETUP
                 */
                $targetFolder = $targetPath = realpath('uploads/filemanager'); // Relative to the root                    

                if ($_FILES['image']['tmp_name'] != '') {
                    $tempFile = $_FILES['image']['tmp_name'];
                    $filename = $sImage;
                    $targetFile = rtrim($targetPath) . '/' . $filename;

                    move_uploaded_file($tempFile, $targetFile);
                }
                $imgurl = 'uploads/filemanager/' . $filename;
                $responseObj = (Object) array(
                            'status' => true,
                            'imgurl' => $imgurl
                );
                /* ==Save Data== */
                if ($_GET['localData'] == ''):
                    $message = $this->admin_model->update_adminlogo($imgurl);


                elseif ($_GET['localData'] == 1):

                    $message = $this->admin_model->update_favicon($imgurl);

                    
                elseif ($_GET['localData'] == 2):

                    $message = $this->music_settings->get(1);
                    $message->footer_logo = $imgurl;

                    $this->music_settings->save($message);

                endif;

                //echo Router::url('/', true) . 'uploads/avatars/pesbd_avater.png';
            } else {
                $responseObj = (Object) array(
                            'status' => false,
                            'error' => 'Your image size is large. Image size will be max 5MB and 6000X6000 px.'
                );
            } elseif ($action == "trackfileupload"):
            $image_info = getimagesize($_FILES["image"]["tmp_name"]);
            $image_size = $_FILES["image"]["size"];
            //$image_width = $image_info[0];
            //$image_height = $image_info[1];

            $responseObj = (Object) array(
                        'status' => false,
                        'error' => 'Invalid file type.',
                        'imgurl' => ''
            );

            if ($image_size < 16050000 && $image_size != 0) {
                $sImage = 'audio_file-' . (time() + 1) . '.mp3';
                /**
                 * SERVER IMAGE SETUP
                 */
                $targetFolder = $targetPath = realpath('uploads/mp3songs'); // Relative to the root                    

                if ($_FILES['image']['tmp_name'] != '') {
                    $tempFile = $_FILES['image']['tmp_name'];
                    $filename = $sImage;
                    $targetFile = rtrim($targetPath) . '/' . $filename;

                    move_uploaded_file($tempFile, $targetFile);
                }
                $imgurl = 'uploads/mp3songs/' . $filename;
                $responseObj = (Object) array(
                            'status' => true,
                            'imgurl' => $imgurl
                );

                //echo Router::url('/', true) . $imgurl;
            } else {
                $responseObj = (Object) array(
                            'status' => false,
                            'error' => 'Your image size is large. Image size will be max 5MB and 6000X6000 px.'
                );
            } elseif ($action == "featurefileupload"):
            $image_info = getimagesize($_FILES["image"]["tmp_name"]);
            $image_size = $_FILES["image"]["size"];
            $image_width = $image_info[0];
            $image_height = $image_info[1];

            $responseObj = (Object) array(
                        'status' => false,
                        'error' => 'Invalid file type.',
                        'imgurl' => ''
            );

            if ($image_size < 5050000 && $image_size != 0 && $image_width <= 6000 && $image_height <= 6000) {
                $sImage = 'featuregallery-' . (time() + 1) . '.jpg';
                /**
                 * SERVER IMAGE SETUP
                 */
                $targetFolder = $targetPath = realpath('uploads/featuregallery'); // Relative to the root                    

                if ($_FILES['image']['tmp_name'] != '') {
                    $tempFile = $_FILES['image']['tmp_name'];
                    $filename = $sImage;
                    $targetFile = rtrim($targetPath) . '/' . $filename;

                    move_uploaded_file($tempFile, $targetFile);
                }
                $imgurl = 'uploads/featuregallery/' . $filename;
                $responseObj = (Object) array(
                            'status' => true,
                            'imgurl' => $imgurl
                );

                //echo Router::url('/', true) . $imgurl;
            } else {
                $responseObj = (Object) array(
                            'status' => false,
                            'error' => 'Your image size is large. Image size will be max 5MB and 6000X6000 px.'
                );
            } elseif ($action == "newsfileupload"):

        elseif ($action == "filemanagerupload"):

        elseif ($action == "cvupload"):

        else:
            $responseObj = (Object) array(
                        'status' => true,
                        'imgurl' => Router::url('/', true) . 'uploads/cvupload/pesbd_avater.png'
            );

        endif;
        echo json_encode($responseObj);
    }

    public function generateToken($length = 10) {
        $possible = '0123456789abcdefghijklmnopqrstuvwxyz';
        $token = "";
        $i = 0;

        while ($i < $length) {
            $char = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            if (!stristr($token, $char)) {
                $token .= $char;
                $i++;
            }
        }
        return $token;
    }

}
