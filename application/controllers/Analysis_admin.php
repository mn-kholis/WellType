
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis_admin extends CI_Controller {

    // Fungsi untuk menampilkan halaman analysis
    public function index() {
        $this->load->model('Mmember'); // Pastikan model dimuat
    
        // Ambil data jumlah permainan berdasarkan status user
        $gameData = $this->Mmember->getGameDataByUserType();
        
        // Format data untuk Chart.js
        $dates = array_column($gameData, 'tgl_main');
        $freeGames = array_column($gameData, 'free_games');
        $premiumGames = array_column($gameData, 'premium_games');
        
        $data['dates'] = $dates;
        $data['freeGames'] = $freeGames;
        $data['premiumGames'] = $premiumGames;
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/analysis', $data);
		$this->load->view('template/footer');
    }

    // Fungsi untuk generate PDF berdasarkan data (contoh untuk Game)
    public function generateGameReport() {
        $this->load->model('Manalysis');
        $data['games'] = $this->Manalysis->getAllGames(); // Ambil semua data game
        
        $this->load->view('admin/game_report', $data);
    }
    public function generateUserReport() {
        $this->load->model('Manalysis');
        $data['user'] = $this->Manalysis->getAllUser(); // Ambil semua data game
        
        $this->load->view('admin/user_report', $data);
    }
    public function generateContentReport() {
        $this->load->model('Manalysis');
        $data['konten'] = $this->Manalysis->getAllContent(); // Ambil semua data game
        
        $this->load->view('admin/konten_report', $data);
    }
    public function generateLeaderboardReport() {
        $this->load->model('Manalysis');
        $data['leaderboard'] = $this->Manalysis->getLeaderboard(); // Ambil semua data game
        
        $this->load->view('admin/leaderboard_report', $data);
    }
}
