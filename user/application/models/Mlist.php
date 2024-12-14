<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlist extends CI_Model
{
    public function homerow()
    {
        $this->db->where('id_game >=', 1);
        $this->db->where('id_game <=', 16);
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
