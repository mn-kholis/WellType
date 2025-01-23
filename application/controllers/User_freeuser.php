<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_freeuser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!($this->session->userdata('username') && $this->session->userdata('status_admin'))) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth_admin');
        }
        $this->load->model('M_freeuser'); // Load model M_freeuser
    }

    public function index() {
        // Mengambil data free users dari model
        $data['free_users'] = $this->M_freeuser->get_free_users();

        // Load view
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/user_freeuser', $data);
        $this->load->view('template/footer');
    }

    public function add() {
        if ($this->input->post()) {
            $data = [
                'username_user' => $this->input->post('username_user'),
                'email_user' => $this->input->post('email_user'),
                'password_user' => password_hash($this->input->post('password_user'), PASSWORD_DEFAULT),
                'level_user' => $this->input->post('level_user'),
                'total_reward' => $this->input->post('total_reward'),
                'tgl_reg_user' => date('Y-m-d'),
                'status_user' => 'free'
            ];

            $insert = $this->M_freeuser->add_free_user($data);
            if ($insert) {
                $this->session->set_flashdata('pesan_sukses', 'Data berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan data!');
            }
            redirect('User_freeuser');
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('admin/form_add_freeuser'); // Form untuk tambah user
            $this->load->view('template/footer');
        }
    }

    public function edit($id) {
        // Ambil data pengguna berdasarkan ID
        $data['user'] = $this->M_freeuser->get_user_by_id($id);
        
        if (!$data['user']) {
            // Jika data tidak ditemukan
            $this->session->set_flashdata('error', 'Data pengguna tidak ditemukan!');
            redirect('User_freeuser');
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
    
            $update = $this->M_freeuser->update_user($id, $update_data);
    
            if ($update) {
                $this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui data!');
            }
            redirect('User_freeuser');
        } else {
            // Load form edit dengan data user
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('admin/form_edit_freeuser', $data); // Form untuk edit user
            $this->load->view('template/footer');
        }
    }

    public function delete($id) {
        if ($this->M_freeuser->delete_free_user($id)) {
            $this->session->set_flashdata('pesan_sukses', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal dihapus!');
        }
        redirect('User_freeuser');
    }

}
