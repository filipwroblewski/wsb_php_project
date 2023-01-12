<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../vendor/autoload.php';
	require '../vendor/phpmailer/phpmailer/src/Exception.php';
	require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require '../vendor/phpmailer/phpmailer/src/SMTP.php';
	require '../credentials/email-login.php';
  

	try {
		$user_email = $user;
		
		$mail = new PHPMailer(true);
		$today = date("Y-m-d H:i");
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $email;
		$mail->Password = $pass;			
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;		
		$mail->Port = 587;
		$mail->setFrom($email, 'Oto.Sadzonki');
		$mail->addAddress($user_email);
		$mail->isHTML(true);
		
		$mail->Subject = 'Odbierz sadzonki';
		$mail->Body = '<p>Sadzonki gotowe do odebrania. Zaloguj swoje konto i oznacz sadzonki jako odebrane.</p>';
		$mail->send();
	} catch (Exception $e) {
		// echo 'Wyjątek: ',  $e->getMessage(), "\n";
	}
?>
