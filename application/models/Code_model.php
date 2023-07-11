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

  public function getSuggestion($non) // objectif , genre , liste zavatra tsy zaka 
  {
    $foodListQuery = $this->db->get('listfood');
    $restrictionQuery = $this->db->get('restriction');

    $foodListFromDb = $foodListQuery->result();
    $restrictionFromDb = $restrictionQuery->result();

    $foodLists = $this->transformToHashMapG($foodListFromDb);
    $restrictions = $this->transformToHashMapG($restrictionFromDb);

    var_dump($foodLists);
    var_dump($restrictions);

    $found = false;

    foreach ($foodLists as $dietId => $foodList) {

      $found = false;
      foreach ($foodList as $k => $food) {
        if (isset($restrictions[$food])) {

          foreach ($non as $key => $no) {
            if (in_array($no, $restrictions[$food])) {
              echo ($dietId . '<br>');
              unset($foodLists[$dietId]);
              $found = true;
              break;
            }
          }
        }

        if ($found === true) {
          break;
        }
      }
    }

    var_dump($foodLists);
    return ($result = array_keys($foodLists));
  }

  public function isIn($code , $usedList) {
    
    if( in_array($code , $usedList) ){
      return true;
    }

    return false;
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Code_model.php */
/* Location: ./application/models/Code_model.php */