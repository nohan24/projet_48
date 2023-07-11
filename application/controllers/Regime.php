<?php
session_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Regime extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Regimes_model');
        $this->load->model('Suggestion_model');
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

    public function psuggestion(){
        $user_id = $_SESSION['user'];
        $suggestion = $this->Suggestion_model->getSuggestion($user_id);
        $regime = array();
        for($i = 0; $i < count($suggestion); $i++){
            $regime = $this->Regimes_model->get_regime($suggestion[$i]);
        }
        $data = array();
        $data['regime'] = $regime;
        $this->load->view('login/suggestion', $data);
    } 

    public function SuggestionPdf()
    {
        require('assets/lib/fpdf.php');
        $user_id = $_SESSION['user'];
        $suggestion = $this->Suggestion_model->getSuggestion($user_id);
        $regime = array();

        for ($i = 0; $i < count($suggestion); $i++) {
            $regime = $this->Regimes_model->get_regime($suggestion[$i]);
        }

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, utf8_decode('Liste des suggestions'), 0, 1, 'C');
        $pdf->Ln(10);

        for ($i = 0; $i < count($regime); $i++) {
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(40, 10, utf8_decode('Nom du régime'), 0, 0, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 10, utf8_decode($regime[$i]['name']), 0, 'J');
            $pdf->Ln(2);

            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(40, 10, utf8_decode('Détails'), 0, 0, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Ln();
            $pdf->Cell(40, 10, utf8_decode("Viande:"), 0, 0, 'L');
            $pdf->Cell(0, 10, utf8_decode($regime[$i]['pour_viande'] . "%"), 0, 1, 'L');
            $pdf->Cell(40, 10, utf8_decode("Poisson:"), 0, 0, 'L');
            $pdf->Cell(0, 10, utf8_decode($regime[$i]['pour_poisson'] . "%"), 0, 1, 'L');
            $pdf->Cell(40, 10, utf8_decode("Volaille:"), 0, 0, 'L');
            $pdf->Cell(0, 10, utf8_decode($regime[$i]['pour_volaille'] . "%"), 0, 1, 'L');
            $pdf->Ln(2);

            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(40, 10, utf8_decode('Prix'), 0, 0, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 10, utf8_decode($regime[$i]['prix']), 0, 'J');
            $pdf->Ln(8);
        }

        $pdf->Output();
    }




}
