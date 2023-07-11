<?php
session_start();
defined('BASEPATH') or exit('No direct script access allowed');


class Transaction extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Code_model');
  }

  public function crediter()
  {
    $code = $_POST["code"];
    $user_id = $_SESSION['user'];
    if ($this->Code_model->isIn($code, 'code')) {
      if ($this->Code_model->isIn($code, 'usedCode')) {
        redirect(site_url("regime/suggestion"));
      } else {
        $query = sprintf("INSERT INTO requestedCode VALUES (%s , %s) ", $code, $user_id);
        $this->db->query($query);
        redirect(site_url("regime/suggestion"));
      }
    } else {
      redirect(site_url("regime/suggestion"));
    }
  }
}
