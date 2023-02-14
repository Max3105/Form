<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';



$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom('maks', 'maks');
$mail->addAddress('maks.31.0502@gmail.com');
$mail->Subject = 'Hi!';

$body = '<h1>Letter</h1>';

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Name:</strong>'.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Email:</strong>'.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['age']))){
    $body.='<p><strong>Age:</strong>'.$_POST['age'].'</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
    $message = 'oshibka';
} else {
    $message = 'dannye otpravleny '; 
}
$response = ['message' => $message];

header('Content-type: applicatiom/json');
echo json_encode($response);
?>