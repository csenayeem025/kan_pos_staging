<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        //$this->load->database();
    }

    public function get_app_settings() {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_settings');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_user_by_username($username) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_users');
        $this->db->where('isActive', 1);
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function onGetMyprofile($email) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_users');
        $this->db->where('isActive', 1);
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function update_avater($user_id, $filename) {
        $this->load->helper('url');

        $data = array(
            'sImage' => $filename
        );
        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->where('user_id', $user_id);
        return $this->db->update('pos_users', $data);
    }
    
    public function updateMyprofile($user_id, $data) {
        $this->load->helper('url');

        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->where('user_id', $user_id);
        return $this->db->update('pos_users', $data);
    }
    
    public function updateSettings($user_id, $data) {
        $this->load->helper('url');

        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->where('user_id', $user_id);
        return $this->db->update('pos_users', $data);
    }
    
    public function onGetSettings($data=null) {
        $this->load->helper('url');

        $this->db->select('*');
        $this->db->from('pos_settings');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function updateMySettings($data) {
        $this->load->helper('url');

        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->where('id', 1);
        return $this->db->update('pos_settings', $data);
    }
    
    public function update_adminlogo($filename) {
        $this->load->helper('url');

        $data = array(
            'logo' => $filename
        );
        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->where('id', 1);
        return $this->db->update('pos_settings', $data);
    }
    public function update_favicon($filename) {
        $this->load->helper('url');

        $data = array(
            'favicon' => $filename
        );
        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->where('id', 1);
        return $this->db->update('pos_settings', $data);
    }
}

?>