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
    $this->Cell(200, 5,"Lista de numero de moto", 0, 0, "C");
    //Formato de fecha
    $this->Cell(-30, 5, "Fecha: ". date("d/m/Y"), 0, 1, "C");
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Formato de letra Negrita
    // $this->SetFont('Arial','B',8);
    //Direccion de la compañia 
    // $this->Cell(0,10,utf8_decode("Ubicado en: Base Aerea Generalisimo Francisco de Miranda (La Carlota) Caracas-Venezuela"),0,1,"C");
    // $this->Cell(0,4,"Master: (+58 212) 234-67-46 - www.industriacanaima.gob.ve", 0,1, "C");
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,-30,'Page '.$this->PageNo().'/{nb}',0,1,'C');
}
}








?>