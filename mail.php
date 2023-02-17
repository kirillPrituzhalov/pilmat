<?php 

try
{
   require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$user_name_message = $_POST['user_name_message'];
$fam_message = $_POST['subject'];
$email = $_POST['e-mail'];
$message = $_POST['message'];

$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'klientt98@mail.ru'; 
$mail->Password = 'axa7wazo';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('klientt98@mail.ru'); 
$mail->addAddress('and-gend@mail.ru');
$mail->isHTML(true);

$mail->Subject = 'Заявка с сайта';
$mail->Body    = ''.$user_name_message.' '.$fam_message. ' написал письмо'.": ".$message.". Eго почта: ".$email;
$mail->AltBody = '';

 if (!$mail->send()) {
 	echo 'error';
 } else {
 	header('location: index.html');
 }
}
catch (Throwable $t)
{
   echo $t->getMessage() . '. ' . $t->getTraceAsString();
}

