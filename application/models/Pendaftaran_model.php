<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        return $this->db->insert('anggota', $data);
    }

    public function get_all() {
        return $this->db->get('anggota')->result();
    }
}
