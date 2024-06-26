<?php

require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image("../../images/LOGO.jpeg",15,8,33);
    // Arial bold 15
    $this->SetFont("Arial", "B", 12);
    // Título
    $this->Cell(200, 5,"Gran Rifa Royal", 0, 0, "C");
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,-30,'Page '.$this->PageNo().'/{nb}',0,1,'C');
}
}








?>