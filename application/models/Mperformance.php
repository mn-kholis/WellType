<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mperformance extends CI_Model {
    
    // Fungsi untuk mengambil data time
    public function get_practice_time($user_id, $filter)
    {
        $this->db->select('SUM(waktu_penyelesaian) as total_time');
        $this->db->from('datagame');
        $this->db->where('id_user', $user_id);

        if ($filter == 'today') {
            $this->db->where('DATE(tgl_main)', 'CURDATE()', false);
        } elseif ($filter == 'this_week') {
            $this->db->where('WEEK(tgl_main)', 'WEEK(CURDATE())', false);
        }

        $query = $this->db->get();
        return $query->row()->total_time ?: 0; // Kembalikan 0 jika tidak ada data
    }
    public function get_practice_attempts($user_id, $filter)
    {
        $this->db->select('COUNT(*) as attempts');
        $this->db->from('datagame');
        $this->db->where('id_user', $user_id);

        if ($filter == 'today') {
            $this->db->where('DATE(tgl_main)', 'CURDATE()', false);
        } elseif ($filter == 'this_week') {
            $this->db->where('WEEK(tgl_main)', 'WEEK(CURDATE())', false);
            $this->db->where('YEAR(tgl_main)', 'YEAR(CURDATE())', false);
        }

        $query = $this->db->get();
        return $query->row()->attempts ?: 0; // Kembalikan 0 jika tidak ada data
    }

}