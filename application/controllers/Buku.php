<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('BukuModel'); // Load model untuk database
        $this->load->library('form_validation' ); // Load library yang diperlukan
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login();
    }

    // Fungsi untuk menampilkan daftar buku
    public function index() {
        $data['buku'] = $this->BukuModel->get_all_buku(); // Ambil semua data buku
        $this->load->view('admin/buku_view', $data); // View untuk menampilkan data buku
    }

    // Fungsi untuk menampilkan form tambah buku
    public function tambah()
    {
        // Aturan validasi form
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('jml_halaman', 'Jumlah Halaman', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form tambah buku
            $this->load->view('admin/tambah_buku');
        } else {
            // Cek apakah ada file gambar yang diupload
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '2048'; // Ukuran maksimal file dalam KB
                $config['file_name'] = $_FILES['gambar']['name'];
    
                // Load library upload dan inisialisasi
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('gambar')) {
                    $uploadData = $this->upload->data();
                    $gambar = $uploadData['file_name'];
    
                    // Data buku yang akan disimpan
                    $data = array(
                        'judul' => $this->input->post('judul'),
                        'penulis' => $this->input->post('penulis'),
                        'penerbit' => $this->input->post('penerbit'),
                        'tahun_terbit' => $this->input->post('tahun_terbit'),
                        'isbn' => $this->input->post('isbn'),
                        'kategori' => $this->input->post('kategori'),
                        'stok' => $this->input->post('stok'),
                        'jml_halaman' => $this->input->post('jml_halaman'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'gambar' => $gambar
                    );
    
                    // Simpan data buku ke database
                    $this->BukuModel->insert_buku($data);
                    redirect('buku');
                } else {
                    // Jika gagal upload gambar, tampilkan pesan error
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('admin/tambah_buku', $data);
                }
            } else {
                // Jika tidak ada gambar yang diupload, tambahkan buku tanpa gambar
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'penulis' => $this->input->post('penulis'),
                    'penerbit' => $this->input->post('penerbit'),
                    'tahun_terbit' => $this->input->post('tahun_terbit'),
                    'isbn' => $this->input->post('isbn'),
                    'kategori' => $this->input->post('kategori'),
                    'stok' => $this->input->post('stok'),
                    'jml_halaman' => $this->input->post('jml_halaman'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => NULL // Tidak ada gambar yang diupload
                );
    
                // Simpan data buku ke database
                $this->BukuModel->insert_buku($data);
                redirect('buku');
            }
        }
    }
    

    // Fungsi untuk menampilkan form edit buku
    public function edit($id_buku) {
        $data['buku'] = $this->BukuModel->get_buku_by_id($id_buku); // Ambil data buku berdasarkan ID
        if (empty($data['buku'])) {
            show_404(); // Jika buku tidak ditemukan, tampilkan 404
        }
        $this->load->view('admin/edit_buku', $data); // Load view untuk form edit
    }
    public function update($id_buku) {
        // Ambil data dari form
        $judul = $this->input->post('judul');
        $penulis = $this->input->post('penulis');
        $penerbit = $this->input->post('penerbit');
        $tahun_terbit = $this->input->post('tahun_terbit');
        $isbn = $this->input->post('isbn');
        $kategori = $this->input->post('kategori');
        $stok = $this->input->post('stok');
        $jml_halaman = $this->input->post('jml_halaman');
        $deskripsi = $this->input->post('deskripsi');
        
        // Cek apakah ada gambar yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            // Proses upload gambar
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // Maksimal 2MB
            $config['file_name'] = time() . '_' . $_FILES['gambar']['name']; // Menggunakan nama file dengan timestamp
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('gambar')) {
                // Jika berhasil upload, dapatkan nama file gambar
                $gambar = $this->upload->data('file_name');
                
                // Update dengan gambar baru
                $data = array(
                    'judul' => $judul,
                    'penulis' => $penulis,
                    'penerbit' => $penerbit,
                    'tahun_terbit' => $tahun_terbit,
                    'isbn' => $isbn,
                    'kategori' => $kategori,
                    'stok' => $stok,
                    'jml_halaman' => $jml_halaman,
                    'deskripsi' => $deskripsi,
                    'gambar' => $gambar
                );
            } else {
                // Jika gagal upload gambar, tampilkan error
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('buku/edit/' . $id_buku); // Kembali ke halaman edit
                return;
            }
        } else {
            // Update tanpa mengubah gambar
            $data = array(
                'judul' => $judul,
                'penulis' => $penulis,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
                'isbn' => $isbn,
                'kategori' => $kategori,
                'stok' => $stok,
                'jml_halaman' => $jml_halaman,
                'deskripsi' => $deskripsi
            );
        }
        
        // Simpan perubahan ke database
        if ($this->BukuModel->update_buku($id_buku, $data)) {
            // Set notifikasi berhasil
            $this->session->set_flashdata('success', 'Data buku berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data buku.');
        }
        
        // Redirect kembali ke halaman daftar buku
        redirect('buku');
    }
    

    // Fungsi untuk menghapus buku
    public function hapus($id_buku) {
        if ($this->BukuModel->delete_buku($id_buku)) {
            $this->session->set_flashdata('success', 'Buku berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus buku.');
        }
        redirect('buku'); // Redirect ke halaman daftar buku setelah berhasil dihapus
    }
}
