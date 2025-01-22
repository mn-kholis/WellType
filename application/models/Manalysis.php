<?php 
class Manalysis extends CI_Model {
    public function getAllGames() {
        $this->db->select('*');
        $this->db->from('game');
        return $this->db->get()->result();
    }
    public function getAllUser() {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function getAllContent() {
        $this->db->select('*');
        $this->db->from('konten');
        return $this->db->get()->result();
    }
    public function getLeaderboard() {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('status_user', 'premium');
        $this->db->order_by('total_reward', 'DESC'); // Mengurutkan berdasarkan total_reward secara menurun
        $this->db->limit(10); // Membatasi hanya 10 data teratas
        return $this->db->get()->result();
    }
}
