<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_freeuser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login sebagai admin
        if (!$this->session->userdata('username') || !$this->session->userdata('status_admin')) {
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
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('level', 'Level', 'required');

            if ($this->form_validation->run()) {
                $data = [
                    'username_user' => $this->input->post('username'),
                    'email_user' => $this->input->post('email'),
                    'password_user' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'level_user' => $this->input->post('level'),
                    'total_reward' => $this->input->post('total_reward'),
                    'tgl_reg_user' => date('Y-m-d'),
                    'status_user' => 'free'
                ];

                if ($this->M_freeuser->add_free_user($data)) {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data!');
                }
                redirect('User_freeuser');
            }
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('form_add_user');
        $this->load->view('template/footer');
    }

    public function edit($id) {
        $data['user'] = $this->M_freeuser->get_user_by_id($id);

        if (empty($data['user'])) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('User_freeuser');
        }

        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('level', 'Level', 'required');

            if ($this->form_validation->run()) {
                $update_data = [
                    'username_user' => $this->input->post('username'),
                    'email_user' => $this->input->post('email'),
                    'level_user' => $this->input->post('level'),
                    'total_reward' => $this->input->post('total_reward')
                ];

                if ($this->input->post('password')) {
                    $update_data['password_user'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                }

                if ($this->M_freeuser->update_user($id, $update_data)) {
                    $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui data!');
                }
                redirect('User_freeuser');
            }
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('form_edit_user', $data);
        $this->load->view('template/footer');
    }

    public function delete($id) {
        if ($this->M_freeuser->delete_free_user($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus!');
        }
        redirect('User_freeuser');
    }
}
