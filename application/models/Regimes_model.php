<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regimes_model extends CI_Model
{
    public function get_suggestion($id_user)
    {
        $this->db->select('*');
        $this->db->from('v_regime');
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

    public function get_regime($id_regime)
    {
        $this->db->select('*');
        $this->db->from('diet');
        $this->db->where('id', $id_regime);
        $query = $this->db->get();
        return $query->result_array();
    }
}
