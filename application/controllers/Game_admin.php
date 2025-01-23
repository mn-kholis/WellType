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
        $data['game'] = $this->Mgame->get_all_game(); // Mengambil semua data game
        $this->load->view('template/header'); // Header template
        $this->load->view('template/sidebar'); // Sidebar template
        $this->load->view('admin/game', $data); // Menampilkan data dalam view game/index
        $this->load->view('template/footer'); // Footer template
    }

     // Menambah game
    public function add() {
        $this->load->model('Mgame');
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('judul_game', 'Judul Game', 'required');
            $this->form_validation->set_rules('deskripsi_game', 'Deskripsi', 'required');
            $this->form_validation->set_rules('text_game', 'text_game', 'required');
            $this->form_validation->set_rules('reward', 'reward', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan game.');
                $this->load->view('admin/addgame'); // Form tambah game
            } else {
                // Ambil data dari form
                $data = [
                    'judul_game' => $this->input->post('judul_game'),
                    'deskripsi_game' => $this->input->post('deskripsi_game'),
                    'text_game' => $this->input->post('text_game'),
                    'reward' => $this->input->post('reward'),
                ];

                if ($this->Mgame->add_game($data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Game berhasil ditambahkan!');
                    redirect('Game_admin');
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
        $data['game'] = $this->Mgame->get_game_by_id($id_game); // Ambil data game berdasarkan id

        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('judul_game', 'Judul game', 'required');
            $this->form_validation->set_rules('deskripsi_game', 'deskripsi', 'required');
            $this->form_validation->set_rules('text_game', 'text_game', 'required');
            $this->form_validation->set_rules('reward', 'reward', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->load->view('admin/editgame', $data); // Form edit game
            } else {
                // Ambil data dari form
                $update_data = [
                    'judul_game' => $this->input->post('judul_game'),
                    'deskripsi_game' => $this->input->post('deskripsi_game'),
                    'text_game' => $this->input->post('text_game'),
                    'reward' => $this->input->post('reward'),
                ];

                if ($this->Mgame->edit_game($id_game, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'game berhasil diperbarui!');
                    redirect('game_admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui game.');
                    redirect('game_admin/edit/'.$id_game);
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('admin/editgame', $data); // Form edit game
        }
    }
    public function delete_game($id_game) {
        $this->load->model('Mgame');
        $this->Mgame->delete_game($id_game); // Hapus game berdasarkan id
        $this->session->set_flashdata('pesan_sukses','game telah terhapus');
        redirect('game_admin','refresh'); 
    }
}
