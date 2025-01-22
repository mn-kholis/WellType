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
            $this->session->set_userdata("level_user", $cekmember['level_user']);
            $data = array(
                'logterakhir_user' => date('Y-m-d') 
            );
            $this->db->where('id_user', $cekmember['id_user']);
            $this->db->update('user', $data);
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
            'status_user' => 'premium' 
        );

        $this->db->where('id_user', $user_id);
        $this->db->update('user', $data);
        
        $this->session->set_userdata("status_user", "premium");
    
    }
    public function edit_user($id_user, $data) {
        $this->session->set_userdata("username", $data['username_user']);
        $this->session->set_userdata("email_user", $data['email_user']);
        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data); // Memperbarui data berdasarkan id_admin
    }

    //buat di dashboard admin
    public function count_users_by_status($status) {
        $this->db->where('status_user', $status);
        return $this->db->count_all_results('User');
    }
    
    public function count_total_users() {
        return $this->db->count_all('User');
    }
    public function getGameDataByUserType() {
        $query = $this->db->query("
            SELECT 
                DATE(p.tgl_main) AS tgl_main,
                SUM(CASE WHEN u.status_user = 'free' THEN 1 ELSE 0 END) AS free_games,
                SUM(CASE WHEN u.status_user = 'premium' THEN 1 ELSE 0 END) AS premium_games
            FROM datagame p
            JOIN user u ON p.id_user = u.id_user
            GROUP BY DATE(p.tgl_main)
            ORDER BY tgl_main
        ");
        return $query->result_array();
    }
    public function getTopUsersByReward($limit = 5) {
        $query = $this->db->select('id_user, username_user, email_user, total_reward')
            ->from('user')
            ->order_by('total_reward', 'DESC')
            ->limit($limit)
            ->get();
        return $query->result_array();
    }
    
}