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

    public function SuggestionPdf()
    {
        require('assets/lib/fpdf.php');
        $diets = [
            ['name' => 'Régime méditerranéen', 'detail' => 'Le régime méditerranéen met l\'accent sur les aliments frais, les fruits et légumes, les grains entiers, les légumineuses et les graisses saines.', 'prix' => '10000 Ar'],
            ['name' => 'Régime DASH', 'detail' => 'Le régime DASH est riche en fruits, légumes, grains entiers, protéines maigres et produits laitiers faibles en gras.', 'prix' => '10000 Ar'],
            ['name' => 'Régime flexitarien', 'detail' => 'Le régime flexitarien encourage une alimentation principalement à base de plantes, mais permet également la consommation occasionnelle de viande et de produits animaux.', 'prix' => '10000 Ar'],
            ['name' => 'Régime végétalien', 'detail' => 'Le régime végétalien exclut tous les produits d\'origine animale, y compris la viande, les produits laitiers, les œufs et le miel.', 'prix' => '10000 Ar']
        ];

        // Create a new FPDF instance
        $pdf = new FPDF();
        $pdf->AddPage();
        
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 10, utf8_decode('Liste des suggestions'), 0, 1, 'C');
        $pdf->Ln(10);
   
        foreach ($diets as $diet) {
            $pdf->SetFont('Arial', 'B', 14); 
            $pdf->Cell(40, 10, utf8_decode('Nom du régime'), 0, 0, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 10, utf8_decode($diet['name']), 0, 'J');
            $pdf->Ln(2);
            
            $pdf->SetFont('Arial', 'B', 14);
            $pdf->Cell(40, 10, utf8_decode('Détails'), 0, 0, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 10, utf8_decode($diet['detail']), 0, 'J');
            $pdf->Ln(2);

            $pdf->SetFont('Arial', 'B', 14); 
            $pdf->Cell(40, 10, utf8_decode('Prix'), 0, 0, 'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 10, utf8_decode($diet['prix']), 0, 'J');
            $pdf->Ln(8);
        }
        $pdf->Output();
    }



}
