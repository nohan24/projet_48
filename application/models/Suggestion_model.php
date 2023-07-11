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

  public function getDetail($user, $regime)
  {
    $sql = "SELECT * FROM completion where user_id = $user";
    $q = $this->db->query($sql)->row_array();
    $d = $this->db->query("SELECT * FROM v_diet_dispo where id = $regime")->row_array();
    $duree = abs($q['objectif'] / $d['duration']);
    $prix = $d['prix'] * $duree;
    return [$duree, $prix];
  }

  public function getSuggestion($user_id)
  {
    $non = array();
    $this->db->select('*');
    $this->db->from('completion');
    $this->db->where('user_id', $user_id);
    $valiny = $this->db->get()->row_array();


    if ($valiny['objectif'] < 0) {
      $query = $this->db->query("SELECT * FROM listfood WHERE diet_id IN (select id from diet where objectif = -1 and gender = " . $valiny['gender'] . ")");
      $res = $query->result();
    } else {
      $query = $this->db->query("SELECT * FROM listfood WHERE diet_id IN (select id from diet where objectif = 1 and gender = " . $valiny['gender'] . ")");
      $res = $query->result();
    }

    $restrictionQuery = $this->db->get('restriction');

    $this->db->select("parametre_id");
    $this->db->from("user_restriction");
    $this->db->where("user_id", $user_id);
    $result = $this->db->get()->result_array();
    foreach ($result as $r) {
      array_push($non, $r['parametre_id']);
    }

    $foodListFromDb = $res;
    $restrictionFromDb = $restrictionQuery->result();

    $restrictions = $this->transformToHashMapG($restrictionFromDb);
    $foodLists = $this->transformToHashMapG($foodListFromDb);


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

    return ($result = array_keys($foodLists));
  }



  // ------------------------------------------------------------------------

}

/* End of file Suggestion_model.php */
/* Location: ./application/models/Suggestion_model.php */