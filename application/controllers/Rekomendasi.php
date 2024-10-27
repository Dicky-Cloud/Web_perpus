<?php
class Rekomendasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('RekomendasiModel');
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login(); // Memuat model RekomendasiModel
    }

    // Fungsi untuk menampilkan rekomendasi buku
    public function index() {
        // Ambil data rekomendasi buku dari model
        $data['rekomendasi_buku'] = $this->RekomendasiModel->getMostBorrowedBooks();
        
        // Load view untuk menampilkan buku rekomendasi
        $this->load->view('admin/rekomendasi_buku', $data);
    }
}
