<?php


require("../vendor/autoload.php");
use Picqer\Barcode\BarcodeGeneratorPNG;

$codigo = $_GET['code'] ?? 'TEST-001';

$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode($codigo, $generator::TYPE_CODE_128);
header('Content-Type: image/png');
echo $barcode;

?>