<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require '../vendor/autoload.php';
	require '../vendor/phpmailer/phpmailer/src/Exception.php';
	require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require '../vendor/phpmailer/phpmailer/src/SMTP.php';
  

	try {
		$email = $user;
		
		$mail = new PHPMailer(true);
		$today = date("Y-m-d H:i");
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'oto.sadzonki@gmail.com';
		$mail->Password = 'kzrryoouhafdtzlb';			
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;		
		$mail->Port = 587;
		$mail->setFrom('oto.sadzonki@gmail.com', 'Oto.Sadzonki');
		$mail->addAddress($email);
		$mail->isHTML(true);
		
		$mail->Subject = 'Odbierz sadzonki';
		$mail->Body = '<p>Sadzonki gotowe do odebrania. Zaloguj swoje konto i oznacz sadzonki jako odebrane.</p>';
		$mail->send();
	} catch (Exception $e) {
		// echo 'Wyjątek: ',  $e->getMessage(), "\n";
	}
?>
