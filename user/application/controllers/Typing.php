<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typing extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mtyping');
    }

    public function index() {
        // Ambil teks target dari database
        $data['target_text'] = $this->Mtyping->getTargetText();
        $data['judul_text'] = $this->Mtyping->getJudulText();
        $this->load->view('typing', $data);
    }
}

