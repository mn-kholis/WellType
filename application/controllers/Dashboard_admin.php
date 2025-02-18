<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!($this->session->userdata('username')&&$this->session->userdata('status_admin'))) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth_admin'); // Redirect ke halaman login jika belum login
        }
    }
	public function index()
	{
        $this->load->model('Mmember'); // Pastikan model dimuat
    
        // Ambil data jumlah permainan berdasarkan status user
        $gameData = $this->Mmember->getGameDataByUserType();
        
        // Format data untuk Chart.js
        $dates = array_column($gameData, 'tgl_main');
        $freeGames = array_column($gameData, 'free_games');
        $premiumGames = array_column($gameData, 'premium_games');
        $data['topUsers'] = $this->Mmember->getTopUsersByReward();
        $data['dates'] = $dates;
        $data['freeGames'] = $freeGames;
        $data['premiumGames'] = $premiumGames;

        $data['premium_count'] = $this->Mmember->count_users_by_status('premium');
        $data['free_count'] = $this->Mmember->count_users_by_status('free');
        $data['total_count'] = $this->Mmember->count_total_users();
    
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/index', $data);
		$this->load->view('template/footer');
	}
}
