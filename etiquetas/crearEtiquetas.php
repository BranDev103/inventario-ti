<?php

require("../libraries/fpdf/fpdf.php");
require "../config/conexion.php";
require("../vendor/autoload.php");

use Picqer\Barcode\BarcodeGeneratorPNG;

$id = $_GET['id'];

$query = "SELECT * FROM equipos WHERE id = $id";
$resultado = mysqli_query($conexion, $query);
$equipo = mysqli_fetch_assoc($resultado);

$generator = new BarcodeGeneratorPNG();

$codigo = $equipo['clave'];

$barcodeData = $generator->getBarcode($codigo, $generator::TYPE_CODE_128);

$rutaBarcode = __DIR__ . '/temp_' . $codigo . '.png';
file_put_contents($rutaBarcode, $barcodeData);


//$pdf = new PDF('L', 'mm', [170, 170]);
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'BI', 10);

$pdf->Cell(40, 7, '', 'TLR', 0);
$pdf->Cell(60, 7, ' CLAVE: ' . $equipo['clave'], 'TR', 0);
$pdf->Cell(50, 7, '', 'TR', 1, 'C');

$pdf->Cell(40, 7, '', 'LR', 0);
$pdf->Cell(60, 7, ' TIPO: ' . $equipo['tipo'], 'R', 0);
$pdf->Cell(50, 7, '', 'R', 1, 'C');

$pdf->Cell(40, 7, $pdf->Image('../assets/img/logo_header.png', $pdf->GetX() + 5, $pdf->GetY() - 5, 30), 'LR', 0, 'C');
$pdf->Cell(60, 7, ' MARCA: ' . $equipo['marca'], 'R', 0);
$pdf->Cell(50, 7, $pdf->Image($rutaBarcode, $pdf->GetX() + 5, $pdf->GetY() - 5, 40, 18), 'R', 1, 'C');

$pdf->Cell(40, 7, '', 'LR', 0);
$pdf->Cell(60, 7, ' MODELO: ' . $equipo['modelo'], 'R', 0);
$pdf->Cell(50, 7, '', 'R', 1, 'C');

$pdf->Cell(40, 7, '', 'BLR', 0);
$pdf->Cell(60, 7, ' NO. SERIE: ' . $equipo['no_serie'], 'BR', 0);
$pdf->Cell(50, 7, '', 'BR', 1, 'C');



unlink($rutaBarcode);

$pdf->Output('', 'etiqueta.pdf');
