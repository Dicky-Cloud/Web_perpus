<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model yang dibutuhkan
        $this->load->model('KaryawanModel');
        $this->load->model('DatakriteriaModel');
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login();
    }

    // Fungsi index untuk menampilkan data karyawan dan kriteria
    public function index() {
        // Ambil data karyawan dan kriteria dari model
        $data['nilai'] = $this->DatakriteriaModel->get_karyawan_with_kriteria();
        $data['karyawan'] = $this->DatakriteriaModel->get_all_karyawan();
        $data['kriteria_kedisiplinan'] = $this->DatakriteriaModel->get_kriteria_kedisiplinan();
        $data['kriteria_kesopanan'] = $this->DatakriteriaModel->get_kriteria_kesopanan();
        $data['kriteria_ketelitian'] = $this->DatakriteriaModel->get_kriteria_ketelitian();
        $data['kriteria_pelayanan'] = $this->DatakriteriaModel->get_kriteria_pelayanan();

        // Load view dan kirim data
        $this->load->view('admin/karyawan_view', $data);
    }

    // Fungsi untuk menambah data karyawan beserta kriterianya
    public function tambah() {
        // Mengambil data karyawan dari form input
        $data = array(
            'id_karyawan' => $this->input->post('id_karyawan'), // ID Karyawan
            'id_kriteria_kedisiplinan' => $this->input->post('id_kriteria_kedisiplinan'),
            'id_kriteria_kesopanan' => $this->input->post('id_kriteria_kesopanan'),
            'id_kriteria_ketelitian' => $this->input->post('id_kriteria_ketelitian'),
            'id_kriteria_pelayanan' => $this->input->post('id_kriteria_pelayanan')
        );

        // Menyimpan data karyawan dengan kriteria yang dimasukkan
        $this->DatakriteriaModel->insert_kriteria($data);

        // Redirect ke halaman utama setelah menambah data
        redirect('data_kriteria');
    }

    // Fungsi untuk mengedit data karyawan beserta kriterianya
    public function edit($id_nilai) {
        // Mengambil data dari form input
        $data = array(
            'id_karyawan' => $this->input->post('id_karyawan'), // ID karyawan dari input form
            'id_kriteria_kedisiplinan' => $this->input->post('id_kriteria_kedisiplinan'),
            'id_kriteria_kesopanan' => $this->input->post('id_kriteria_kesopanan'),
            'id_kriteria_ketelitian' => $this->input->post('id_kriteria_ketelitian'),
            'id_kriteria_pelayanan' => $this->input->post('id_kriteria_pelayanan')
        );

        // Memperbarui data karyawan beserta kriteria
        $this->DatakriteriaModel->update_kriteria($id_nilai, $data);

        // Redirect ke halaman utama setelah mengedit data
        redirect('data_kriteria');
    }

    // Fungsi untuk menghapus data kriteria
    public function hapus($id_nilai) {
        // Menghapus data kriteria berdasarkan ID
        $this->DatakriteriaModel->delete_kriteria($id_nilai);

        // Redirect ke halaman utama setelah menghapus data
        redirect('data_kriteria');
    }
}
