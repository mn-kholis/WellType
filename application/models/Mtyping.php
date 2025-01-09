<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtyping extends CI_Model {
    public function getTargetText($id_game) {
        $this->db->where('id_game', $id_game);
        $this->db->from('game');
        // $this->db->order_by('id', 'RANDOM'); // Ambil secara acak
        $query = $this->db->get();
        return $query->row();
    }
    public function rubah_level() {
        $level = $this->session->userdata('level_user');
        $user_id = $this->session->userdata('id_user');
        $data = array(
            'level_user' => $level + 1 
        );

        $this->db->where('id_user', $user_id);
        $this->db->update('user', $data);
        
        $this->session->set_userdata("level_user", $level + 1);
    }
    public function getDeskripsiText() {
        // Contoh: Ambil data dari database (table 'typing_texts')
        $this->db->select('deskripsi_game');
        $this->db->from('game');
        // $this->db->order_by('id', 'RANDOM'); // Ambil secara acak
        $query = $this->db->get();
        return $query->row()->deskripsi_game;
    }
    public function saveGameData($data) {
        $this->db->insert('datagame', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang dimasukkan (opsional)
    }
    public function updateReward($id_user, $score) {
        // Ambil total_reward sebelumnya
        $this->db->select('total_reward');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $currentReward = $this->db->get()->row()->total_reward;
    
        // Tambahkan score ke total_reward
        $newReward = $currentReward + $score;
    
        // Update total_reward
        $this->db->where('id_user', $id_user);
        $this->db->update('user', ['total_reward' => $newReward]);
    }
    
}