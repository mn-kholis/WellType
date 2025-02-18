<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    
    // Fungsi untuk mengambil semua data admin
    public function get_all_admin() {
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil dalam bentuk array objek
    }

    // Fungsi untuk mengambil konten berdasarkan id
    public function get_admin_by_id($id_admin) {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin', $id_admin);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan hasil dalam bentuk objek
    }

    public function add($data) {
        return $this->db->insert('admin', $data);
    }

    // Fungsi untuk mengedit data admin
    public function edit($id_admin, $data) {
        $this->db->where('id_admin', $id_admin);
        return $this->db->update('admin', $data); // Memperbarui data berdasarkan id_admin
    }

    public function delete($id_admin) {
        echo $id_admin;
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
    }
    
}
