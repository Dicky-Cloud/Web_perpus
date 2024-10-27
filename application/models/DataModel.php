<?php
class DataModel extends CI_Model {
    public function get_all_anggota() {
        return $this->db->get('anggota')->result();
    }

    public function insert_anggota($data) {
        return $this->db->insert('anggota', $data);
    }
    public function update_anggota($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->update('anggota', $data);
    }
    
    public function get_anggota_by_id($id_anggota) {
        // Query untuk mendapatkan anggota berdasarkan ID
        $this->db->where('id_anggota', $id_anggota);
        $query = $this->db->get('anggota');
        
        // Jika data ditemukan, kembalikan hasilnya, jika tidak, return false
        return $query->row(); // Mengembalikan satu baris data (objek)
    }
    
    public function delete_anggota($id_anggota) {
        $this->db->where('id_anggota', $id_anggota);
        return $this->db->delete('anggota');
    }

}
