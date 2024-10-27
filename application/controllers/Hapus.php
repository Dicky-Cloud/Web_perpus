<?php 

defined('BASEPATH') OR exit('No direct script access allowed'); 

class Hapus extends CI_Controller {
     public function __construct()
     {
         parent::__construct();
         // Memuat helper auth
         $this->load->helper('auth_helper');
 
         // Panggil fungsi check_login untuk memastikan pengguna sudah login
         check_login();
     }
     public function index(){ 

$this->load->view('hapusfile_indexphp_CI'); 

} 

}