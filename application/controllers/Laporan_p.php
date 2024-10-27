<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Laporan_p extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			// Memuat helper auth
			$this->load->helper('auth_helper');
	
			// Panggil fungsi check_login untuk memastikan pengguna sudah login
			check_login();
		}
		public function index() {
			// Ambil nilai filter dari form atau session
			$dari = $this->input->post('dari') ?? $this->session->userdata('filter_dari');
			$sampai = $this->input->post('sampai') ?? $this->session->userdata('filter_sampai');
	
			if ($dari && $sampai) {
				// Simpan filter ke dalam session
				$this->session->set_userdata('filter_dari', $dari);
				$this->session->set_userdata('filter_sampai', $sampai);
	
				// Query dengan filter tanggal
				$this->db->select('peminjaman.id_peminjaman, peminjaman.nama, peminjaman.id_buku, buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_dikembalikan')
						 ->from('peminjaman')
						 ->join('buku', 'peminjaman.id_buku = buku.id_buku', 'left')
						 ->where('peminjaman.tgl_pinjam >=', $dari)
						 ->where('peminjaman.tgl_pinjam <=', $sampai);
				$query = $this->db->get();
				$data['peminjaman'] = $query->result_array();
			} else {
				// Kosongkan data jika filter belum diterapkan
				$data['peminjaman'] = [];
			}
	
			$this->load->view('admin/l_pelayanan_view', $data); // Ganti dengan view kamu
		}
	
		public function reset_filter() {
			// Hapus filter dari session
			$this->session->unset_userdata('filter_dari');
			$this->session->unset_userdata('filter_sampai');
			
			redirect('Laporan_p'); // Arahkan kembali ke halaman utama laporan
		}
	}
	