<?php
class dashboard extends CI_Controller {

	public function index()
	{
        $this->load->model('Mlist');
        $data['artikel'] = $this->Mlist->get_artikel();
		print_r($data);
		exit();
		$this->load->view('Dashboard', $data);
	}
}
