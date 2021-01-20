<?php
defined('BASEPATH') OR exit('No direct script access allowed !');

Class Auth extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_m');
    }

    public function index(){
        if($this->session->flashdata('loginStatus') != ''){
            $this->loginProses();
        } 
        
        $this->load->view('auth/login.php');
    }

    function loginCheck(){
        /** Load Library form_validation */
        $this->load->library("form_validation");
        
        /** Get data post */
        $logUsername = $this->input->post('postUsername');
        $logPassword = $this->input->post('postPassword');

        $checkUser = $this->Auth_m->getUser($logUsername);
        if(count($checkUser) > 0 ){
            $hash = $checkUser[0]['user_password'];
            if(password_verify($logPassword, $hash)){
                $this->session->set_flashdata('loginStatus', 'canLogin');
                $this->session->set_flashdata('user', $checkUser[0]['user_name']);
            } else {
                echo $hash;
                $this->session->set_flashdata('loginStatus', 'wrongPassword');
            }
        } else {
            $this->session->set_flashdata('loginStatus', 'userNotFound');
        }

        redirect('Auth');
    }

    function loginProses(){
        if($this->session->flashdata('loginStatus') == 'canLogin' || $this->session->userdata('authStatus') == 'logedIn'){
            $this->session->set_flashdata('flashStatus', 'successLogin');
            $this->session->set_userdata('authStatus', 'logedIn');
            $this->session->set_userdata('authUser', $this->session->flashdata('user'));
            redirect('Admin_c');
        } else if($this->session->flashdata('loginStatus') == 'wrongPassword'){
            $this->session->set_flashdata('flashStatus', 'failedLogin');
            $this->session->set_flashdata('flashMsg', 'Password salah !');
        } else if($this->session->flashdata('loginStatus') == 'userNotFound'){
            $this->session->set_flashdata('flashStatus', 'failedLogin');
            $this->session->set_flashdata('flashMsg', 'User tidak ditemukan !');
        }
    }

    function logoutProses(){
        $this->session->sess_destroy();
        redirect('Auth');
    }
} 