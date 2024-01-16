<?php
include __DIR__ ."/vendor/autoload.php";

ob_end_clean();

use Fpdf\Fpdf;

// Instanciamos la clase
// P = Portrait | mm = unidades en milímetros | A4 = formato
$pdf = new FPDF('P','mm','A4');

// Añadimos una página
$pdf->AddPage();

// Establecemos la fuente y el tamaño de letra
$pdf->SetFont('Arial', 'B', 30);

// Imprimimos una celda con el texto que nosotros queramos
$pdf->Cell(60,20,'Hello World!');

// Terminamos el PDF
$pdf->Output();