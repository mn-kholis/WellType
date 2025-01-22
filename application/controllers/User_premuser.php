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
                'status_user' => 'premium'
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
            $this->load->view('admin/form_add_premuser'); // Form untuk tambah user
            $this->load->view('template/footer');
        }
    }

    public function edit($id) {
        // Ambil data pengguna berdasarkan ID
        $data['user'] = $this->M_premuser->get_user_by_id($id);
        
        if (!$data['user']) {
            // Jika data tidak ditemukan
            $this->session->set_flashdata('error', 'Data pengguna tidak ditemukan!');
            redirect('User_premuser');
        }
    
        if ($this->input->post()) {
            // Data yang akan diperbarui
            $update_data = [
                'username_user' => $this->input->post('username_user'),
                'email_user' => $this->input->post('email_user'),
                'level_user' => $this->input->post('level_user'),
                'total_reward' => $this->input->post('total_reward'),
                'status_user' => $this->input->post('status_user')
            ];
    
            // Jika password diubah
            if (!empty($this->input->post('password_user'))) {
                $update_data['password_user'] = password_hash($this->input->post('password_user'), PASSWORD_DEFAULT);
            }
    
            $update = $this->M_premuser->update_user($id, $update_data);
    
            if ($update) {
                $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data!');
            }
            redirect('User_premuser');
        } else {
            // Load form edit dengan data user
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('admin/form_edit_premuser', $data); // Form untuk edit user
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
