<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profils_model extends CI_Model
{
    public function check_login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('passwrd', $password);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_parametre()
    {
        $this->db->select('*');
        $this->db->from('parametre');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_parametre_id()
    {
        $this->db->select('parametre_id');
        $this->db->from('parametre');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_last_user()
    {
        $this->db->select_max('user_id');
        $this->db->from('users');
        $query = $this->db->get();
        $row = $query->row_array();

        return $row['user_id'];
    }
}
