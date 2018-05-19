<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        //$this->load->database();
    }

    public function get_all_users($limit=null, $offset=null, $like=null) {
        
        $this->db->select('*');
        $this->db->from('pos_users');
        if(isset($like)):
            $this->db->or_like('full_name', $like,'both');
            $this->db->or_like('email', $like,'both');
        endif;
        $this->db->order_by("user_id", "desc");
        if(isset($limit))
            $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_user_data_all($id) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_users');
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function addupdate_user($post) {
        if(isset($post['user_id'])&&!empty($post['user_id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('user_id', $post['user_id']);
            return $this->db->update('pos_users', $data);
        }else{
            $data=$post;
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            return $this->db->insert('pos_users', $data);
        }
    }
    
    public function setisactive_category($post) {
        if(isset($post['user_id'])&&!empty($post['user_id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('user_id', $post['user_id']);
            return $this->db->update('pos_users', $data);
        }else{
            
        }
    }
    
    public function delete_user($user_id=null) {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('pos_users');
    }
    
}

?>