<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {


    // Mengubah nama method menjadi index agar sesuai dengan routing
    public function index() {
        $this->load->model('Mcontent'); 
        $data['konten'] = $this->Mcontent->get_all_content(); // Mengambil semua data konten
        $this->load->view('template/header'); // Header template
        $this->load->view('content', $data); // Menampilkan data dalam view content/index
        $this->load->view('template/footer'); // Footer template
    }

    // Menghapus konten berdasarkan id
    public function delete_content($id_konten) {
        $this->load->model('Mcontent');
        $this->Mcontent->delete_content($id_konten); // Hapus konten berdasarkan id
        redirect('content'); // Redirect kembali ke halaman konten
        $this->session->set_flashdata('pesan_sukses','content telah terhapus');
        redirect('content','refresh'); 
    }
}
