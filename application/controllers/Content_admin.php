<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_admin extends CI_Controller {


    // Mengubah nama method menjadi index agar sesuai dengan routing
    public function index() {
        $this->load->model('Mcontent');
        $data['konten'] = $this->Mcontent->get_all_content(); // Mengambil semua data konten
        $this->load->view('template/header'); // Header template
        $this->load->view('admin/content', $data); // Menampilkan data dalam view content/index
        $this->load->view('template/footer'); // Footer template
    }

     // Menambah konten
    public function add() {
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('judul_konten', 'Judul Konten', 'required');
            $this->form_validation->set_rules('konten', 'Konten', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->load->view('template/header');
                $this->load->view('admin/addcontent'); // Form tambah konten
                $this->load->view('template/footer');
            } else {
                // Ambil data dari form
                $data = [
                    'judul_konten' => $this->input->post('judul_konten'),
                    'konten' => $this->input->post('konten'),
                    'gambar' => $this->input->post('gambar') // Pastikan ada proses upload untuk gambar
                ];

                if ($this->Mcontent->add_content($data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Konten berhasil ditambahkan!');
                    redirect('content');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan konten.');
                    redirect('content/add');
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('template/header');
            $this->load->view('admin/addcontent');
            $this->load->view('template/footer');
        }
    }

    // Edit konten berdasarkan id
    public function edit($id_konten) {
        $this->load->model('Mcontent');
        $data['konten'] = $this->Mcontent->get_content_by_id($id_konten); // Ambil data konten berdasarkan id

        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('judul_konten', 'Judul Konten', 'required');
            $this->form_validation->set_rules('konten', 'Konten', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->load->view('template/header');
                $this->load->view('admin/editcontent', $data); // Form edit konten
                $this->load->view('template/footer');
            } else {
                // Ambil data dari form
                $update_data = [
                    'judul_konten' => $this->input->post('judul_konten'),
                    'konten' => $this->input->post('konten'),
                    'gambar' => $this->input->post('gambar') // Proses upload gambar harus ditangani di sini
                ];

                if ($this->Mcontent->edit_content($id_konten, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Konten berhasil diperbarui!');
                    redirect('content');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui konten.');
                    redirect('content/edit/' . $id_konten);
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('template/header');
            $this->load->view('admin/editcontent', $data); // Form edit konten
        }
    }
    // // Tambah konten
    // public function add() {
    //     $this->load->model('Mcontent');

    //     if ($this->input->post()) {
    //         // Ambil data dari form
    //         $data = [
    //             'judul_konten' => $this->input->post('judul_konten'),
    //             'konten' => $this->input->post('konten'),
    //             'gambar' => $this->input->post('gambar') 
    //         ];

    //         if ($this->Mcontent->add_content($data)) {
    //             $this->session->set_flashdata('pesan_sukses', 'Konten berhasil ditambahkan!');
    //             redirect('content');
    //         } else {
    //             $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan konten.');
    //         }
    //     }

    //     $this->load->view('template/header');
    //     $this->load->view('addcontent'); // Buatkan view untuk form tambah konten
    //     $this->load->view('template/footer');
    // }

    // // Edit konten berdasarkan id
    // public function edit($id_konten) {
    //     $this->load->model('Mcontent');

    //     $data['konten'] = $this->Mcontent->get_all_content($id_konten); // Ambil data konten berdasarkan id

    //     if ($this->input->post()) {
    //         // Ambil data dari form
    //         $update_data = [
    //             'judul_konten' => $this->input->post('judul_konten'),
    //             'konten' => $this->input->post('konten'),
    //             'gambar' => $this->input->post('gambar') // Pastikan ada proses upload untuk gambar
    //         ];

    //         if ($this->Mcontent->edit_content($id_konten, $update_data)) {
    //             $this->session->set_flashdata('pesan_sukses', 'Konten berhasil diperbarui!');
    //             redirect('content');
    //         } else {
    //             $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui konten.');
    //         }
    //     }

    //     $this->load->view('template/header');
    //     $this->load->view('editcontent', $data); // Buatkan view untuk form edit konten
    //     $this->load->view('template/footer');
    // }

    // Menghapus konten berdasarkan id
    public function delete_content($id_konten) {
        $this->load->model('Mcontent');
        $this->Mcontent->delete_content($id_konten); // Hapus konten berdasarkan id
        redirect('Content_admin'); // Redirect kembali ke halaman konten
        $this->session->set_flashdata('pesan_sukses','content telah terhapus');
        redirect('Content_admin','refresh'); 
    }
}
