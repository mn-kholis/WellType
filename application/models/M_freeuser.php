<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_freeuser extends CI_Model {

    public function get_free_users() {
        $this->db->select('id_user, username_user, email_user, password_user, level_user, total_reward, tgl_reg_user');
        $this->db->from('User');
        $this->db->where('status_user', 'free'); // Filter hanya untuk user free
        $query = $this->db->get();
        return $query->result(); // Mengembalikan data dalam bentuk array objek
    }

    public function add_free_user($data) {
        return $this->db->insert('User', $data);
    }

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

    // Menghapus pengguna free berdasarkan ID
    public function delete_free_user($id) {
        $this->db->where('id_user', $id);
        return $this->db->delete('User'); // Menghapus data dari tabel User
    }
}
