<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_freeuser extends CI_Model {

    public function get_free_users() {
        $this->db->select('id_user, username_user, email_user, level_user, total_reward, tgl_reg_user');
        $this->db->from('User');
        $this->db->where('status_user', 'free');
        return $this->db->get()->result();
    }

    public function add_free_user($data) {
        return $this->db->insert('User', $data);
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('User', ['id_user' => $id])->row();
    }

    public function update_user($id, $data) {
        return $this->db->update('User', $data, ['id_user' => $id]);
    }

    public function delete_free_user($id) {
        return $this->db->delete('User', ['id_user' => $id]);
    }
}
