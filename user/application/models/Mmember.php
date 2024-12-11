<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mmember extends CI_Model {

    function login($inputan){
        $username_user = $inputan['username'];
        $password_user = $inputan['password'];
        $password_user = sha1($password_user);
        
        $this->db->where('username_user', $username_user);
        $this->db->where('password_user', $password_user);
        $q = $this->db->get('user');
        $cekmember = $q->row_array(); 

        if(!empty($cekmember)){
            $this->session->set_userdata("id_user", $cekmember['id_user']);
            $this->session->set_userdata("username", $cekmember['username_user']);
            $this->session->set_userdata("email_user", $cekmember['email_user']);
            $this->session->set_userdata("status_user", $cekmember['status_user']);
            return "ada";
        }else{
            return "ga ada";
        }
    }
    function register($m){
        $this->db->insert('user', $m);
    }
    function setprem($user_id){
        $data = array(
            'status_user' => 'premium' // Data yang akan diupdate
        );

        $this->db->where('id_user', $user_id); // Kondisi berdasarkan ID user
        $this->db->update('user', $data);
        
        $this->session->set_userdata("status_user", "premium");
    
    }
}