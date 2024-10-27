<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model yang berhubungan
        $this->load->model('HasilModel');
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login();
    }

    // Fungsi untuk menampilkan hasil dan perhitungan normalisasi
    public function index() {
        // Mengambil data penilaian dari model
        $data_penilaian = $this->HasilModel->get_all_penilaian();

        // Inisialisasi variabel untuk menyimpan total bobot setiap kriteria
        $total_bobot_rating = 0;
        $total_bobot_peminjaman = 0;
        $total_bobot_terbit = 0;
        $total_bobot_halaman = 0;

        // Hitung total bobot dari setiap kriteria
        foreach ($data_penilaian as $penilaian) {
            $total_bobot_rating += $penilaian->bobot_rating;
            $total_bobot_peminjaman += $penilaian->bobot_peminjaman;
            $total_bobot_terbit += $penilaian->bobot_terbit;
            $total_bobot_halaman += $penilaian->bobot_halaman;
        }

        // Hitung normalisasi untuk setiap kriteria
        foreach ($data_penilaian as &$penilaian) {
            $penilaian->normalisasi_rating = $penilaian->bobot_rating / $total_bobot_rating;
            $penilaian->normalisasi_peminjaman = $penilaian->bobot_peminjaman / $total_bobot_peminjaman;
            $penilaian->normalisasi_terbit = $penilaian->bobot_terbit / $total_bobot_terbit;
            $penilaian->normalisasi_halaman = $penilaian->bobot_halaman / $total_bobot_halaman;
        }

        // Tambahkan langkah perhitungan ranking
        // Definisikan bobot untuk setiap kriteria (sesuaikan dengan kebutuhan)
        $bobot_rating = 0.4;    // Bobot untuk kriteria rating
        $bobot_peminjaman = 0.3; // Bobot untuk kriteria jumlah peminjaman
        $bobot_terbit = 0.2;     // Bobot untuk kriteria tahun terbit
        $bobot_halaman = 0.1;    // Bobot untuk kriteria jumlah halaman

        // Hitung nilai akhir untuk setiap item berdasarkan bobot
        foreach ($data_penilaian as &$penilaian) {
            $penilaian->nilai_akhir = (
                $penilaian->normalisasi_rating * $bobot_rating +
                $penilaian->normalisasi_peminjaman * $bobot_peminjaman +
                $penilaian->normalisasi_terbit * $bobot_terbit +
                $penilaian->normalisasi_halaman * $bobot_halaman
            );
        }

        // Urutkan data berdasarkan nilai akhir secara menurun (descending)
        usort($data_penilaian, function($a, $b) {
            return $b->nilai_akhir <=> $a->nilai_akhir;
        });

        // Mengirim data ke view
        $data['penilaian'] = $data_penilaian;
        $this->load->view('admin/hasil_view', $data);
    }
}
