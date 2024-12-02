<?php 
	class Logout extends CI_Controller {

		public function index()
		{
			//redirect ke halaman login
			$this->session->set_flashdata('pesan_sukses', 'You have logged out!');
			redirect('/','refresh');
		}
	}
?>