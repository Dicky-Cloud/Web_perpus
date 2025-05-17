<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('DataModel'); // Memuat model DataModel untuk akses database
        $this->load->library('form_validation'); // Memuat library form_validation untuk validasi input
    }

    public function index() {
        $data['anggota'] = $this->DataModel->get_all_anggota(); // Mengambil semua data anggota
        $this->load->view('admin/anggota_view', $data); // Memuat view anggota
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login();
    }
public function tambah() {
    // Validasi input umum
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required|in_list[siswa,umum]');

    $status = $this->input->post('status');

    // Validasi khusus berdasarkan status
    if ($status === 'siswa') {
        $this->form_validation->set_rules('nis', 'Nomor Induk Siswa (NIS)', 'required');
    } elseif ($status === 'umum') {
        $this->form_validation->set_rules('kk', 'Nomor Induk Kependudukan (NIK)', 'required');
    }

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembalikan ke form tambah anggota
        $this->load->view('admin/anggota_view');
    } else {
        // Siapkan data berdasarkan status
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'nomor_hp' => $this->input->post('nomor_hp'),
            'alamat' => $this->input->post('alamat'),
            'status' => $status,
            'nis' => ($status === 'siswa') ? $this->input->post('nis') : null,
            'kk'  => ($status === 'umum') ? $this->input->post('kk') : null,
        );

        // Simpan ke database
        if ($this->DataModel->insert_anggota($data)) {
            $this->session->set_flashdata('success', 'Anggota berhasil ditambahkan.');
            redirect('pendaftaran');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan anggota.');
            redirect('anggota/tambah');
        }
    }
}

    public function update($id_anggota) {
        // Ambil data dari form
        $nama = $this->input->post('nama');
        $kk = $this->input->post('kk');
        $nis = $this->input->post('nis');
        $email = $this->input->post('email');
        $nomor_hp = $this->input->post('nomor_hp');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
    
        // Cek apakah password diubah atau tidak
        if (!empty($password)) {
            // Update dengan password baru
            $data = array(
                'nama' => $nama,
                'kk' => $kk,
                'nis' => $nis,
                'email' => $email,
                'nomor_hp' => $nomor_hp,
                'alamat' => $alamat,
                'status' => $status
            );
        } else {
            // Update tanpa mengubah password
            $data = array(
                'nama' => $nama,
                'kk' => $kk,
                'nis' => $nis,
                'email' => $email,
                'nomor_hp' => $nomor_hp,
                'alamat' => $alamat,
                'status' => $status
            );
        }
    
        // Simpan perubahan ke database
        if ($this->DataModel->update_anggota($id_anggota, $data)) {
            // Set notifikasi berhasil
            $this->session->set_flashdata('success', 'Data anggota berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data anggota.');
        }
        
        // Redirect kembali ke halaman keanggotaan
        redirect('anggota');
    }
    
    // Hapus data anggota
    public function hapus($id_anggota) {
        // Periksa apakah anggota ada
        if ($this->DataModel->get_anggota_by_id($id_anggota)) {
            // Hapus anggota dari database
            if ($this->DataModel->delete_anggota($id_anggota)) {
                $this->session->set_flashdata('success', 'Anggota berhasil dihapus.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus anggota.');
            }
        } else {
            $this->session->set_flashdata('error', 'Anggota tidak ditemukan.');
        }
    
        redirect('anggota'); // Arahkan kembali ke daftar anggota
    }
}
