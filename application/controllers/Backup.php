<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->dbutil(); // Load library database utility
        $this->load->helper('auth_helper');

        // Panggil fungsi check_login untuk memastikan pengguna sudah login
        check_login();
    }

    // Fungsi untuk menampilkan halaman backup
    public function index() {
        $this->load->view('admin/backup_view'); // Tampilkan view untuk backup
    }

    // Fungsi untuk melakukan proses backup
    public function process_backup() {
        // Konfigurasi backup
        $prefs = array(
            'format'      => 'zip',             // Format backup, bisa 'gzip', 'txt', atau 'zip'
            'filename'    => 'backup-db.sql',   // Nama file SQL di dalam backup
        );

        // Melakukan backup
        $backup = $this->dbutil->backup($prefs);

        // Load helper file untuk membuat file zip
        $this->load->helper('file');
        write_file('./assets/backup/backup-db.zip', $backup); // Simpan backup di server

        // Load helper download untuk mendownload file backup
        $this->load->helper('download');
        force_download('backup-db.zip', $backup); // Download file backup
    }
}
