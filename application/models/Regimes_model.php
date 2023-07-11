<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regimes_model extends CI_Model
{
    public function get_suggestion($id_user)
    {
        $this->db->select('*');
        $this->db->from('v_diet_dispo');
        $this->db->where('user_id', $id_user);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_apropos($id_regime)
    {
        $this->db->select('*');
        $this->db->from('');
        $this->db->where('regime_id', $id_regime);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDiet($id)
    {
        $this->db->select('*');
        $this->db->from('v_diet_dispo');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
}
