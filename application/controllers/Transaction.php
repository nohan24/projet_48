<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Transaction
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

class Transaction extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Code_model');
  }

  public function index()
  {
    
  }
  

}


/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */