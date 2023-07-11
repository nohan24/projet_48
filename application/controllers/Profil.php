<?php
session_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profils_model');
    }

    public function index()
    {
        $this->load->view('login/login');
    }

    public function signin()
    {
        $this->load->view('login/inscription');
    }

    public function connect()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Profils_model->check_login($email, $password);
        if (count($user) > 0) {
            if (isAdmin($user[0]['user_type'])) {
                $_SESSION['admin'] = $user[0]['user_id'];
                redirect(site_url("admin"));
            } else {
                $_SESSION['user'] = $user[0]['user_id'];
                redirect(site_url("admin"));
            }
        } else {
            redirect('login');
        }
    }

    public function inscription()
    {
        $data = array(
            'user_name' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'passwrd' => $this->input->post('password')
        );
        $_SESSION['tmp_user'] = $data;
        $data = array();
        $data['param'] = $this->Profils_model->get_parametre();
        $this->load->view('login/information', $data);
    }

    public function completion()
    {
        $this->db->insert('users', $_SESSION['tmp_user']);
        $user = $this->Profils_model->get_last_user();
        $_SESSION['user'] = $user;
        $restrictions = $this->input->post('restriction') == null ? [] : $this->input->post('restriction');
        $parametre = $this->Profils_model->get_parametre_id();
        $data = array(
            'user_id' => $user,
            'gender' => $this->input->post('gender'),
            'objectif' => $this->input->post('objectif'),
            'heigth' => $this->input->post('taille'),
            'weigth' => $this->input->post('poids'),
            'dtn' => $this->input->post('dtn')
        );
        $this->db->insert('completion', $data);
        for ($i = 0; $i < count($restrictions); $i++) {
            $restriction = array(
                'user_id' => intval($user),
                'parametre_id' => intval($restrictions[$i]),
                'param_value' => 1
            );
            $this->db->insert('user_restriction', $restriction);
        }
        for ($j = 0; $j < count($parametre); $j++) {
            $p[$j] = $parametre[$j]['id'];
        }
        $unchecked = array_diff($p, $restrictions);
        $unchecked = array_values($unchecked);
        unset($_SESSION['tmp_user']);
        for ($j = 0; $j < count($unchecked); $j++) {
            $restriction = array(
                'user_id' => intval($user),
                'parametre_id' => intval($unchecked[$j]),
                'param_value' => 0
            );
            $this->db->insert('user_restriction', $restriction);
        }
        redirect(site_url('profil'));
    }

    public function logout()
    {
        session_destroy();
        redirect("profil");
    }
}
