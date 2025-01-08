<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mgame extends CI_Model {
    
    // Fungsi untuk mengambil semua data game
    public function get_all_game() {
        $this->db->select('*');
        $this->db->from('game');
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil dalam bentuk array objek
    }

    // Fungsi untuk mengambil game berdasarkan id
    public function get_game_by_id($id_game) {
        $this->db->select('*');
        $this->db->from('game');
        $this->db->where('id_game', $id_game);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan hasil dalam bentuk objek
    }

    // Fungsi untuk menambah data game
    public function add_game($data) {
        return $this->db->insert('game', $data); // Menambahkan data ke tabel "game"
    }

    // Fungsi untuk mengedit data game
    public function edit_game($id_game, $data) {
        $this->db->where('id_game', $id_game);
        return $this->db->update('game', $data); // Memperbarui data berdasarkan id_game
    }

    public function delete_game($id_game) {
        echo $id_game;
        $this->db->where('id_game', $id_game);
        $this->db->delete('game');
    }
    
}
