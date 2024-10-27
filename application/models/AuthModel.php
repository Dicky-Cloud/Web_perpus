<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

    // Fungsi untuk mendapatkan pengguna berdasarkan username
    public function get_user_by_username($username)
    {
        // Mengambil data pengguna berdasarkan username
        $this->db->where('username', $username);
        return $this->db->get('users')->row(); // Mengembalikan satu baris data pengguna
    }
}
