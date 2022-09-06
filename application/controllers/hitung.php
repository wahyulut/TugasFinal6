<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hitung extends CI_Controller
        {
            public function __construct()
            {
                parent::__construct();
                $this->load->library('form_validation');
            }
            public function index()
            {
                
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $data['cluster'] = $this->pegawai_model->cluster()->result();
                $data['judul'] = 'Table Hasil';
                $this->load->view('templates1/a_header', $data);
                $this->load->view('user/tb_hasil', $data);
                $this->load->view('templates1/a_footer');
            }
            
    }