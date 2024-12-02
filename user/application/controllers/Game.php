<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mlevel_game'); // Load model
    }

    public function index() {
        $data['current_level'] = $this->Mlevel_game->get_current_level(1); // Ambil level saat ini
        $this->load->view('game', $data); // Load view dengan data
    }
}