<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Regimes');
    }

    public function suggestion($id_user){
        $data = array();
        $data['suggestion'] = $this->Regimes->get_suggestion($id_user);
        $this->load->view('Suggestion', $data);
    }

    public function apropos($id_regime){
        $data = array();
        $data['apropos'] = $this->Regimes->get_apropos($id_regime);
        $this->load->view('Apropos', $data);
    }
}

?>