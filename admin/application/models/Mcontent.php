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

    // Fungsi untuk menambah data konten
    // public function add_content($data) {
    //     return $this->db->insert('konten', $data);
    // }

    // // Fungsi untuk mengedit data konten
    // public function update_content($id, $data) {
    //     $this->db->where('id_konten', $id);
    //     return $this->db->update('konten', $data);
    // }

    // Fungsi untuk menghapus data konten
    // public function delete_content($id_konten) {
    //     return $this->db->delete('konten', array('id_konten' => $id_konten));
    // }

    public function delete_content($id_konten) {
        echo $id_konten;
        $this->db->where('id_konten', $id_konten);
        $this->db->delete('konten');
    }
    
}
