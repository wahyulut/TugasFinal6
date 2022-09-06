<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');   
    }
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'login';
            $this->load->view('templates/a_header');
            $this->load->view('auth/login');
            $this->load->view('templates/a_footer');
        }else {
            $this->login1();
        }
    }


    private function login1(){

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if ($user) {
        
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                }else {
                    echo 'salah passwordnya';
                }
                
            }else {
                echo 'kagak ada tuh';
            }
        }else {
            echo 'gak ada, kamu penyusup ya';
        }
    }
    public function registration()
    {
        //aturan dalam form ini
        //ini adalah set rulesnya , btw trim itu agar spasi dalam nama tidak terhitung kedalam database
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sesuai!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        //jika form validasinya gagal maka tampilkan kembali halaman ini
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'registration';
            $this->load->view('templates/a_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/a_footer');
        } else {
            //buat dulu data field yang ada dalam database kedalam vairable data        
            $data = [

                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'data_created' => time()
            ];

            //lalu insert table databasenya
            $this->db->insert('user', $data);
            redirect('auth');
        }
    }
}

