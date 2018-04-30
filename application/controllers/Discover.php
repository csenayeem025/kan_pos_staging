<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Discover extends CI_Controller {

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
        $this->domain = ($_SERVER['HTTP_HOST'] != 'localhost' && $_SERVER['HTTP_HOST'] != 'localhost:8888') ? $_SERVER['HTTP_HOST'] : false;
    }

    public function index() {
        $settings = $this->admin_model->get_app_settings();
        $data['title'] = 'Home | '.$settings[0]['sitename'];
        $data['favicon'] = $settings[0]['favicon'];
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('discover/index', $data);
        $this->load->view('templates/footer_admin', $data);
    }

    public function discoverPageProcessing($action = null) {
        
        $data = array();

        $sSearch = $_POST['sSearch'];
        $limit = $_POST['iDisplayLength'];
        $offset = $_POST['iDisplayStart'];
        $conditions = array();
        $currentLang='en';

        if ($this->input->post('page_category') == 'suppliers'):
            $conditions = array();

            if (isset($sSearch) && !empty($sSearch)):
                $like = $sSearch;
                $quizMasterTotal = $this->supplier_model->get_all_data('', '', $like);
                $quizQuestions = $this->supplier_model->get_all_data($limit, $offset, $like);

            else:
                $quizMasterTotal = $this->supplier_model->get_all_data();
                $quizQuestions = $this->supplier_model->get_all_data($limit, $offset);
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
                $rowData[0] = $value['id'];
                $rowData[1] = $serial;
                $rowData[2] = $value['name'];
                $rowData[3] = $value['slug'];
                $rowData[4] = $value['supplier_code'];
                $rowData[5] = '';
                $rowData[6] = $value['details'];
                $rowData[7] = $value['isActive'];

                $x = "<img class='pEdit' src='" . base_url() . "assets/images/i_edit.png' />";
                $x .= "<img class='pDrop' src='" . base_url() . "assets/images/i_drop.png' />";


                $rowData[8] = $x;
                $rowData[9] = '';
                $rowData[10] = $value['email'];
                $rowData[11] = $value['phone'];
                $rowData[12] = $value['address'];
                
                $data['aaData'][] = $rowData;
                $serial++;
            }/// end of while()
        elseif ($this->input->post('page_category') == 'stores'):
            $conditions = array();

            if (isset($sSearch) && !empty($sSearch)):
                $like = $sSearch;
                $quizMasterTotal = $this->stores_model->get_all_data('', '', $like);
                $quizQuestions = $this->stores_model->get_all_data($limit, $offset, $like);

            else:
                $quizMasterTotal = $this->stores_model->get_all_data();
                $quizQuestions = $this->stores_model->get_all_data($limit, $offset);
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
                $rowData[0] = $value['id'];
                $rowData[1] = $serial;
                $rowData[2] = $value['name'];
                $rowData[3] = $value['slug'];
                $rowData[4] = $value['store_code'];
                $rowData[5] = '';
                $rowData[6] = '';
                $rowData[7] = $value['isActive'];

                $x = "<img class='pEdit' src='" . base_url() . "assets/images/i_edit.png' />";
                $x .= "<img class='pDrop' src='" . base_url() . "assets/images/i_drop.png' />";


                $rowData[8] = $x;
                $rowData[9] = '';
                $rowData[10] = $value['email'];
                $rowData[11] = $value['phone'];
                $rowData[12] = $value['address'];
                
                $data['aaData'][] = $rowData;
                $serial++;
            }/// end of while()
        elseif ($this->request->data['page_category'] == 'banners'):
            if (isset($sSearch) && !empty($sSearch)):
                $conditions['or'][] = array('MusicBanners.title LIKE' => "%$sSearch%");
                $conditions['and'][] = array('MusicBanners.category ' => $this->request->data['page_category']);
                ///$conditions['and'][] = array('MusicBanners.languages ' => $_COOKIE['admin_lang']);
                $quizMasterTotal = $this->music_banners->find('all', array('conditions' => $conditions))->toArray();
                $quizQuestions = $this->music_banners->find('all', array('conditions' => $conditions,
                    'order' => array('MusicBanners.id DESC'), 'limit' => $limit, 'offset' => $offset))->toArray();
            else:
                $quizMasterTotal = $this->music_banners->find('all', array('conditions' => array('MusicBanners.languages'=>$_COOKIE['admin_lang'],'MusicBanners.category' => $this->request->data['page_category'])))->toArray();
                $quizQuestions = $this->music_banners->find('all', array('conditions' => array('MusicBanners.languages'=>$_COOKIE['admin_lang'],'MusicBanners.category' => $this->request->data['page_category']), 'order' => array('MusicBanners.id DESC'), 'limit' => $limit, 'offset' => $offset))->toArray();
            endif;

            $totalTotal = count($quizMasterTotal);
            $total = count($quizQuestions);
            $data['sEcho'] = intval($_POST['sEcho']);
            $data['iTotalRecords'] = $total;
            $data['iTotalDisplayRecords'] = $totalTotal;

            $f = 0;
            $serial = $_POST['iDisplayStart'] + 1;

            //$quizQuestions = $this->PesbdPages->find('all');

            foreach ($quizQuestions as $value) {

                $rowData = array();
                $rowData[0] = $value['id'];
                $rowData[1] = $serial;
                $rowData[2] = $value['title'];
                $rowData[3] = $value['category'];
                $rowData[4] = $value['banner_type'];
                $rowData[5] = '';
                //$rowData[6] = $value['BanglaPagesother']['body'];
                $rowData[6] = $value['dtl'];
                $rowData[7] = $value['isActive'];

                $x = "<img class='pEdit' src='" . Router::url('/', true) . "images/i_edit.png' />";
                $x .= "<img class='pDrop' src='" . Router::url('/', true) . "images/i_drop.png' />";


                $rowData[8] = $x;
                $rowData[9] = $value['navigation_url'];
                $rowData[10] = '';
                $rowData[11] = $value['thumb_photo'];
                
                $data['aaData'][] = $rowData;
                $serial++;
            }/// end of while()
        elseif ($this->request->data['page_category'] == 'languages'):
            if (isset($sSearch) && !empty($sSearch)):
                $conditions['or'][] = array('BanglaLanguages.name LIKE' => "%$sSearch%");
                $conditions['and'][] = array('BanglaLanguages.category ' => $this->request->data['page_category']);
                $quizMasterTotal = $this->BanglaLanguages->find('all', array('conditions' => $conditions));
                $quizQuestions = $this->BanglaLanguages->find('all', array('conditions' => $conditions,
                    'order' => array('BanglaLanguages.id DESC'), 'limit' => $limit, 'offset' => $offset));
            else:
                $quizMasterTotal = $this->BanglaLanguages->find('all', array('conditions' => array('BanglaLanguages.category' => $this->request->data['page_category'])));
                $quizQuestions = $this->BanglaLanguages->find('all', array('conditions' => array('BanglaLanguages.category' => $this->request->data['page_category']), 'order' => array('BanglaLanguages.id DESC'), 'limit' => $limit, 'offset' => $offset));
            endif;

            $totalTotal = count($quizMasterTotal);
            $total = count($quizQuestions);
            $data['sEcho'] = intval($_POST['sEcho']);
            $data['iTotalRecords'] = $total;
            $data['iTotalDisplayRecords'] = $totalTotal;

            $f = 0;
            $serial = $_POST['iDisplayStart'] + 1;

            //$quizQuestions = $this->PesbdPages->find('all');

            foreach ($quizQuestions as $value) {

                $rowData = array();
                $rowData[0] = $value['BanglaLanguages']['id'];
                $rowData[1] = $serial;
                $rowData[2] = $value['BanglaLanguages']['name'];
                $rowData[3] = $value['BanglaLanguages']['category'];
                $rowData[4] = $value['BanglaLanguages']['short'];
                $rowData[5] = '';
                //$rowData[6] = $value['BanglaPagesother']['body'];
                $rowData[6] = '';
                $rowData[7] = $value['BanglaLanguages']['isActive'];

                $x = "<img class='pEdit' src='" . Router::url('/', true) . "images/i_edit.png' />";
                //$x .= "<img class='pDrop' src='" . Router::url('/', true) . "images/i_drop.png' />";


                $rowData[8] = $x;
                $rowData[9] = $value['BanglaLanguages']['isDefault'];
                $rowData[10] = '';
                
                $data['aaData'][] = $rowData;
                $serial++;
            }/// end of while()
        else:
            if (isset($sSearch) && !empty($sSearch)):
                $conditions['or'][] = array('BanglaPagesother.slug LIKE' => "%$sSearch%");
                $conditions['or'][] = array('BanglaPagesother.title LIKE' => "%$sSearch%");
                $conditions['and'][] = array('BanglaPagesother.category ' => $this->request->data['page_category']);
                $quizMasterTotal = $this->BanglaPagesother->find('all', array('conditions' => $conditions));
                $quizQuestions = $this->BanglaPagesother->find('all', array('conditions' => $conditions,
                    'order' => array('BanglaPagesother.id DESC'), 'limit' => $limit, 'offset' => $offset));
            else:
                $quizMasterTotal = $this->BanglaPagesother->find('all', array('conditions' => array('BanglaPagesother.category' => $this->request->data['page_category'])));
                $quizQuestions = $this->BanglaPagesother->find('all', array('conditions' => array('BanglaPagesother.category' => $this->request->data['page_category']), 'order' => array('BanglaPagesother.id DESC'), 'limit' => $limit, 'offset' => $offset));
            endif;

            //$log = $this->PesbdPages->getDataSource()->getLog(false, false);
            //debug($log);
            //$quizMasterTotal = $this->QuizMaster->find('all');
            //$quizMaster = $this->QuizMaster->find('all', array('order' => array('QuizMaster.id DESC'), 'limit' => $limit, 'offset' => $offset));

            $totalTotal = count($quizMasterTotal);
            $total = count($quizQuestions);
            $data['sEcho'] = intval($_POST['sEcho']);
            $data['iTotalRecords'] = $total;
            $data['iTotalDisplayRecords'] = $totalTotal;

            $f = 0;
            $serial = $_POST['iDisplayStart'] + 1;

            //$quizQuestions = $this->PesbdPages->find('all');

            foreach ($quizQuestions as $value) {

                $rowData = array();
                $rowData[0] = $value['BanglaPagesother']['id'];
                $rowData[1] = $serial;
                $rowData[2] = $value['BanglaPagesother']['slug'];
                $rowData[3] = $value['BanglaPagesother']['category'];
                $rowData[4] = $value['BanglaPagesother']['title'];
                $rowData[5] = '';
                //$rowData[6] = $value['BanglaPagesother']['body'];
                $rowData[6] = '';
                $rowData[7] = $value['BanglaPagesother']['isActive'];

                $x = "<img class='pEdit' src='" . Router::url('/', true) . "images/i_edit.png' />";
                //$x .= "<img class='pDrop' src='" . Router::url('/', true) . "images/i_drop.png' />";


                $rowData[8] = $x;
                $rowData[9] = '';
                $rowData[10] = '';
                /* $rowData[11] = $value['PesbdPages']['sImage'];
                  $rowData[12] = $value['PesbdPages']['tags'];
                  $rowData[13] = $value['PesbdPages']['excerpt'];
                  $rowData[14] = $value['PesbdPages']['reviewtype'];
                  $rowData[15] = $value['PesbdPages']['biography']; */

                $data['aaData'][] = $rowData;
                $serial++;
            }/// end of while()
        endif;



        if ($total == 0)
            $data['aaData'] = array();
        echo json_encode($data);
    }
    
    public function saveUpdateAllDiscover() {
        
        $post = array();
        $data= 0;
        if (!empty($this->input->post())):
            
            if ($this->input->post('category')!==null&&$this->input->post('category')=='suppliers') {
                $post['details']=$this->input->post('bodytxt');
                
                $post['thumb_photo']=$this->input->post('sImage');
                //$post['languages']='en';
                $post['slug']=$this->input->post('slug');
                
                if ($this->input->post('name')!==null &&
                        !isset($post['details']) ||empty($post['details'])||
                        !isset($post['thumb_photo']) ||empty($post['thumb_photo'])||
                        !isset($post['slug']) ||empty($post['slug'])
                    ) :
                    $data= 2;
                    echo $data;
                    die();
                endif;
                if ($this->input->post('id') !== null):
                    $post['id'] = $this->input->post('id');
                endif;
                
                $post['name'] = $this->input->post('name');
                $post['slug'] = $this->input->post('slug');
                $post['phone'] = $this->input->post('phone');
                $post['address'] = $this->input->post('address');
                $post['email'] = $this->input->post('email');
                $post['isActive'] = $this->input->post('isActive');
                
                //print_r($post);
                //die();
                $this->supplier_model->addupdate_data($post);
                
                $data= 1;
                echo $data;
                die();
            }elseif ($this->input->post('category')!==null&&$this->input->post('category')=='stores') {
                
                $post['slug']=$this->input->post('slug');
                
                if ($this->input->post('name')!==null &&
                        !isset($post['slug']) ||empty($post['slug'])
                    ) :
                    $data= 2;
                    echo $data;
                    die();
                endif;
                if ($this->input->post('id') !== null):
                    $post['id'] = $this->input->post('id');
                endif;
                
                $post['name'] = $this->input->post('name');
                $post['slug'] = $this->input->post('slug');
                $post['email'] = $this->input->post('email');
                $post['phone'] = $this->input->post('phone');
                $post['store_type'] = $this->input->post('store_type');
                $post['address'] = $this->input->post('address');
                $post['isActive'] = $this->input->post('isActive');
                
                //print_r($post);
                //die();
                $this->stores_model->addupdate_data($post);
                
                $data= 1;
                echo $data;
                die();
            }else if (isset($this->request->data['category']) && $this->request->data['category']=='banners') {
                $this->request->data['dtl']=(isset($this->request->data['bodytxt'])&&!empty($this->request->data['bodytxt']))?$this->request->data['bodytxt']:'';
                $this->request->data['thumb_photo']=(isset($this->request->data['sImage'])&&!empty($this->request->data['sImage']))?$this->request->data['sImage']:'';
                $this->request->data['languages']='en';
                
                if(!empty($this->request->data['id']))
                    $music_banners = $this->music_banners->get($this->request->data['id']);
                else
                    $music_banners = $this->music_banners->newEntity();
                
                $music_banners->title = $this->request->data['title'];
                $music_banners->navigation_url = $this->request->data['navigation_url'];
                $music_banners->slug = $this->request->data['slug'];
                $music_banners->category = $this->request->data['category'];
                $music_banners->languages = $this->request->data['languages'];
                $music_banners->dtl = $this->request->data['dtl'];
                $music_banners->thumb_photo =!empty($this->request->data['thumb_photo'])? $this->request->data['thumb_photo']:'';
                $music_banners->banner_type   =!empty($this->request->data['banner_type'])? $this->request->data['banner_type']:'Home';
                $music_banners->isActive =!empty($this->request->data['isActive'])? $this->request->data['isActive']:1;
                
                $this->music_banners->save($music_banners);
                
                $data= 1;
                $this->response->body($data);

                return $this->response;
                die();
            }
            
            $slug = str_replace(' ', '-', $this->request->data['slug']);
            $slug = strtolower($slug);
            $this->request->data['slug'] = $slug;
            //$this->request->data['body'] = $this->request->data['bodytxt'];
            $filepath = WWW_ROOT . '../Template/Discover/' . $this->request->data['slug'] . '.ctp';

            //
            $data= 1;
        else:
            $data= 0;
        endif;
        echo $data;
    }
    
    public function onGetCurrentFormEditData(){
        $formdata=array();
        if($this->input->post('type')=='suppliers')
            $formdata = $this->supplier_model->get_data_all($this->input->post('contentid'));
        else if($this->input->post('type')=='stores')
            $formdata = $this->stores_model->get_data_all($this->input->post('contentid'));
        if (count($formdata) > 0)
            $formdata = $formdata[0];
        $formdata['success'] = true;
        echo json_encode($formdata);
    }
    
    public function discoverDeleteProcessing() {
        
        $data= 0;
        if($this->input->post('type')=='suppliers'):
            $this->supplier_model->delete_user($this->input->post('id'));
            $data= 1;
        else:
            $data= 0;
        endif;
        echo $data;
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
