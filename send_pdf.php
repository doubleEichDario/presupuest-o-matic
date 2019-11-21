<?php
session_start();

require_once 'vendor/autoload.php';
require_once 'config/parameters.php';

use Spipu\Html2Pdf\Html2Pdf;

// Save recipient email adress from set_recipient.php
isset($_POST['recipient']) ? $recipient = $_POST['recipient'] : false;
isset($_POST['sender']) ? $sender = $_POST['sender'] : false;

// Create transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
    -> setUsername('somename@someservicename.com')
    -> setPassword('MAIL_PASSWORD');

// Istantiate Mailer
$mailer = new Swift_Mailer($transport);

$document = file_get_contents('views/concepto/presupuesto_output.html');

$pdf = new Html2Pdf();
$pdf -> writeHTML($document);
$pdf -> output('C:\xampp\htdocs\PHPmaster\presupuestos\pdfs\Cotizacion.pdf', 'F');

// Message
$message = (new Swift_Message('Su cotización'))
    -> setFrom(['mailer@presupuestos.com' => $sender])
    -> setTo([$recipient => ''])
    -> setBody('No responda este mensaje, esta dirección de correo electrónico solo envía las cotizaciones')
    -> attach(Swift_Attachment::fromPath('pdfs/Cotizacion.pdf') -> setFilename('Cotización.pdf'));

$result = $mailer -> send($message);

// Deletes created pdf file
$delete_file = unlink('pdfs/Cotizacion.pdf');

if($delete_file)
    $_SESSION['message'] = 'El documento se envió correctamente';
else
    $_SESSION['message'] = 'El documento no pudo enviarse';

header('Location: '.BASE_URL);
