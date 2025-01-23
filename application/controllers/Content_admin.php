<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_admin extends CI_Controller {

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
        $this->load->model('Mcontent');
        $data['konten'] = $this->Mcontent->get_all_content(); // Mengambil semua data konten
        $this->load->view('template/header'); // Header template
        $this->load->view('template/sidebar'); // Sidebar template
        $this->load->view('admin/content', $data); // Menampilkan data dalam view content/index
        $this->load->view('template/footer'); // Footer template
    }

     // Menambah konten
    public function add() {
        $this->load->model('Mcontent');
        if ($this->input->post()) {
            // Validasi input
            $this->form_validation->set_rules('judul_konten', 'Judul Konten', 'required');
            $this->form_validation->set_rules('konten', 'Konten', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Jika form tidak valid
                $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan konten.');
                $this->load->view('admin/addcontent'); // Form tambah konten
            } else {
                // Ambil data dari form
                $data = [
                    'judul_konten' => $this->input->post('judul_konten'),
                    'konten' => $this->input->post('konten') // Pastikan ada proses upload untuk gambar
                ];

                if (!empty($_FILES['gambar']['name'])) {
                    // Konfigurasi upload file
                    $config['upload_path']   = './assets/image/'; // Path penyimpanan
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file
                    $config['max_size']      = 2048; // Maksimal 2MB
                    $config['file_name']     = time() . '_' . $_FILES['gambar']['name']; // Nama file unik
                    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('gambar')) {
                        // Jika upload berhasil
                        $upload_data = $this->upload->data();
                        $data['gambar'] = $upload_data['file_name']; // Simpan nama file ke database

                        if ($this->Mcontent->add_content($data)) {
                            $this->session->set_flashdata('pesan_sukses', 'Konten berhasil ditambahkan!');
                            redirect('content');
                        } else {
                            $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan konten.');
                            redirect('content/add');
                        }
                    } else {
                        $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan konten.');
                        redirect('content/add');
                    }
                }else {
                    $this->session->set_flashdata('pesan_gagal', 'Gambar tidak boleh kosong.');
                        redirect('content/add');
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('admin/addcontent');
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
                $this->load->view('admin/editcontent', $data); // Form edit konten
            } else {
                // Ambil data dari form
                $update_data = [
                    'judul_konten' => $this->input->post('judul_konten'),
                    'konten' => $this->input->post('konten')
                ];

                if (!empty($_FILES['gambar']['name'])) {
                    // Konfigurasi upload file
                    $config['upload_path']   = './assets/image/'; // Path penyimpanan
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file
                    $config['max_size']      = 2048; // Maksimal 2MB
                    $config['file_name']     = time() . '_' . $_FILES['gambar']['name']; // Nama file unik
                    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('gambar')) {
                        // Jika upload berhasil
                        $upload_data = $this->upload->data();
                        $update_data['gambar'] = $upload_data['file_name']; // Simpan nama file ke database
                    } else {
                        $this->session->set_flashdata('pesan_gagal', 'Gagal menambahkan konten.');
                        redirect('Content_admin/add');
                    }
                }
                if ($this->Mcontent->edit_content($id_konten, $update_data)) {
                    $this->session->set_flashdata('pesan_sukses', 'Konten berhasil diperbarui!');
                    redirect('Content_admin');
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Gagal memperbarui konten.');
                    redirect('Content_admin/edit/'.$id_konten);
                }
            }
        } else {
            // Jika tidak ada post
            $this->load->view('admin/editcontent', $data); // Form edit konten
        }
    }
    public function delete_content($id_konten) {
        $this->load->model('Mcontent');
        $this->Mcontent->delete_content($id_konten); // Hapus konten berdasarkan id
        $this->session->set_flashdata('pesan_sukses','content telah terhapus');
        redirect('Content_admin','refresh'); 
    }
}
