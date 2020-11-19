<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('status')) {
            redirect('home');
        } else {

            $this->load->view('auth/login');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username == "gemaannisa" and $password == "admin") {
            $data = [
                'status' => 'active'
            ];
            $this->session->set_userdata($data);
            redirect('Home');
        } else {
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('status');
        redirect('Auth');
    }
}