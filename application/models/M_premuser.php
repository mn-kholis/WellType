<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_premuser extends CI_Model {

    // Mendapatkan data pengguna premium
    public function get_premium_users() {
        $this->db->select('id_user, username_user, email_user, password_user, level_user, total_reward, tgl_reg_user');
        $this->db->from('User');
        $this->db->where('status_user', 'premium'); // Filter hanya untuk user premium
        $query = $this->db->get();
        return $query->result(); // Mengembalikan data dalam bentuk array objek
    }

    //tambah 
    public function add_premium_user($data) {
        return $this->db->insert('User', $data);
    }

    //mengambil user berdasarkan id
    public function get_user_by_id($id) {
        $this->db->select('*');
        $this->db->from('User');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->row();
    }

    //edit user
    public function update_user($id, $data) {
        $this->db->where('id_user', $id);
        return $this->db->update('User', $data);
    }

    // Menghapus pengguna premium berdasarkan ID
    public function delete_premium_user($id) {
        $this->db->where('id_user', $id);
        return $this->db->delete('User'); // Menghapus data dari tabel User
    }
}
