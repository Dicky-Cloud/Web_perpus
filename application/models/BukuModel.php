<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuModel extends CI_Model {

    public function insert_buku($data) {
        return $this->db->insert('buku', $data);    
    // Mengambil data peminjaman berdasarkan ID
    }
    public function get_pinjam_by_id($id_buku) {
        $this->db->where('id_buku', $id_buku);
        $query = $this->db->get('buku');
        return $query->row_array(); // Mengembalikan satu baris data
    } 
    public function get_all_buku() {
        return $this->db->get('buku')->result_array(); // Ambil semua data buku
    }

    // Memperbarui data peminjaman
    public function update_pinjam($id_peminjaman, $data) {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->update('peminjaman', $data); // Memperbarui data di database
    }

    // Menghapus data peminjaman
    public function delete_pinjam($id_peminjaman) {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->delete('peminjaman'); // Menghapus data dari database
    }  
    public function get_total_buku()
    {
        // Query untuk mengambil kolom yang dibutuhkan (judul_buku dan tahun_terbit)
        $this->db->select('judul, tahun_terbit');
        $this->db->from('buku'); // Sesuaikan dengan nama tabel buku Anda

        // Jalankan query dan ambil hasilnya
        $query = $this->db->get();
        
        // Mengembalikan hasil dalam bentuk array objek
        return $query->result();
 
    }
    public function delete_buku($id_buku) {
        // Menghapus data buku berdasarkan id_buku
        $this->db->where('id_buku', $id_buku);
        return $this->db->delete('buku'); // Hapus data buku dari tabel 'buku'
    }
    public function update_buku($id_buku, $data) {
        $this->db->where('id_buku', $id_buku);
        return $this->db->update('buku', $data);
    }
    
}
