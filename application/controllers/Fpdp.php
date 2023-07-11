<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fpdf extends CI_Controller
{
    public function generatePdf() {
        $suggestion = $this->Regimes_model->get_regime(1);
        require_once(base_url('assets/lib/fpdf.php'));
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(50, 50, 'Listes de suggestions de regime');
        $pdf->Output();
    }
}
?>