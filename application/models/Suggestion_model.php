<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Suggestion_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  // public function getSuggestion( $objectif )
  // {
  //   $query = sprintf('SELECT * FROM composition WHERE type_regime = %s ' , $objectif );

  //   $statement = $this->db->query($query);
  //   $results = $statement->result();

  //   return $results;
  // }

  public function transformToHashMapG($result)
  {
    $hashMap = array();

    foreach ($result as $row) {
      $attributes = get_object_vars($row);
      $keys = array_keys($attributes);

      $key = $attributes[$keys[0]];
      $values = array_slice($attributes, 1);

      if (!isset($hashMap[$key])) {
        $hashMap[$key] = array();
      }

      $hashMap[$key] = array_merge($hashMap[$key], array_values($values));
    }

    return $hashMap;
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



  // ------------------------------------------------------------------------

}

/* End of file Suggestion_model.php */
/* Location: ./application/models/Suggestion_model.php */