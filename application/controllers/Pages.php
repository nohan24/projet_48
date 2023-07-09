<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Pages
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

class Pages extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index($page = 'home')
  {
    $data['tittle'] = ucfirst($page);
    
    $this->load->view('templates/head.php' , $data);
    $this->load->view('templates/header.php');
    $this->load->view('pages/'.$page.'.php' , $data);
    $this->load->view('templates/footer.php');
  }

}


/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */