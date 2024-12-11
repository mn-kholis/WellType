<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
function __construct(){

    parent::__construct();

    if($this->session->userdata("id_user")){
        redirect('Dashboard','refresh');
    }
    $this->load->library('form_validation');
}

public function index() {
    $this->load->view('auth_view'); // Ganti 'auth_view' dengan nama file view Anda
}
public function signup() {
    // Aturan validasi untuk signup
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    $this->form_validation->set_message("required", "%s wajib diisi.");
    $this->form_validation->set_message("min_length", "%s harus memiliki minimal %d karakter.");
    $this->form_validation->set_message("max_length", "%s tidak boleh lebih dari %d karakter.");
    $this->form_validation->set_message("valid_email", "Format %s tidak valid.");

    // Jika validasi gagal
    if ($this->form_validation->run() == FALSE) {
        // Tampilkan kembali view dengan error
        $data['signup_errors'] = validation_errors();
        $this->session->set_flashdata('signup_error', 'Signup gagal! Silakan cek kembali.', $data['signup_errors']);
        redirect('Auth');
    } else {
        // Ambil data dari form
        $m['username_user'] = $this->input->post('username');
        $m['email_user'] = $this->input->post('email');
        $m['password_user'] = $this->input->post('password');
        $m['password_user'] = sha1($m['password_user']);
        $m['status_user'] = "free";
        $m['total_reward'] = 0;
        $m['best_wpm'] = 0;
        $m['level_user'] = 0;
        $m['tgl_reg_user'] = date('Y-m-d');
        
        $this->load->model("Mmember");
        $this->Mmember->register($m);
        $this->session->set_flashdata('signup_succes', 'Signup Berhasil! Silahkan Melakukan Login.');
        redirect('Auth'); // Kembali ke halaman form setelah signup
    }
}

public function signin() {
    // Aturan validasi untuk signin
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    // Jika validasi gagal
    if ($this->form_validation->run() == FALSE) {
        // Tampilkan kembali view dengan error
        $data['signin_errors'] = validation_errors();
        $this->session->set_flashdata('signin_error', 'Signin gagal! Periksa email dan password Anda.', $data['signin_errors']);
        redirect('Auth');
    } else {
        // Ambil data dari form
        $inputan = $this->input->post();
        $this->load->model("Mmember");
			$output = $this->Mmember->login($inputan);

			if($output=="ada"){
				$this->session->set_flashdata('pesan_sukses', 'Berhasil login');
				redirect('Dashboard','refresh');
			}else{
				$this->session->set_flashdata('pesan_gagal', 'Username atau password salah, silakan coba lagi.');
				redirect('Auth','refresh');
			}
    }
}
}