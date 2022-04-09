<?php

FUNCTION creerPdf($Inscription){
$pdf = new FPDF();
$pdf ->SetLineWidth(1.5);
// Titres des colonnes
$header = array('Nom ', 'Prénom', 'Jour et heure', 'Professeur', 'Instrument');
// Chargement des données
//$data = $pdf->LoadData('pays.txt');
$pdf->AddPage();

$pdf->SetFont('Courier','BIU',18);
$pdf ->Cell(180,10,'le conservatoire','LTRB', '0', 'C');
$pdf-> Ln();
$pdf->SetFont('Helvetica','BI',16);
$pdf ->Cell(40,15,'Le conservatoire de musique pour monter en competence');


$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();
$pdf-> Ln();

//$pdf->Image('../images/conservatoires.jpg',48,35, 110, 60);

$pdf ->SetLineWidth(0.7);
$pdf ->Line(0, 100, 220, 100);

$pdf->SetFont('Arial','',13);
$pdf -> cell(40, 10, 'Voici un recapitulatif de votre inscription:',0, 0, 2);

$pdf-> Ln();
$pdf ->SetLineWidth(0.2);
$pdf->SetFont('Times','B',16);
$w = array(30, 30, 30, 60, 30);
// En-tête
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
// Données

$pdf->Cell($w[0],6,$Inscription[0]['nom'],1,'LR', 'C');
$pdf->Cell($w[1],6,$Inscription[0]['prénom'],1,'LR', 'C');
$pdf->Cell($w[2],6,$Inscription[0]['adres'],1,'LR', 'C');
$pdf->Cell($w[3],6,$Inscription[0]['mail'],1,'LR', 'C');
$pdf->Cell($w[4],6,$Inscription[0]['instrument'],1,'LR', 'C');
$pdf->Ln();

// Trait de terminaison
$pdf->Cell(array_sum($w),0,'','T');

$pdf-> Ln();

$pdf ->SetLineWidth(0.7);
$pdf ->Line(0, 145, 220, 145);
$pdf->SetFont('Arial','',13);
$pdf -> cell(40, 40, 'Voici un recapitulatif de votre inscription:',0, 0, 2);

$pdf-> Ln();

$pdf -> SetY(-26);
$pdf ->SetLineWidth(0.1);
$pdf -> SetTextColor(255,0,0);
$pdf -> SetDrawColor(255,0,0);
$pdf->SetFont('Courier','BI',10);
$pdf->Output();


}
?>
