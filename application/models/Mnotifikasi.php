<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mnotifikasi extends CI_Model {
    
    // Fungsi untuk mengambil semua data notifikasi
    public function get_all_notifikasi() {
        $this->db->select('*');
        $this->db->from('notifikasi');
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil dalam bentuk array objek
    }

    // Fungsi untuk mengambil notifikasi berdasarkan id
    public function get_notifikasi_by_id($id_notifikasi) {
        $this->db->select('*');
        $this->db->from('notifikasi');
        $this->db->where('id_notifikasi', $id_notifikasi);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan hasil dalam bentuk objek
    }

    // Fungsi untuk menambah data notifikasi
    public function add_notifikasi($data) {
        return $this->db->insert('notifikasi', $data); // Menambahkan data ke tabel "notifikasi"
    }

    // Fungsi untuk mengedit data notifikasi
    public function edit_notifikasi($id_notifikasi, $data) {
        $this->db->where('id_notifikasi', $id_notifikasi);
        return $this->db->update('notifikasi', $data); // Memperbarui data berdasarkan id_notifikasi
    }

    public function delete_notifikasi($id_notifikasi) {
        echo $id_notifikasi;
        $this->db->where('id_notifikasi', $id_notifikasi);
        $this->db->delete('notifikasi');
    }
    
}
