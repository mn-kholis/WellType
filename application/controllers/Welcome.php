<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (($this->session->userdata('username')&&$this->session->userdata('status_admin'))) {
            redirect('Logout_admin');
        }
    }
	public function index()
	{
        $this->load->model('Mlist');
        $data['artikel'] = $this->Mlist->get_artikel();
		$this->load->view('dashboard', $data);
	}
}