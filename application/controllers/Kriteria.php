<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('KriteriaModel');
        $this->load->helper('auth_helper');
	
			// Panggil fungsi check_login untuk memastikan pengguna sudah login
			check_login();
    }

    public function index() {
        // Load semua data yang diperlukan
        $data['penilaian'] = $this->KriteriaModel->get_penilaian_with_kriteria();
        $data['buku'] = $this->KriteriaModel->get_all_buku();
        $data['kriteria_rating'] = $this->KriteriaModel->get_all_rating();
        $data['kriteria_peminjaman'] = $this->KriteriaModel->get_kriteria_peminjaman();
        $data['kriteria_terbit'] = $this->KriteriaModel->get_kriteria_terbit();
        $data['kriteria_halaman'] = $this->KriteriaModel->get_kriteria_halaman();

        $this->load->view('admin/kriteria_view', $data);
    }

    // Fungsi tambah data penilaian buku
    public function tambah() {
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'id_kriteria_rating' => $this->input->post('id_kriteria_rating'),
            'id_kriteria_peminjaman' => $this->input->post('id_kriteria_peminjaman'),
            'id_kriteria_terbit' => $this->input->post('id_kriteria_terbit'),
            'id_kriteria_halaman' => $this->input->post('id_kriteria_halaman')
        );

        $this->db->insert('penilaian', $data); // Insert data ke tabel 'penilaian'
        redirect('kriteria'); // Redirect ke halaman kriteria setelah insert
    }

    // Fungsi untuk menghapus data penilaian berdasarkan ID
    public function hapus($id_penilaian) {
        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->delete('penilaian'); // Hapus data berdasarkan ID penilaian

        redirect('kriteria'); // Redirect ke halaman kriteria setelah hapus
    }

    // Fungsi untuk menampilkan form edit data penilaian
    public function edit($id_penilaian) {
        // Ambil data penilaian berdasarkan ID 
        $data['penilaian'] = $this->db->get_where('penilaian', array('id_penilaian' => $id_penilaian))->row();
    
        
        // Jika penilaian tidak ditemukan, redirect atau tampilkan error
        if (!$penilaian) {
            // Redirect atau tampilkan error sesuai kebutuhan
            redirect('kriteria');
            return;
        }
        
        // Ambil data lain yang diperlukan untuk form
        $data['penilaian'] = $penilaian; // simpan sebagai objek
        $data['buku'] = $this->KriteriaModel->get_all_buku();
        $data['kriteria_rating'] = $this->KriteriaModel->get_all_rating();
        $data['kriteria_peminjaman'] = $this->KriteriaModel->get_kriteria_peminjaman();
        $data['kriteria_terbit'] = $this->KriteriaModel->get_kriteria_terbit();
        $data['kriteria_halaman'] = $this->KriteriaModel->get_kriteria_halaman();
        
        // Memproses data jika form disubmit
        if ($this->input->post()) {
            // Ambil data dari form
            $data_update = [
                'id_buku' => $this->input->post('id_buku'),
                'rating' => $this->input->post('id_kriteria_rating'),
                'jumlah_peminjaman' => $this->input->post('id_kriteria_peminjaman'),
                'tahun_terbit' => $this->input->post('id_kriteria_terbit'),
                'jumlah_halaman' => $this->input->post('id_kriteria_halaman')
            ];
    
            // Update data penilaian
            $this->db->update('penilaian', $data_update, ['id_penilaian' => $id_penilaian]);
            
            // Redirect atau berikan pesan sukses setelah update
            redirect('kriteria'); // Sesuaikan URL sesuai kebutuhan
        }
    
        // Muat view untuk edit penilaian
        $this->load->view('admin/kriteria_view', $data);
    }
    
    
    
    // Fungsi untuk mengupdate data penilaian
    public function update() {
        $id_penilaian = $this->input->post('id_penilaian');
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'id_kriteria_rating' => $this->input->post('id_kriteria_rating'),
            'id_kriteria_peminjaman' => $this->input->post('id_kriteria_peminjaman'),
            'id_kriteria_terbit' => $this->input->post('id_kriteria_terbit'),
            'id_kriteria_halaman' => $this->input->post('id_kriteria_halaman')
        );

        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->update('penilaian', $data); // Update data berdasarkan ID

        redirect('kriteria'); // Redirect ke halaman kriteria setelah update
    }
}
