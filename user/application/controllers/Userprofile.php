<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model Muserprofile untuk mengakses data pengguna
        $this->load->model('Muserprofile');
        $this->load->model('Mmember');
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth'); // Redirect ke halaman login jika belum login
        }
    }

    public function index() {
        // Ambil data pengguna berdasarkan username yang tersimpan di session
        $username = $this->session->userdata('username');
        $data['user'] = $this->Muserprofile->get_user_profile($username);

        // Tampilkan halaman profil dengan data pengguna
        $this->load->view('Userprofile', $data);
    }
    public function edit() {
        $id_user = $this->session->userdata('id_user');
        $username = $this->session->userdata('username');
        $data['user'] = $this->Muserprofile->get_user_profile($username); // Ambil data konten berdasarkan username
    
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
    
            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->load->view('edituserprofile', $data);
            } else {
                // Ambil data dari form
                $update_data = [
                    'username_user' => $this->input->post('username'),
                    'email_user' => $this->input->post('email'),
                ];
    
                // Cek apakah ada file gambar yang di-upload
                if (!empty($_FILES['profile_picture']['name'])) {
                    // Konfigurasi upload file
                    $config['upload_path']   = './assets/image/'; // Path penyimpanan
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file
                    $config['max_size']      = 2048; // Maksimal 2MB
                    $config['file_name']     = time() . '_' . $_FILES['profile_picture']['name']; // Nama file unik
                    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('profile_picture')) {
                        // Jika upload berhasil
                        $upload_data = $this->upload->data();
                        $update_data['foto_user'] = $upload_data['file_name']; // Simpan nama file ke database
                    } else {
                        // Jika upload gagal
                        $this->session->set_flashdata('pesan_gagal', $this->upload->display_errors());
                        redirect('Userprofile/edit/');
                    }
                }
    
                // Update data user
                if ($this->Mmember->edit_user($id_user, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Data berhasil diperbarui!');
                    redirect('Userprofile/edit');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui data.');
                    redirect('Userprofile/edit/');
                }
            }
        }
        $this->load->view('edituserprofile', $data);
    }
    
}
?>
