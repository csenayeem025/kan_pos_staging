<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_type extends CI_Model {

    public function __construct() {

        parent::__construct();
        //$this->load->database();
    }
    
    
    
    public function get_all_data($type=null) {
        
        $this->db->select('*');
        $this->db->from('pos_companies');
        
        if(isset($type)):
            $this->db->where('type', $type);
        endif;
        $this->db->order_by("name", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_active_data($type=null) {
        
        $this->db->select('*');
        $this->db->from('pos_companies');
        
        if(isset($type)):
            $this->db->where('type', $type);
        endif;
        $this->db->where('isActive', 1);
        $this->db->order_by("name", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_data_all($id) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_companies');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_single_data($id) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_companies');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function addupdate_data($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            return $this->db->update('pos_companies', $data);
        }else{
            $data=$post;
            
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            return $this->db->insert('pos_companies', $data);
        }
    }
    
    public function setisactive_category($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            return $this->db->update('pos_companies', $data);
        }else{
            
        }
    }
    
    public function delete_user($user_id=null) {
        $this->db->where('id', $user_id);
        return $this->db->delete('pos_companies');
    }
    
}

?>