<?php
class RekomendasiModel extends CI_Model {
    // Fungsi untuk mengambil buku yang paling sering dipinjam
    public function getMostBorrowedBooks() {
        $this->db->select('buku.id_buku, buku.judul, COUNT(peminjaman.id_buku) as total_pinjaman');
        $this->db->from('buku');
        $this->db->join('peminjaman', 'peminjaman.id_buku = buku.id_buku', 'left');
        $this->db->group_by('buku.id_buku');
        $this->db->order_by('total_pinjaman', 'DESC');
        return $this->db->get()->result();
    }
}
