<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // Memuat helper auth
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login();
    }
    public function index()
    {
        // Memuat model yang diperlukan
        $this->load->model('PinjamModel');

        // Ambil data tanggal dari form filter
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Mengambil data peminjaman dari model dengan filter tanggal jika ada
        $data['peminjaman'] = $this->PinjamModel->get_data($start_date, $end_date);

        // Debug: Cek apakah data ada
        if (empty($data['peminjaman'])) {
            echo "Data peminjaman tidak ditemukan.";
            return; // Hentikan eksekusi jika tidak ada data
        }

        // Siapkan data untuk chart
        $data['labels'] = []; // Label untuk sumbu X (sekarang menjadi tanggal peminjaman)
        $data['values'] = []; // Nilai untuk sumbu Y
    
        // Mengisi data untuk chart
        foreach ($data['peminjaman'] as $row) {
            if (isset($row->total_pinjaman)) {
                // Menggunakan tanggal peminjaman sebagai label
                $data['labels'][] = $row->total_pinjaman; // Nilai peminjaman
                $data['values'][] = date('d-m-Y', strtotime($row->tgl_pinjam));
            } else {
                echo "Kolom tgl_pinjam tidak ditemukan dalam data.";
            }
        }

        // Memanggil view dashboard dengan data chart
        $this->load->view('Dashboard', $data);
    }

}
