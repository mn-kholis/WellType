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
    public function video() {
        $this->load->view('typingvid');
    }
    public function setflash(){
        $this->Mtyping->rubah_level();
        $this->session->set_flashdata('success', 'You successfully completed the challenge.');
        redirect('ListGame');
    }
    public function erhomerow(){
        $this->session->set_flashdata('error', 'You need to complete the previous challenge.');
        redirect('ListGame');
    }
    public function erpremrow(){
        $this->session->set_flashdata('error', 'Get PLUS to open this challenge.');
        redirect('ListGame');
    }
    public function saveGameResult() {
        // Debugging: Tampilkan POST data
        log_message('debug', 'Data POST diterima: ' . json_encode($this->input->raw_input_stream));
    
        // Decode JSON
        $postData = json_decode($this->input->raw_input_stream, true);
    
        // Validasi data
        if (!isset($postData['id_game']) || !isset($postData['score']) || !isset($postData['waktu_penyelesaian'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
            return;
        }
    
        $id_user = $this->session->userdata('id_user');
        $id_game = $postData['id_game'];
        $score = $postData['score'];
        $waktu_penyelesaian = $postData['waktu_penyelesaian'];
    
        if (!$id_user || !$id_game || !$score || !$waktu_penyelesaian) {
            log_message('error', 'Data tidak lengkap');
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
            return;
        }
    
        // Simpan data ke tabel datagame
        $data = [
            'id_user' => $id_user,
            'id_game' => $id_game,
            'tgl_main' => date('Y-m-d H:i:s'),
            'score' => $score,
            'waktu_penyelesaian' => $waktu_penyelesaian,
        ];
        $this->load->model('Mtyping');
        $this->Mtyping->saveGameData($data);
    
        // Update total_reward di tabel user
        $this->Mtyping->updateReward($id_user, $score);
    
        echo json_encode(['status' => 'success']);
    }    
}

