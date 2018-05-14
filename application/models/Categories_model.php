<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        //$this->load->database();
    }
    
    /*SELECT m.parent_id,n.name,GROUP_CONCAT(m.id),GROUP_CONCAT(m.name) FROM sheba_categories m 
 inner join sheba_categories n on n.id=m.parent_id 
 GROUP by m.parent_id 
 order by m.name asc 
    */
    
    public function get_all_data_group($parent_id=null,$type=null) {
        
        $this->db->select('m.parent_id,n.name,GROUP_CONCAT(m.id) idlist,GROUP_CONCAT(m.name) namelist');
        $this->db->from('sheba_categories m');
        $this->db->join('sheba_categories n', 'n.id = m.parent_id');
        if(isset($parent_id)):
            $this->db->where('m.parent_id', $parent_id);
        endif;
        if(isset($type)):
            $this->db->where('m.type', $type);
        endif;
        
        $this->db->order_by("n.name", "asc");
        
        $this->db->group_by('m.parent_id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_data($parent_id=null,$type=null) {
        
        $this->db->select('*');
        $this->db->from('pos_categories');
        if(isset($parent_id)):
            $this->db->where('parent_id', $parent_id);
        endif;
        if(isset($type)):
            $this->db->where('type', $type);
        endif;
        $this->db->order_by("name", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_active_data($parent_id=null,$type=null) {
        
        $this->db->select('*');
        $this->db->from('pos_categories');
        
        if(isset($parent_id)):
            $this->db->where('parent_id', $parent_id);
        endif;
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
        $this->db->from('pos_categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_single_data($id) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function addupdate_data($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            return $this->db->update('pos_categories', $data);
        }else{
            $data=$post;
            
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            return $this->db->insert('pos_categories', $data);
        }
    }
    
    public function setisactive_category($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            return $this->db->update('pos_categories', $data);
        }else{
            
        }
    }
    
    public function delete_user($user_id=null) {
        $this->db->where('id', $user_id);
        return $this->db->delete('pos_categories');
    }
    
}

?>