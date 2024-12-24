<?php 
	class Logout extends CI_Controller {

		public function index()
		{
			// Hapus semua session userdata
			$this->session->sess_destroy();

			// Set flashdata untuk notifikasi logout
			$this->session->set_flashdata('pesan_sukses', 'You have logged out!');

			// Redirect ke halaman login atau halaman utama
			redirect('/', 'refresh');
		}
	}
?>