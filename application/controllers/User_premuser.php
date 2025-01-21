<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_premuser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!($this->session->userdata('username') && $this->session->userdata('status_admin'))) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth_admin');
        }
        $this->load->model('M_premuser'); // Load model M_premuser
    }

    public function index() {
        // Mengambil data premium users dari model
        $data['premium_users'] = $this->M_premuser->get_premium_users();
        
        // Load view
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/user_premuser', $data);
        $this->load->view('template/footer');
    }

    // tambah
    public function add() {
        if ($this->input->post()) {
            $data = [
                'username_user' => $this->input->post('username_user'),
                'email_user' => $this->input->post('email_user'),
                'password_user' => password_hash($this->input->post('password_user'), PASSWORD_DEFAULT),
                'level_user' => $this->input->post('level_user'),
                'total_reward' => $this->input->post('total_reward'),
                'tgl_reg_user' => date('Y-m-d'),
                'status_user' => $this->input->post('status_user')
            ];

            $insert = $this->M_premuser->add_premium_user($data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data!');
            }
            redirect('User_premuser');
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('admin/form_add_user'); // Form untuk tambah user
            $this->load->view('template/footer');
        }
    }


    public function delete($id) {
        // Tambahkan logika untuk menghapus data pengguna premium berdasarkan ID
        $delete = $this->M_premuser->delete_premium_user($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus!');
        }
        redirect('User_premuser');
    }
}
