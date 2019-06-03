<?php

include __DIR__ . '/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new \PHPMailer\PHPMailer\PHPMailer(true);

$from_address = 'from@example.com';
$from_name = 'Mailer';

try {
	//Server settings
	$mail->SMTPDebug = 2;                                       // Enable verbose debug output
	$mail->isSMTP();                                            // Set mailer to use SMTP
	$mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail->Username   = 'user@example.com';                     // SMTP username
		$mail->Password   = 'secret';                               // SMTP password
	$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
	$mail->Port       = 587;                                    // TCP port to connect to

	//Recipients
	$mail->setFrom($from_address, $from_name);
	$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
	$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('info@example.com', 'Information');
//	$mail->addCC('cc@example.com');
//	$mail->addBCC('bcc@example.com');

	// Attachments
//	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	// Content
	$mail->isHTML(false);                                  // Set email format to HTML
	$mail->Subject = 'Hello subject';
	$mail->Body    = 'Hello Body';
//	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$mail->send();
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}