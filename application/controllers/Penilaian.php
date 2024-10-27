<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PenilaianModel'); 
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login();
    }

    public function index() {
        // Ambil data dari model
        $data['kriteria_terbit'] = $this->PenilaianModel->get_kriteria_terbit();
        $data['kriteria_peminjaman'] = $this->PenilaianModel->get_kriteria_peminjaman();
        $data['kriteria_halaman'] = $this->PenilaianModel->get_kriteria_halaman();
        $data['kriteria_rating'] = $this->PenilaianModel->get_kriteria_rating();
        
        // Load view dengan data yang sudah diisi
        $this->load->view('admin/pelayanan_view', $data);
    }
        public function edit_kriteria($table, $id_kriteria) {
            // Tentukan nama tabel yang ingin diakses berdasarkan parameter $table
            $valid_tables = ['kriteria_peminjaman', 'kriteria_rating', 'kriteria_halaman', 'kriteria_terbit'];
            
            if (!in_array($table, $valid_tables)) {
                show_404(); // Jika tabel tidak valid, tampilkan halaman 404
            }
            
            // Mendapatkan data kriteria berdasarkan ID dan tabel
            $data['kriteria'] = $this->PenilaianModel->getKriteriaById($table, $id_kriteria);
            
            // Proses update data jika form dikirim
            if ($this->input->post()) {
                // Ambil data dari form
                $pilihan_kriteria = $this->input->post('edit_pilihan_kriteria');
                $bobot_kriteria = $this->input->post('edit_bobot_kriteria');
        
                // Data yang akan diupdate
                $data_kriteria = [
                    'pilihan_kriteria' => $pilihan_kriteria,
                    'bobot_kriteria' => $bobot_kriteria
                ];
            
                // Update kriteria di tabel yang dipilih
                if ($this->PenilaianModel->updateKriteria($table, $id_kriteria, $data_kriteria)) {
                    // Redirect ke halaman kriteria setelah update berhasil
                    redirect('penilaian');
                } else {
                    // Tampilkan pesan kesalahan jika update gagal
                    $data['error'] = 'Gagal memperbarui data. Silakan coba lagi.';
                }
            }
            
            // Tampilkan halaman edit kriteria
            $this->load->view('admin/pelayanan_view', $data); // Pastikan untuk memuat view edit yang benar
        }
        
    
}    

