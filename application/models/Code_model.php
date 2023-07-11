<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Code_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Code_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function isIn($code , $tableName)
  {
    $this->db->select('*');
    $this->db->from($tableName);
    $this->db->where('code_id' , $code);
    $result = $this->db->get()->result();

    if( count($result) > 0 ){
      return true;
    }

    return false;
  }

  // ------------------------------------------------------------------------

}

/* End of file Code_model.php */
/* Location: ./application/models/Code_model.php */