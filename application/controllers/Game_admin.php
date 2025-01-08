<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Pastikan pengguna sudah login
        if (!($this->session->userdata('username')&&$this->session->userdata('status_admin'))) {
            $this->session->set_flashdata('signin_error', 'Anda Belum Login! Silakan Login Terlebih Dahulu.');
            redirect('Auth_admin'); // Redirect ke halaman login jika belum login
        }
    }
    // Mengubah nama method menjadi index agar sesuai dengan routing
    public function index() {
        $this->load->model('Mgame');
        $data['game'] = $this->Mgame->get_all_content(); // Mengambil semua data game
        $this->load->view('template/header'); // Header template
        $this->load->view('template/sidebar'); // Sidebar template
        $this->load->view('admin/content', $data); // Menampilkan data dalam view content/index
        $this->load->view('template/footer'); // Footer template
    }

     // Menambah game
    public function add() {
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('judul_game', 'Judul Game', 'required');
            $this->form_validation->set_rules('deskripsi_game', 'Deskripsi', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan game.');
                $this->load->view('admin/addgame'); // Form tambah game
            } else {
                // Ambil data dari form
                $data = [
                    'judul_game' => $this->input->post('judul_game'),
                    'deskripsi_game' => $this->input->post('deskripsi'),
                ];

                if ($this->Mcontent->add_content($data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Game berhasil ditambahkan!');
                    redirect('game');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan game.');
                    redirect('game/add');
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('admin/addgame');
        }
    }

    // Edit game berdasarkan id
    public function edit($id_game) {
        $this->load->model('Mgame');
        $data['game'] = $this->Mcontent->get_content_by_id($id_game); // Ambil data game berdasarkan id

        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('judul_game', 'Judul game', 'required');
            $this->form_validation->set_rules('game', 'game', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->load->view('admin/editcontent', $data); // Form edit game
            } else {
                // Ambil data dari form
                $update_data = [
                    'judul_game' => $this->input->post('judul_game'),
                    'game' => $this->input->post('game'),
                    'gambar' => $this->input->post('gambar') // Proses upload gambar harus ditangani di sini
                ];

                if ($this->Mcontent->edit_content($id_game, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'game berhasil diperbarui!');
                    redirect('Content_admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui game.');
                    redirect('Content_admin/edit/'.$id_game);
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('admin/editcontent', $data); // Form edit game
        }
    }
    public function delete_content($id_game) {
        $this->load->model('Mcontent');
        $this->Mcontent->delete_content($id_game); // Hapus game berdasarkan id
        redirect('Content_admin'); // Redirect kembali ke halaman game
        $this->session->set_flashdata('pesan_sukses','content telah terhapus');
        redirect('Content_admin','refresh'); 
    }
}
