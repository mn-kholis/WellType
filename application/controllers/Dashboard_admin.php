<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

	public function index()
	{
		$this->load->view('template/footer');
        $this->load->view('template/header');
        $this->load->view('template/index');
        $this->load->view('template/sidebar');
	}
}
