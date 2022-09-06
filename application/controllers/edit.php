<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
        {
            public function index()
            {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['judul'] = 'Centroid Baru';
            $this->load->view('templates1/a_header', $data);
            $this->load->view('user/change', $data);
            $this->load->view('templates1/a_footer');
            }
        }