<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KriteriaModel extends CI_Model {

    public function get_all_buku() {
        return $this->db->get('buku')->result_array();   
}
 // Fungsi untuk mengambil semua data karyawan beserta kriterianya
 public function get_penilaian_with_kriteria() {
    $this->db->select('penilaian.id_penilaian, buku.judul, 
        kriteria_rating.pilihan_kriteria AS rating, kriteria_rating.bobot_kriteria AS bobot_rating, 
        kriteria_peminjaman.pilihan_kriteria AS jumlah_peminjaman, kriteria_peminjaman.bobot_kriteria AS bobot_peminjaman, 
        kriteria_terbit.pilihan_kriteria AS tahun_terbit, kriteria_terbit.bobot_kriteria AS bobot_terbit, 
        kriteria_halaman.pilihan_kriteria AS jumlah_halaman, kriteria_halaman.bobot_kriteria AS bobot_halaman');
    $this->db->from('penilaian');
    $this->db->join('buku', 'penilaian.id_buku = buku.id_buku');
    $this->db->join('kriteria_rating', 'penilaian.id_kriteria_rating = kriteria_rating.id_kriteria');
    $this->db->join('kriteria_peminjaman', 'penilaian.id_kriteria_peminjaman = kriteria_peminjaman.id_kriteria');
    $this->db->join('kriteria_terbit', 'penilaian.id_kriteria_terbit = kriteria_terbit.id_kriteria');
    $this->db->join('kriteria_halaman', 'penilaian.id_kriteria_halaman = kriteria_halaman.id_kriteria');
    $query = $this->db->get();
    return $query->result();
}



// Fungsi untuk mengambil data kriteria kedisiplinan
public function get_all_rating() {
    $query = $this->db->get('kriteria_rating');
    return $query->result();
}

// Fungsi untuk mengambil data kriteria kesopanan
public function get_kriteria_peminjaman() {
    $query = $this->db->get('kriteria_peminjaman');
    return $query->result();
}

// Fungsi untuk mengambil data kriteria ketelitian
public function get_kriteria_terbit() {
    $query = $this->db->get('kriteria_terbit');
    return $query->result();
}

// Fungsi untuk mengambil data kriteria pelayanan
public function get_kriteria_halaman() {
    $query = $this->db->get('kriteria_halaman');
    return $query->result();
}

}
