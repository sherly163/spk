<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Signup_model');
        $this->load->model('User_model');
    }
    public function index()
    {
       
		$this->load->view('signup');
		
    }

    public function signup(){
        $data = [
            'id_user_level' => 1,
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        ];
        
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');			

        if ($this->form_validation->run() != false) {
            $result = $this->Signup_model->insert($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun Berhasil Dibuat! Silahkan Login</div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Gagal Dibuat!</div>');
            redirect('Signup');
            
        }
    }
}  