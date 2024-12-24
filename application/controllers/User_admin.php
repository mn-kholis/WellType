<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {


    // Mengubah nama method menjadi index agar sesuai dengan routing
    public function index() {
        $this->load->model('M_admin'); 
        $data['admin'] = $this->M_admin->get_all_admin(); // Mengambil semua data konten
        $this->load->view('template/header'); // Header template
        $this->load->view('admin/user_admin', $data); // Menampilkan data dalam view admin/index
        $this->load->view('template/footer'); // Footer template
    }

    // Edit konten berdasarkan id
    public function edit($id_admin) {
        $this->load->model('M_admin'); 
        $data['admin'] = $this->M_admin->get_admin_by_id($id_admin); // Ambil data konten berdasarkan id

        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('username_admin', 'Username Admin', 'required');
            $this->form_validation->set_rules('email_admin', 'Email Admin', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->load->view('template/header');
                $this->load->view('editadmin', $data);
                $this->load->view('template/footer');
            } else {
                // Ambil data dari form
                $update_data = [
                    'username_admin' => $this->input->post('username_admin'),
                    'email_admin' => $this->input->post('email_admin'),
                ];

                if ($this->M_admin->edit_admin($id_admin, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Konten berhasil diperbarui!');
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui konten.');
                    redirect('admin/edit/' . $id_admin);
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('template/header');
            $this->load->view('editadmin', $data); // Form edit konten
            $this->load->view('template/footer');
        }
    }
       // Menghapus konten berdasarkan id
       public function delete_admin($id_admin) {
        $this->load->model('M_admin');
        $this->M_admin->delete_admin($id_admin); // Hapus konten berdasarkan id
        redirect('admin'); // Redirect kembali ke halaman konten
        $this->session->set_flashdata('pesan_sukses','admin telah terhapus');
        redirect('admin','refresh'); 
    }
}