<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mlevel_game'); // Load model
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }

    public function index() {
        $data['current_level'] = $this->Mlevel_game->get_current_level(1); // Ambil level saat ini
        $this->load->view('game', $data); // Load view dengan data
    }
}