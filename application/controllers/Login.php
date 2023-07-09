<?php
session_start();
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Controller Login
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('templates/head.php');
    $this->load->view('templates/header.php');
    $this->load->view('pages/login.php');
  }

  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $query = sprintf("SELECT * FROM user WHERE email = '%s' AND password = '%s'" , $email , $password);

    $statement = $this->db->query($query);
    $results = $statement->result();

    if( count($results) > 0){
      $_SESSION['id'] = $results[0]->id;
      redirect('Pages/index');
    }else{
      redirect('Login/index');
    }

  }

  public function logout(){
    session_destroy();
    redirect('Login/index');
  }

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */