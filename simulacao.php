<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btn_enviar1'])) {
	$titulo_mensagem=utf8_decode('Olá equipe SD cred, nova simulação solicitada de: ');
	$nome1=utf8_decode($_POST['nome1']);
	$email1=$_POST['email1'];
	$mensagem1=utf8_decode('Uma simulação foi solicitada pelo cliente ');
	$numero1=$_POST['numero1'];

		require_once('src/PHPMailer.php');
		require_once('src/SMTP.php');
		require_once('src/Exception.php');

		$mail=new PHPMailer(true);

		try{
			$mail->SMTPDebug=SMTP::DEBUG_SERVER;
		$mail->isSMTP();
		$mail->Host='smtp.gmail.com';
		$mail->SMTPAuth=true;
		$mail->Username="testesitesdcred@gmail.com";
		$mail->Password='sdcredsolucoes';
		$mail->Port=587;

		$mail->setFrom('testesitesdcred@gmail.com');
		$mail->addAddress('testesitesdcred@gmail.com');
		$mail->isHTML(true);
		$mail->Subject= $titulo_mensagem.' '.$nome1;
		$mail->Body= $mensagem1.' : '.$nome1.'<br/>'. 'CONTATOS CEDIDOS PELO CLIENTE:' .'<br/>'.
		'E- mail: '.$email1. '<br/>' .
		'Telefone: '.$numero1 ;
		$mail->AltBody="O email de SD cred chegou";


		if($mail->send()){
			include "mensagem2.php";
			echo "<script>alert('Sua Mensagem foi enviada com êxito');location.href='index.php';</script>";



		}
	} catch (Exception $e){
		echo "<script>alert('Erro ao enviar mensagem');location.href='index.php';</script>";

	}
} header("location:index.php");
die();


?>