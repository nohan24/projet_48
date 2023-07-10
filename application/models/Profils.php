<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profils extends CI_Model {
    public function check_login($email, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('passwrd', $password);
        $query = $this->db->get();
        return $query->result_array();
    }
}