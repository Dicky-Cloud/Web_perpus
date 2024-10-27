<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PinjamModel');
        $this->load->model('BukuModel'); // Memuat model PinjamModel untuk akses database
        $this->load->library('form_validation');
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login(); // Memuat library form validation
    }

    // Menampilkan daftar peminjaman
    public function index() {
         $data['peminjaman'] = $this->PinjamModel->get_all_pinjam();
        // Ambil data buku
        $data['buku'] = $this->BukuModel->get_all_buku(); // Sesuaikan dengan model Anda
        
        $data['peminjaman'] = $this->PinjamModel->get_all_pinjam_with_buku();
        $this->load->view('admin/pinjaman_view', $data); // Memuat view untuk peminjaman
    }

    public function tambah() {
        if ($this->input->method() === 'post') {
            // Aturan validasi form
            $this->form_validation->set_rules('id_buku', 'Buku', 'required'); // Ganti 'judul' menjadi 'id_buku'
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
            $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            // Denda dan Tanggal Dikembalikan tidak wajib
    
            // Jika validasi gagal
            if ($this->form_validation->run() == FALSE) {
                // Tampilkan pesan error
                $this->session->set_flashdata('error', validation_errors());
            } else {
                // Siapkan data untuk disimpan
                $data = array(
                    'id_buku' => $this->input->post('id_buku'), // Ambil input dari field 'id_buku'
                    'nama' => $this->input->post('nama'),
                    'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                    'tgl_kembali' => $this->input->post('tgl_kembali'),
                    'status' => $this->input->post('status'),
                    'denda' => $this->input->post('denda') ? $this->input->post('denda') : null, // Opsional
                    'total_pinjaman' => $this->input->post('total_pinjaman'),
                    'tgl_dikembalikan' => $this->input->post('tgl_dikembalikan') ? $this->input->post('tgl_dikembalikan') : null, // Opsional
                );
    
                // Simpan ke database
                if ($this->PinjamModel->insert_pinjam($data)) {
                    $this->session->set_flashdata('success', 'Peminjaman berhasil ditambahkan.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan peminjaman.');
                }
                redirect('peminjaman');
                return; // Menghentikan eksekusi setelah redirect
            }
        }
    
        // Tampilkan form tambah (hanya ketika tidak ada post request)
        $data['buku'] = $this->BukuModel->get_all_buku(); // Menampilkan data buku di form tambah
        $this->load->view('admin/pinjaman_view', $data);
    }
    
    
    public function update($id_peminjaman) {
        // Ambil data peminjaman berdasarkan id
        $peminjaman = $this->PinjamModel->get_pinjam_by_id($id_peminjaman);
    
        // Jika peminjaman tidak ditemukan
        if (!$peminjaman) {
            $this->session->set_flashdata('error', 'Peminjaman tidak ditemukan.');
            redirect('peminjaman');
            return;
        }
    
        // Jika metode HTTP adalah POST
        if ($this->input->method() === 'post') {
            // Aturan validasi form
            $this->form_validation->set_rules('id_buku', 'Buku', 'required'); // Ubah dari judul ke id_buku
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('tgl_pinjam', 'Tanggal Pinjam', 'required');
            $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
    
            // Jika validasi gagal
            if ($this->form_validation->run() == FALSE) {
                // Tampilkan pesan error
                $this->session->set_flashdata('error', validation_errors());
            } else {
                // Siapkan data untuk di-update
                $data = array(
                    'id_buku' => $this->input->post('id_buku'), // Ubah dari judul ke id_buku
                    'nama' => $this->input->post('nama'),
                    'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                    'tgl_kembali' => $this->input->post('tgl_kembali'),
                    'status' => $this->input->post('status'),
                    'denda' => $this->input->post('denda') ? $this->input->post('denda') : null, // Opsional
                    'tgl_dikembalikan' => $this->input->post('tgl_dikembalikan') ? $this->input->post('tgl_dikembalikan') : null, // Opsional
                    
                );
    
                // Update data peminjaman
                if ($this->PinjamModel->update_pinjam($id_peminjaman, $data)) {
                    $this->session->set_flashdata('success', 'Data peminjaman berhasil diperbarui.');
                } else {
                    $this->session->set_flashdata('error', 'Gagal memperbarui data peminjaman.');
                }
                redirect('peminjaman');
                return;
            }
        }
    
        // Jika tidak ada POST, tampilkan form edit dengan data peminjaman
        $data['peminjaman'] = $peminjaman;
        $this->load->view('admin/pinjaman_view', $data);
    }
    
    
}
