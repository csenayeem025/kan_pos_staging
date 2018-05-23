<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasehistory_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        //$this->load->database();
    }

    public function get_all_data($limit=null, $offset=null, $like=null) {
        
        $this->db->select('*');
        $this->db->from('pos_purchasehistory');
        if(isset($like)):
            $this->db->or_like('name', $like,'both');
            //$this->db->or_like('email', $like,'both');
        endif;
        $this->db->order_by("id", "desc");
        if(isset($limit))
            $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_data_all($id) {
        //echo $username;
        $this->db->select('*,p.id master_id,p.supplier_code master_supplier_code,p.product_code master_product_code');
        $this->db->from('pos_purchasehistory p');
        $this->db->join('pos_purchasehistorycar c', 'c.product_id = p.id','left');
        $this->db->where('p.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_subdata_all($id) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_purchasehistorycar');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function addupdate_data($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            $this->db->update('pos_purchasehistory', $data);
            return $post['id'];
        }else{
            $data=$post;
            //$data['supplier_code'] = 'S'.rand(1000,500000);
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->insert('pos_purchasehistory', $data);
            return $this->db->insert_id();
        }
    }
    
    public function addupdate_subdata($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            $this->db->update('pos_purchasehistorycar', $data);
            return $post['id'];
        }else{
            $data=$post;
            $data['supplier_code'] = 'S'.rand(1000,500000);
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->insert('pos_purchasehistorycar', $data);
            return $this->db->insert_id();
        }
    }
    
    public function setisactive_category($post) {
        if(isset($post['id'])&&!empty($post['id'])){
            $data=$post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            return $this->db->update('pos_purchasehistory', $data);
        }else{
            
        }
    }
    
    public function delete_user($user_id=null) {
        $this->db->where('id', $user_id);
        return $this->db->delete('pos_purchasehistory');
    }
    
}

?>