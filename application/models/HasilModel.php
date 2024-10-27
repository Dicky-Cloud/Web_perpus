<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilModel extends CI_Model {
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
public function get_all_penilaian() {
    $this->db->select('penilaian.id_penilaian, buku.judul, 
        kriteria_rating.bobot_kriteria AS bobot_rating, 
        kriteria_peminjaman.bobot_kriteria AS bobot_peminjaman, 
        kriteria_terbit.bobot_kriteria AS bobot_terbit, 
        kriteria_halaman.bobot_kriteria AS bobot_halaman,
        kriteria_rating.pilihan_kriteria AS pilihan_rating, 
        kriteria_peminjaman.pilihan_kriteria AS pilihan_peminjaman, 
        kriteria_terbit.pilihan_kriteria AS pilihan_terbit, 
        kriteria_halaman.pilihan_kriteria AS pilihan_halaman
        '); // Menambahkan pilihan_kriteria untuk masing-masing kriteria
  
    $this->db->from('penilaian');
    $this->db->join('buku', 'penilaian.id_buku = buku.id_buku');
    $this->db->join('kriteria_rating', 'penilaian.id_kriteria_rating = kriteria_rating.id_kriteria');
    $this->db->join('kriteria_peminjaman', 'penilaian.id_kriteria_peminjaman = kriteria_peminjaman.id_kriteria');
    $this->db->join('kriteria_terbit', 'penilaian.id_kriteria_terbit = kriteria_terbit.id_kriteria');
    $this->db->join('kriteria_halaman', 'penilaian.id_kriteria_halaman = kriteria_halaman.id_kriteria');
  
    $query = $this->db->get();
    return $query->result();
  }
  
public function get_max_values() {
    // Ambil nilai maksimum dari kriteria_rating
    $this->db->select('MAX(bobot_kriteria) AS max_rating');
    $this->db->from('kriteria_rating');
    $max_rating = $this->db->get()->row()->max_rating;

    // Ambil nilai maksimum dari kriteria_peminjaman
    $this->db->select('MAX(bobot_kriteria) AS max_peminjaman');
    $this->db->from('kriteria_peminjaman');
    $max_peminjaman = $this->db->get()->row()->max_peminjaman;

    // Ambil nilai maksimum dari kriteria_terbit
    $this->db->select('MAX(bobot_kriteria) AS max_terbit');
    $this->db->from('kriteria_terbit');
    $max_terbit = $this->db->get()->row()->max_terbit;

    // Ambil nilai maksimum dari kriteria_halaman
    $this->db->select('MAX(bobot_kriteria) AS max_halaman');
    $this->db->from('kriteria_halaman');
    $max_halaman = $this->db->get()->row()->max_halaman;

    // Kembalikan semua nilai maksimum sebagai array
    return [
        'max_rating' => $max_rating,
        'max_peminjaman' => $max_peminjaman,
        'max_terbit' => $max_terbit,
        'max_halaman' => $max_halaman
    ];
}


}
