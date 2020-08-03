<?php
require('fpdf.php');
session_start();
$z=$_SESSION['a'];
$x=htmlspecialchars($_SESSION["name"]);
$c=$_COOKIE['product'];
$v=htmlspecialchars($_SESSION["cardno"]);
$pdf = new FPDF(); 
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetX(50); // abscissa of Horizontal position 
$pdf->MultiCell(100,10,"Invoice=$z");

$pdf->Ln(20); // Line gap
$pdf->SetX(50); // abscissa of Horizontal position 
$pdf->MultiCell(100,10,"Name=$x");

$pdf->Ln(20); 
$pdf->SetX(50); 
$pdf->MultiCell(100,10,"Amount=$c");

$pdf->Ln(20); 
$pdf->SetX(50); 
$pdf->MultiCell(100,10,"Card Number=$v");

$pdf->Output('my_file.pdf','I'); // Send to browser and display
?>