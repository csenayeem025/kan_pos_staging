<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        //$this->load->database();
    }

    public function get_all_data($limit=null, $offset=null, $like=null) {
        
        $this->db->select('*');
        $this->db->from('pos_suppliers');
        if(isset($like)):
            $this->db->or_like('name', $like,'both');
            $this->db->or_like('email', $like,'both');
        endif;
        $this->db->order_by("id", "desc");
        if(isset($limit))
            $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_data_all($id) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_suppliers');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function addupdate_data($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            return $this->db->update('pos_suppliers', $data);
        }else{
            $data=$post;
            $data['supplier_code'] = 'S'.rand(1000,500000);
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            return $this->db->insert('pos_suppliers', $data);
        }
    }
    public function delete_user($user_id=null) {
        $this->db->where('id', $user_id);
        return $this->db->delete('pos_suppliers');
    }
    
}

?>