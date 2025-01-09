<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_admin extends CI_Controller {

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
        $this->load->model('Mnotifikasi');
        $data['notifikasi'] = $this->Mnotifikasi->get_all_notifikasi(); // Mengambil semua data notifikasi
        $this->load->view('template/header'); // Header template
        $this->load->view('template/sidebar'); // Sidebar template
        $this->load->view('admin/notifikasi', $data); // Menampilkan data dalam view notifikasi/index
        $this->load->view('template/footer'); // Footer template
    }

     // Menambah notifikasi
    public function add() {
        $this->load->model('Mnotifikasi');
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('jenis_notifikasi', 'Jenis notifikasi', 'required');
            $this->form_validation->set_rules('isi_notifikasi', 'Notifikasi', 'required');
            $this->form_validation->set_rules('frekuensi', 'Frekuensi', 'required');


            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan notifikasi.');
                $this->load->view('admin/addnotifikasi'); // Form tambah notifikasi
            } else {
                // Ambil data dari form
                $data = [
                    'jenis_notifikasi' => $this->input->post('jenis_notifikasi'),
                    'isi_notifikasi' => $this->input->post('isi_notifikasi'),
                    'frekuensi' => $this->input->post('frekuensi'),
                ];

                if ($this->Mnotifikasi->add_notifikasi($data)) {
                    $this->session->set_flashdata('pesan_sukses', 'notifikasi berhasil ditambahkan!');
                    redirect('Notifikasi_admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan notifikasi.');
                    redirect('Notifikasi_admin/add');
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('admin/addnotifikasi');
        }
    }

    // Edit notifikasi berdasarkan id
    public function edit($id_notifikasi) {
        $this->load->model('Mnotifikasi');
        $data['notifikasi'] = $this->Mnotifikasi->get_notifikasi_by_id($id_notifikasi); // Ambil data notifikasi berdasarkan id

        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('jenis_notifikasi', 'jenis notifikasi', 'required');
            $this->form_validation->set_rules('isi_notifikasi', 'Notifikasi', 'required');
            $this->form_validation->set_rules('frekuensi', 'Frekuensi', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->load->view('admin/editnotifikasi', $data); // Form edit notifikasi
            } else {
                // Ambil data dari form
                $update_data = [
                    'jenis_notifikasi' => $this->input->post('jenis_notifikasi'),
                    'isi_notifikasi' => $this->input->post('isi_notifikasi'),
                    'frekuensi' => $this->input->post('frekuensi'),
                ];

                if ($this->Mnotifikasi->edit_notifikasi($id_notifikasi, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'notifikasi berhasil diperbarui!');
                    redirect('Notifikasi_admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui notifikasi.');
                    redirect('Notifikasi_admin/edit/'.$id_notifikasi);
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('admin/editnotifikasi', $data); // Form edit notifikasi
        }
    }
    public function delete_notifikasi($id_notifikasi) {
        $this->load->model('Mnotifikasi');
        $this->Mnotifikasi->delete_notifikasi($id_notifikasi); // Hapus notifikasi berdasarkan id
        redirect('notifikasi_admin'); // Redirect kembali ke halaman notifikasi
        $this->session->set_flashdata('pesan_sukses','notifikasi telah terhapus');
        redirect('notifikasi_admin','refresh'); 
    }
}
