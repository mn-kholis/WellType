<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typing extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mtyping');
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }

    public function game($id_game) {
        // Ambil teks target dari database
        $data['target'] = $this->Mtyping->getTargetText($id_game);
        $this->load->view('typing', $data);
    }
    public function setflash(){
        $this->session->set_flashdata('success', 'You successfully completed the challenge, go to the next level.');
        redirect('ListGame');
    }
}

