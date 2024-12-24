<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $this->load->model('Mlist');
        $data['artikel'] = $this->Mlist->get_artikel();
		$this->load->view('dashboard', $data);
	}
}