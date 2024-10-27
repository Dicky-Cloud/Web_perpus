<?php
class PenilaianModel extends CI_Model {

    // Method untuk mendapatkan data kriteria pelayanan
    public function get_kriteria_halaman() {
        return $this->db->get('kriteria_halaman')->result();
    }

    // Method untuk mendapatkan data kriteria koleksi buku
    public function get_kriteria_rating() {
        return $this->db->get('kriteria_rating')->result();
    }

    // Method untuk mendapatkan data kriteria lingkungan
    public function get_kriteria_peminjaman() {
        return $this->db->get('kriteria_peminjaman')->result();
    }

    // Method untuk mendapatkan data kriteria fasilitas
    public function get_kriteria_terbit() {
        return $this->db->get('kriteria_terbit')->result();
    }
    // KriteriaModel.php
public function getKriteriaById($table, $id) {
    return $this->db->get_where($table, ['id_kriteria' => $id])->row();
}

public function updateKriteria($table, $id_kriteria, $data) {
    $this->db->where('id_kriteria', $id_kriteria);
    return $this->db->update($table, $data);
}

}

?>
