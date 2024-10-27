<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatakriteriaModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mengambil semua data karyawan beserta kriterianya
    public function get_karyawan_with_kriteria() {
        $this->db->select('nilai.id_nilai, karyawan.nama, kriteria_kedisiplinan.id_kriteria AS disiplin, kriteria_kesopanan.id_kriteria AS sopan, kriteria_ketelitian.id_kriteria AS teliti, kriteria_pelayanan.id_kriteria AS pelayanan');
        $this->db->from('nilai');
        $this->db->join('karyawan', 'nilai.id_karyawan = karyawan.id_karyawan');
        $this->db->join('kriteria_kedisiplinan', 'nilai.id_kriteria_kedisiplinan = kriteria_kedisiplinan.id_kriteria');
        $this->db->join('kriteria_kesopanan', 'nilai.id_kriteria_kesopanan = kriteria_kesopanan.id_kriteria');
        $this->db->join('kriteria_ketelitian', 'nilai.id_kriteria_ketelitian = kriteria_ketelitian.id_kriteria');
        $this->db->join('kriteria_pelayanan', 'nilai.id_kriteria_pelayanan = kriteria_pelayanan.id_kriteria');
        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk mengambil semua data karyawan
    public function get_all_karyawan() {
        $query = $this->db->get('karyawan');
        return $query->result();
    }

    // Fungsi untuk mengambil data kriteria kedisiplinan
    public function get_kriteria_kedisiplinan() {
        $query = $this->db->get('kriteria_kedisiplinan');
        return $query->result();
    }

    // Fungsi untuk mengambil data kriteria kesopanan
    public function get_kriteria_kesopanan() {
        $query = $this->db->get('kriteria_kesopanan');
        return $query->result();
    }

    // Fungsi untuk mengambil data kriteria ketelitian
    public function get_kriteria_ketelitian() {
        $query = $this->db->get('kriteria_ketelitian');
        return $query->result();
    }

    // Fungsi untuk mengambil data kriteria pelayanan
    public function get_kriteria_pelayanan() {
        $query = $this->db->get('kriteria_pelayanan');
        return $query->result();
    }

    // Fungsi untuk menambahkan data kriteria baru untuk karyawan
    public function insert_kriteria($data) {
        $this->db->insert('nilai', $data);
    }

    // Fungsi untuk mengupdate data kriteria berdasarkan ID
    public function update_kriteria($id_nilai, $data) {
        $this->db->where('id_nilai', $id_nilai);
        $this->db->update('nilai', $data);
    }

    // Fungsi untuk menghapus data kriteria berdasarkan ID
    public function delete_kriteria($id_nilai) {
        $this->db->where('id_nilai', $id_nilai);
        $this->db->delete('nilai');
    }
}
