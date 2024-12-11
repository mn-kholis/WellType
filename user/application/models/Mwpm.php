<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mwpm extends CI_Model {
    
    // Mengambil nilai Best WPM user
    public function getBestWpm($userId) {
        $this->db->select('best_wpm');
        $this->db->from('user');
        $this->db->where('id_user', $userId);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan data Best WPM
    }

    // Menyimpan nilai Best WPM baru ke database
    public function saveBestWpm($userId, $newBestWpm) {
        $this->db->where('id_user', $userId);
        return $this->db->update('user', ['best_wpm' => $newBestWpm]);
    }
    public function updateBestWpm($userId, $bestWpm)
    {
        $this->db->set('best_wpm', $bestWpm);
        $this->db->where('id_user', $userId);
        return $this->db->update('user');
    }
}
