<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userloghistory_model extends CI_Model {

    public function __construct() {

        parent::__construct();
        //$this->load->database();
    }

    public function get_all_data($limit = null, $offset = null, $like = null) {

        $this->db->select('*');
        $this->db->from('pos_userloghistory h');
        $this->db->join('pos_users c', 'c.user_id = h.user_id', 'left');
        if (isset($like)):
            $this->db->or_like('c.username', $like, 'both');
        //$this->db->or_like('email', $like,'both');
        endif;
        $this->db->order_by("h.id", "desc");
        if (isset($limit))
            $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_all($id) {
        //echo $username;
        $this->db->select('*,p.id master_id,p.supplier_code master_supplier_code,p.product_code master_product_code');
        $this->db->from('pos_userloghistory p');
        $this->db->join('pos_userloghistorycar c', 'c.product_id = p.id', 'left');
        $this->db->where('p.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_subdata_all($id) {
        //echo $username;
        $this->db->select('*');
        $this->db->from('pos_userloghistory');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addupdate_data($post) {
        if (isset($post['id']) && !empty($post['id'])) {
            $data = $post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            $this->db->update('pos_userloghistory', $data);
            return $post['id'];
        } else {
            $data = $post;
            //$data['supplier_code'] = 'S'.rand(1000,500000);
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->insert('pos_userloghistory', $data);
            return $this->db->insert_id();
        }
    }

    public function updateData($user_id, $data = null, $log_token = null) {
        $this->load->helper('url');

        if ($user_id&&$log_token):
            $this->db->from('pos_userloghistory');
            $this->db->where('user_id', $user_id);
            $this->db->where('token', $log_token);
            $query = @$this->db->get();

            if ($query->num_rows() > 0) {
                // update
                $result = $query->result_array();
                $data = array();

                $data['token'] = '';

                $this->db->set('logout', 'NOW()', FALSE);
                $this->db->set('modified', 'NOW()', FALSE);
                $this->db->where('token', $log_token);
                return $this->db->update('pos_userloghistory', $data);
            } else {
                $result = $query->result_array();
                // insert
                $data = array();
                $data['user_id'] = $user_id;
                $data['token'] = $log_token;
                $data['remote_ip'] = $_SERVER["REMOTE_ADDR"];

                $this->db->set('date', 'NOW()', FALSE);
                $this->db->set('login', 'NOW()', FALSE);
                $this->db->set('created', 'NOW()', FALSE);
                $this->db->set('modified', 'NOW()', FALSE);
                return $this->db->insert('pos_userloghistory', $data);
            }
        endif;
        //print_r($result);
        //die();
    }

    public function addupdate_subdata($post) {
        if (isset($post['id']) && !empty($post['id'])) {
            $data = $post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            $this->db->update('pos_userloghistorycar', $data);
            return $post['id'];
        } else {
            $data = $post;
            $data['supplier_code'] = 'S' . rand(1000, 500000);
            $this->db->set('created', 'NOW()', FALSE);
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->insert('pos_userloghistorycar', $data);
            return $this->db->insert_id();
        }
    }

    public function setisactive_category($post) {
        if (isset($post['id']) && !empty($post['id'])) {
            $data = $post;
            $this->db->set('modified', 'NOW()', FALSE);
            $this->db->where('id', $post['id']);
            return $this->db->update('pos_userloghistory', $data);
        } else {
            
        }
    }

    public function delete_user($user_id = null) {
        $this->db->where('id', $user_id);
        return $this->db->delete('pos_userloghistory');
    }

}

?>