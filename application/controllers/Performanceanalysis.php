<?php
class Performanceanalysis extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        $this->load->model('Mwpm');
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }
	public function index()
	{   $bestWpmValue = $this->Mwpm->getBestWpm($this->session->userdata('id_user'));
        $data['bestWpm'] = $bestWpmValue->best_wpm;
		$this->load->view('performanceanalysis', $data);
	}
}
