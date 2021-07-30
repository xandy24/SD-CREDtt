
<?php
	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btn_enviar'])) {

$titulo=utf8_decode('Olá equipe SD cred, nova mensagem de contato de : ');
$name=utf8_decode($_POST['name']);
$email=$_POST['email'];
$message=$_POST['message'];
	require_once('src/PHPMailer.php');
	require_once('src/SMTP.php');
	require_once('src/Exception.php');


	$mail= new PHPMailer(true);

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
		$mail->Subject= $titulo.' '.$name ;
		$mail->Body= $message. ' --- '.'de: '. $email;
		$mail->AltBody="O email de SD cred chegou";
		if($mail->send()){
			    echo "<script>alert('Sua Mensagem foi enviada com êxito');location.href='index.php';</script>";


		}else{
			echo "Email não enviado";
		}



	} catch (Exception $e){
		echo "<script>alert('Erro ao enviar mensagem');location.href='index.php';</script>";

	}
}
?>
