<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['anggota'] = $this->Pendaftaran_model->get_all();
        $this->load->view('Pendaftaran', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kk', 'KK/Kartu Pelajar', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
        } else {
            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'kk' => $this->input->post('kk', TRUE),
                'email' => $this->input->post('email', TRUE),
                'nomor_hp' => $this->input->post('nomor_hp', TRUE),
                'alamat' => $this->input->post('alamat', TRUE)
            ];

            $this->Pendaftaran_model->insert($data);
            $this->session->set_flashdata('success', 'Data pendaftaran berhasil ditambahkan.');
        }

        redirect('pendaftaran');
    }
}
