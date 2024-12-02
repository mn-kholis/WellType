<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtyping extends CI_Model {
    public function getTargetText() {
        // Contoh: Ambil data dari database (table 'typing_texts')
        $this->db->select('text_game');
        $this->db->from('game');
        // $this->db->order_by('id', 'RANDOM'); // Ambil secara acak
        $query = $this->db->get();
        return $query->row()->text_game;
    }
    public function getJudulText() {
        // Contoh: Ambil data dari database (table 'typing_texts')
        $this->db->select('judul_game');
        $this->db->from('game');
        // $this->db->order_by('id', 'RANDOM'); // Ambil secara acak
        $query = $this->db->get();
        return $query->row()->judul_game;
    }
    public function getDeskripsiText() {
        // Contoh: Ambil data dari database (table 'typing_texts')
        $this->db->select('deskripsi_game');
        $this->db->from('game');
        // $this->db->order_by('id', 'RANDOM'); // Ambil secara acak
        $query = $this->db->get();
        return $query->row()->deskripsi_game;
    }
    
}