<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcontent extends CI_Model {
    
    // Fungsi untuk mengambil semua data konten
    public function get_all_content() {
        $this->db->select('*');
        $this->db->from('konten');
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil dalam bentuk array objek
    }
    // Fungsi untuk mengambil konten berdasarkan id
    public function get_content_by_id($id_konten) {
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->where('id_konten', $id_konten);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan hasil dalam bentuk objek
    }

    // Fungsi untuk menambah data konten
    public function add_content($data) {
        return $this->db->insert('konten', $data); // Menambahkan data ke tabel "konten"
    }

    // Fungsi untuk mengedit data konten
    public function edit_content($id_konten, $data) {
        $this->db->where('id_konten', $id_konten);
        return $this->db->update('konten', $data); // Memperbarui data berdasarkan id_konten
    }

    public function delete_content($id_konten) {
        echo $id_konten;
        $this->db->where('id_konten', $id_konten);
        $this->db->delete('konten');
    }  
}
