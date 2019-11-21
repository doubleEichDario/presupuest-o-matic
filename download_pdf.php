<?php
/**
* This file outputs and force downloading the generated Presupuesto
* named by 'Cotizacion.pdf'
*
*/
require_once 'vendor/autoload.php';
require 'config/parameters.php';

use Spipu\Html2Pdf\Html2Pdf;

$document = file_get_contents('views/concepto/presupuesto_output.html');

$pdf = new Html2Pdf();
$pdf -> writeHTML($document);
$pdf -> output('Cotizacion.pdf', 'D');
