<?php
/**
* This file outputs the generated Presupuesto to print it
*/
require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$document = file_get_contents('views/concepto/presupuesto_output.html');

$pdf = new Html2Pdf();
$pdf -> writeHTML($document);
$pdf -> output('Cotizacion.pdf');
