<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Cgame extends CI_Controller {

    public function index() {
        $this->load->view('cgame'); // Load view dengan data
    }
}