<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Table extends CI_Controller
    {
        public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //arahkan data table ke model
        $data['pegawai'] = $this->pegawai_model->data()->result();
        $data['judul'] = 'Table Pegawai';
        $this->load->view('templates1/a_header', $data);
        $this->load->view('user/table', $data);
        $this->load->view('templates1/a_footer');
    }

}