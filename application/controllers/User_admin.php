<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!($this->session->userdata('username') && $this->session->userdata('status_admin'))) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth_admin'); // Redirect ke halaman login jika belum login
        }
        $this->load->model('M_admin'); // Load model M_admin
    }

    // Mengubah nama method menjadi index agar sesuai dengan routing
    public function index() {
        $data['admin'] = $this->M_admin->get_all_admin(); // Mengambil semua data admin
        $this->load->view('template/header'); // Header template
        $this->load->view('template/sidebar'); // Sidebar template
        $this->load->view('admin/user_admin', $data); // Menampilkan data dalam view admin/index
        $this->load->view('template/footer'); // Footer template
    }

    public function add() {
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
            $this->form_validation->set_rules('email_admin', 'Email Admin', 'required|valid_email');
            $this->form_validation->set_rules('password_admin', 'Password Admin', 'required');
            $this->form_validation->set_rules('status_admin', 'Status Admin', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                // Jika validasi gagal
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('admin/form_add_admin');
                $this->load->view('template/footer');
            } else {
                // Ambil data dari form
                $new_admin_data = [
                    'username_admin' => $this->input->post('username_admin'),
                    'email_admin' => $this->input->post('email_admin'),
                    'password_admin' => password_hash($this->input->post('password_admin'), PASSWORD_DEFAULT), // Enkripsi password
                    'status_admin' => $this->input->post('status_admin') // Tambahkan status admin
                ];
    
                if ($this->M_admin->add($new_admin_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Admin baru berhasil ditambahkan!');
                    redirect('User_admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan admin baru.');
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('admin/form_add_admin');
                    $this->load->view('template/footer');
                }
            }
        } else {
            // Tampilkan form tambah admin
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('admin/form_add_admin');
            $this->load->view('template/footer');
        }
    }
   
    public function edit($id_admin) {
        $data['admin'] = $this->M_admin->get_admin_by_id($id_admin); // Ambil data admin berdasarkan id
    
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
            $this->form_validation->set_rules('email_admin', 'Email Admin', 'required');
            $this->form_validation->set_rules('status_admin', 'Status Admin', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('admin/form_edit_admin', $data);
                $this->load->view('template/footer');
            } else {
                $update_data = [
                    'username_admin' => $this->input->post('username_admin'),
                    'email_admin' => $this->input->post('email_admin'),
                    'status_admin' => $this->input->post('status_admin') // Update status admin
                ];
    
                if ($this->M_admin->edit($id_admin, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Admin berhasil diperbarui!');
                    redirect('User_admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui admin.');
                    redirect('admin/edit/' . $id_admin);
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('admin/form_edit_admin', $data); 
            $this->load->view('template/footer');
        }
    }

    // Menghapus admin berdasarkan id
    public function delete($id_admin) {
        $this->M_admin->delete($id_admin); // Hapus admin berdasarkan id
        $this->session->set_flashdata('pesan_sukses', 'Admin telah dihapus.');
        redirect('admin');
    }
}
