<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

class Cgame extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mwpm');
        $this->load->helper('url');
    }

    public function index() {
        $userId = 1; //$this->session->userdata('user_id');
        $bestWpmValue = $this->Mwpm->getBestWpm($userId);
        $data['bestWpm'] = $bestWpmValue->best_wpm;
        $this->load->view('cgame', $data); // Load view dengan data
    }

    // Endpoint untuk menyimpan Best WPM baru
    public function saveBestWpm(){
        // Pastikan ini adalah request AJAX
        if ($this->input->method() === 'post') {
            $input = json_decode(file_get_contents('php://input'), true);
            if (isset($input['bestWpm'])) {
                $bestWpm = $input['bestWpm'];
                $this->load->model('Mwpm');
                
                // Simpan Best WPM ke database
                // $result = $this->Mwpm->updateBestWpm($this->session->userdata('user_id'), $bestWpm);
                $result = $this->Mwpm->updateBestWpm(1, $bestWpm);
                if ($result) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Gagal menyimpan Best WPM.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Data tidak valid.']);
            }
        } else {
            show_404();
        }
    }
}