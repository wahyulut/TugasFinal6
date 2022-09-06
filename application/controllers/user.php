<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'My Profile';
        $this->load->view('templates1/a_header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates1/a_footer');
    }
    
    public function pnk()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('intergritas', 'In', 'required');
        $this->form_validation->set_rules('amanah', 'Am', 'required');
        $this->form_validation->set_rules('profesional', 'pr', 'required');
        $this->form_validation->set_rules('cpk', 'Cpk', 'required');
        $this->form_validation->set_rules('absensi', 'Ab', 'required');
        if ($this->form_validation->run() == false) {
            //masukan datanya ke database
            $data['judul'] = 'Tambah Pegawai';
            $this->load->view('templates1/a_header', $data);
            $this->load->view('user/pnk', $data);
            $this->load->view('templates1/a_footer');
        }else {

            $nama = $this->input->post('nama');
            $intergritas = $this->input->post('intergritas');
            $amanah = $this->input->post('amanah');
            $profesional = $this->input->post('profesional');
            $cpk = $this->input->post('cpk');
            $absensi = $this->input->post('absensi');

            $data = [
                'nama' => $nama,
                'intergritas' => $intergritas,
                'amanah' => $amanah,
                'profesional' => $profesional,
                'cpk' => $cpk,
                'absensi' => $absensi,

            ];
            //lalu insert table databasenya
            $this->db->insert('tb_data', $data);

            $c1[0] = ['99', '99', '99', '98', '99'];
            $c2[0] = ['95', '95', '95', '97', '99'];

            $status = 'false';
            $loop = '0';
            $x = 0;

            $centroid = $this->db->get('tb_data')->result_array();

            while ($status == 'false') {
            foreach($centroid as $cen){
            //ambil data dan lakukan perhitungan
            
            $data = [
                'intergritas' => $cen['intergritas'],
                'profesional' => $cen['profesional'],
                'amanah' => $cen['amanah'],
                'cpk' => $cen['cpk'],
                'absensi' => $cen['absensi']
            ];

                extract($data);
                $hc1 = 0;
                $hc2 = 0;

                $hc1 = sqrt(pow($profesional - $c1[$loop][0], 2) +
                    pow($intergritas - $c1[$loop][1], 2) +
                    pow($amanah - $c1[$loop][2], 2) +
                    pow($cpk - $c1[$loop][3], 2) +
                    pow($absensi - $c1[$loop][4], 2));

                $hc2 = sqrt(pow($profesional - $c2[$loop][0], 2) +
                    pow($intergritas - $c2[$loop][1], 2) +
                    pow($amanah - $c2[$loop][2], 2) +
                    pow($cpk - $c2[$loop][3], 2) +
                    pow($absensi - $c2[$loop][4], 2));
                
                    
                    
                }

                if ($hc1 < $hc2) {

                    $cluster1 = [
                        'nama' => $cen['nama'],
                        'cluster1' => $hc1,
                        'cluster2' => $hc2,
                        'status' => 'Malas'

                    ];
                }else{
                    $cluster1 = [
                        'nama' => $cen['nama'],
                        'cluster1' => $hc1,
                        'cluster2' => $hc2,
                        'status' => 'Baik'

                    ];
                }

                $this->db->insert('cluster_data', $cluster1);
                redirect('hitung');
                
            }
        }
    }
    public function Status()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pegawai'] = $this->pegawai_model->data()->result();
        $data['status'] = $this->pegawai_model->centroid()->result();
        $data['judul'] = 'Status';
        $this->load->view('templates1/a_header', $data);
        $this->load->view('user/status', $data);
        $this->load->view('templates1/a_footer');
        
        
    }

}