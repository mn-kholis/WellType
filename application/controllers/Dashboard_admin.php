<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth_admin'); // Redirect ke halaman login jika belum login
        }
    }
	public function index()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/index');
		$this->load->view('template/footer');
	}
}
