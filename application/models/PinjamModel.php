<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Memuat database
        $this->load->database();
    }

    // Mengambil semua data peminjaman dengan JOIN tabel buku
    public function get_all_pinjam_with_buku() {
     // Join tabel peminjaman dengan tabel buku
     $this->db->select('peminjaman.*, buku.judul, buku.id_buku');
     $this->db->from('peminjaman');
     $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
     $query = $this->db->get();
     return $query->result_array();
    }
   
    // Mengambil data peminjaman berdasarkan ID dengan JOIN tabel buku
    public function get_pinjam_by_id_with_buku($id_peminjaman) {
        $this->db->select('peminjaman.*, buku.judul, buku.penulis, buku.penerbit');
        $this->db->from('peminjaman');
        $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        $this->db->where('peminjaman.id_peminjaman', $id_peminjaman);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan satu baris data
    }

    // Mengambil semua data peminjaman
    public function get_all_pinjam() {
        $query = $this->db->get('peminjaman');
        return $query->result_array();
    }

    // Mengambil data peminjaman berdasarkan ID
    public function get_pinjam_by_id($id_peminjaman) {
        $this->db->where('id_peminjaman', $id_peminjaman);
        $query = $this->db->get('peminjaman');
        return $query->row_array(); // Mengembalikan satu baris data
    }

    // Menambahkan data peminjaman baru
    public function insert_pinjam($data) {
        return $this->db->insert('peminjaman', $data); // Menyimpan data ke database
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

        // Mengambil semua data peminjaman
        public function get_peminjaman() {
            $this->db->select('peminjaman.id_peminjaman, peminjaman.nama, buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_dikembalikan');
            $this->db->from('peminjaman');
            $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku', 'left'); // Tetap melakukan join ke tabel buku
            $query = $this->db->get();
            return $query->result_array();
        }
        public function filter_peminjaman($dari, $sampai) {
            $this->db->select('peminjaman.id_peminjaman, peminjaman.nama, buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_dikembalikan');
            $this->db->from('peminjaman');
            $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku', 'left'); // Tetap melakukan join ke tabel buku
            $this->db->where('peminjaman.tgl_pinjam >=', $dari);
            $this->db->where('peminjaman.tgl_pinjam <=', $sampai);
            $query = $this->db->get();
            return $query->result_array();
        }
        
    public function get_data($start_date = null, $end_date = null)
    {
        $this->db->select('nama, tgl_pinjam, total_pinjaman');
        $this->db->from('peminjaman');

        // Jika ada filter tanggal, tambahkan kondisi ke query
        if ($start_date && $end_date) {
            $this->db->where('tgl_pinjam >=', $start_date);
            $this->db->where('tgl_pinjam <=', $end_date);
        }

        $query = $this->db->get();
        return $query->result();
    }
                
    }
    