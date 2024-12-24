<?php
class Leaderboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }
	public function index()
	{
        $this->load->model('Mlist');
        $data['lead'] = $this->Mlist->get_top_10_rewards();
		$this->load->view('leaderboard', $data);
	}
}