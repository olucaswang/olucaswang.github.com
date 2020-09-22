<?php
date_default_timezone_set('America/Sao_Paulo');

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name = isset($_POST['name']) ? $_POST['name'] : 'Não Informado!';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não Informado!';
$subject = isset($_POST['subject']) ? $_POST['subject'] : 'Não Informado!';
$message = isset($_POST['message']) ? $_POST['message'] : 'Não Informado!';
$data = date('d/m/Y H:i:s');

if($email && $message) {
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'lucaswang1216@gmail.com';
	$mail->Password = 'lucas1216';
	$mail->Port = 587;

	$mail->setFrom('lucaswang1216@gmail.com');
	$mail->addAddress('lucaswangg@hotmail.com');
	$mail->addAddress('lucaswangg@hotmail.com');

	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = "Nome: {$name}<br>
					Email: {$email}<br>
					Mensagem: {$message}<br>
					Data/Hora: {$data}";

	if($mail->send()) {
		include('../index.html');
	} else {
		echo 'Email nao enviado';
	}
} else {
	echo 'Email não enviado: informar email e mensagem!';
}