<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlist extends CI_Model
{
    public function homerow()
    {
        $this->db->where('id_game >=', 1);
        $this->db->where('id_game <=', $this->session->userdata('level_user'));
        $query = $this->db->get('game');
        return $query->result();
    }
    public function premrow()
    {
        $this->db->where('id_game >=', 10);
        $query = $this->db->get('game');
        return $query->result();
    }
    public function get_top_10_rewards() {
        $this->db->where('status_user', 'premium');
        $this->db->from('user'); // Ganti dengan nama tabel Anda
        $this->db->order_by('total_reward', 'DESC'); // Urutkan dari terbesar ke terkecil
        $this->db->limit(10); // Ambil hanya 10 data teratas
        $query = $this->db->get(); // Jalankan query

        return $query->result(); // Kembalikan hasil dalam bentuk objek
    }
    public function get_artikel() {
        $this->db->from('konten'); // Ganti dengan nama tabel Anda
        $this->db->order_by('id_konten', 'DESC'); // Urutkan dari terbesar ke terkecil
        $this->db->limit(4); // Ambil hanya 10 data teratas
        $query = $this->db->get(); // Jalankan query

        return $query->result(); // Kembalikan hasil dalam bentuk objek
    }
}
