<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlist extends CI_Model
{
    public function homerow()
    {
        $this->db->where('id_game >=', 1);
<<<<<<< HEAD
        $this->db->where('id_game <=', 16);
=======
        $this->db->where('id_game <=', $this->session->userdata('level_user'));
>>>>>>> 01b90b930e168af963942cef0e0fb2b76fa7350b
        $query = $this->db->get('game');
        return $query->result();
    }
    public function premrow()
    {
        $this->db->where('id_game >=', 10);
        $query = $this->db->get('game');
        return $query->result();
    }
}
