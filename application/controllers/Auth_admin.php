<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (($this->session->userdata('username')&&$this->session->userdata('status_admin'))) {
            $this->session->set_flashdata('pesan_gagal', 'Anda Sudah Login!');
            redirect('Dashboard_admin'); // Redirect ke halaman login jika belum login
        }
    }
    public function index()
	{
		$inputan = $this->input->post();

		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("password","Password","required");

		$this->form_validation->set_message("required","%s wajib diisi");

		if ($this->form_validation->run()==TRUE) {

			$this->load->model('Madmin');
			$output = $this->Madmin->login($inputan);

			if ($output=="ada") {
				$this->session->set_flashdata('pesan_sukses',"Berhasil Login");
				redirect('Dashboard_admin','refresh');
			}else{
				$this->session->set_flashdata('pesan_gagal',"Gagal Login");
				redirect('Auth_admin','refresh');
			}

		}

		$this->load->view('admin/auth_view');
	}
}