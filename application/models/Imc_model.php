<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Imc_model
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

class Imc_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function calcIMC( $user_id ) {
    
  }

  public function getIMCState($user_id = 1) {
    $taille = 0;

    $this->db->select("heigth");
    $this->db->from("completion");
    $this->db->where("user_id", $user_id);

    $result = $this->db->get()->result_array();
    foreach ($result as $r) {
      $taille = $r['heigth'];
      break;
    }

    $query = sprintf('select datediff(curdate() , (select dtn from completion where user_id = %s) )/365 as an' , $user_id);
    $temp = $this->db->query($query);
    $ageList = $temp->result_array();

    foreach ($ageList as $r) {
      $age = $r['an'];
      break;
    }

    $poids = 0;
    $this->db->select("weigth");
    $this->db->from("completion");
    $this->db->where("user_id", $user_id);

    $result = $this->db->get()->result_array();
    foreach ($result as $r) {
      $poids = $r['weigth'];
      break;
    }

    $imc = $poids / ($taille * $taille);

    $plagesIMC = array(
        "insuffisant" => array("min" => 0, "max" => 18.4),
        "normal" => array("min" => 18.5, "max" => 24.9),
        "surpoids" => array("min" => 25, "max" => 29.9),
        "obese" => array("min" => 30, "max" => 39.9),
        "obese_severe" => array("min" => 40, "max" => 656516)
    );

    $categorieIMC = "";
    if ($age < 18) {
        $plagesIMC = array(
            "insuffisant" => array("min" => 0, "max" => 14.9),
            "normal" => array("min" => 15, "max" => 22.9),
            "surpoids" => array("min" => 23, "max" => 28.9),
            "obese" => array("min" => 29, "max" => 39.9),
            "obese_severe" => array("min" => 40, "max" => 656516)
        );
    }

    // Vérification de l'IMC par rapport aux plages définies
    foreach ($plagesIMC as $categorie => $plage) {
        if ($imc >= $plage["min"] && $imc <= $plage["max"]) {
            $categorieIMC = $categorie;
            break;
        }
    }

    // Retourner la catégorie de l'IMC
    echo($categorieIMC);
    // return $categorieIMC;
  }

  function calculerIMC($taille, $age, $poids) {
    // Calcul de l'IMC
    $imc = $poids / ($taille * $taille);

    $plagesIMC = array(
        "insuffisant" => array("min" => 0, "max" => 18.4),
        "normal" => array("min" => 18.5, "max" => 24.9),
        "surpoids" => array("min" => 25, "max" => 29.9),
        "obese" => array("min" => 30, "max" => 39.9),
        "obese_severe" => array("min" => 40, "max" => 656516)
    );

    $categorieIMC = "";
    if ($age < 18) {
        $plagesIMC = array(
            "insuffisant" => array("min" => 0, "max" => 14.9),
            "normal" => array("min" => 15, "max" => 22.9),
            "surpoids" => array("min" => 23, "max" => 28.9),
            "obese" => array("min" => 29, "max" => 39.9),
            "obese_severe" => array("min" => 40, "max" => 656516)
        );
    }

    // Vérification de l'IMC par rapport aux plages définies
    foreach ($plagesIMC as $categorie => $plage) {
        if ($imc >= $plage["min"] && $imc <= $plage["max"]) {
            $categorieIMC = $categorie;
            break;
        }
    }

    // Retourner la catégorie de l'IMC
    return $categorieIMC;
  }

  public function getNormalIMC($age) {
    if( $age < 18 ){
      return [ 15 , 22.9 ];
    }else{
      return [ 18.5 , 24.9];
    }
    
  }
}

/* End of file Imc_model.php */
/* Location: ./application/models/Imc_model.php */