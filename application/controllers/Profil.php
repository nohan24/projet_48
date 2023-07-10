<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profils');
    }

    public function index(){
        $this->load->view('login');
    }

    public function connect(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Profils->check_login($email, $password);
        if(count($user) > 0){
            session_start();
            $_SESSION['user'] = $user[0];
            if(isAdmin($user[0]['user_type'])){
                $this->load->view('normal_user');
            }   
            else{
                $this->load->view('admin');
            }
        }
        else {
            redirect('index');
        }
    }

    public function modification(){

    }
}