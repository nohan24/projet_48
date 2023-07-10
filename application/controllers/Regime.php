<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regime extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Regimes_model');
    }

    public function suggestion($id_user)
    {
        $data = array();
        $data['suggestion'] = $this->Regimes_model->get_suggestion($id_user);
        $this->load->view('Suggestion', $data);
    }

    public function apropos($id_regime)
    {
        $data = array();
        $data['apropos'] = $this->Regimes_model->get_apropos($id_regime);
        $this->load->view('Apropos', $data);
    }
}
