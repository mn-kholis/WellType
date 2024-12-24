<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlevel_game extends CI_Model {

    public function get_current_level($id) {
        $query = $this->db->get('levels', $id); // Ambil satu level
        return $query->row(); // Kembalikan satu baris data
    }
}