<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$apresentacao=utf8_decode('Olá Sr.(a) ');
$mensagem2=utf8_decode('Recebemos a sua solicitação de simulação, entraremos em contato em breve, agradecemos a paciência.');
$titulo_mensagem2=utf8_decode('O E-mail de SD cred chegou !');
//$imagem= "<img src=imgs\>";


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
		$mail->addAddress($email1);
		$mail->isHTML(true);
		$mail->Subject= $titulo_mensagem2;
		$mail->Body= $apresentacao.' : '.$nome1.' '. $mensagem2;
		$mail->AltBody="O email de SD cred chegou";


		if($mail->send()){

			echo "<script>alert('Sua Mensagem foi enviada com êxito');location.href='index.php';</script>";
		

		}
	} catch (Exception $e){
		echo "<script>alert('Erro ao enviar mensagem');location.href='index.php';</script>";

	} 
?>