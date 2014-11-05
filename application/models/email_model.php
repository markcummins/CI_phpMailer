<?php

Class Email_model extends CI_Model {
	
	function send_email($to, $fullname, $subject, $body, $filename="", $url="", $fileType=""){

		/*
		 * FOR PHP V-5.3+
		 */
		$ret = "";
		$binary_content = file_get_contents($url);
		
		$this->load->library('mailer');
		
		$this->mailer->PHPMailerAutoload('pop3', true, true);
		$this->mailer->PHPMailerAutoload('smtp', true, true);
		$this->mailer->PHPMailerAutoload('phpmailer', true, true);
		
		$mail = new PHPMailer();
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'user@example.com';                 // SMTP username
		$mail->Password = 'secret';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		
		$mail->From = 'from@example.com';
		$mail->FromName = 'Mailer';
		$mail->addAddress($to, $fullname);
		
		$mail->WordWrap = 50;                                 	// Set word wrap to 50 characters
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment(urlencode('http://www.maths.tcd.ie/~dwilkins/LaTeXPrimer/GSWLaTeX.pdf'), 'new.pdf');    // Optional name
		
		if($filename != ""){
			$mail->AddStringAttachment($binary_content, $filename, $encoding='base64', $type=$fileType);
			$mail->isHTML(true);                                  // Set email format to HTML
		}
		
		$mail->Subject = $subject;
		$mail->Body    = $body;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		if(!$mail->send()) {
			$ret = 'Message could not be sent.';
			$ret .= 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else {
			$ret = 'Message has been sent';
		}
		
		return $ret;
	}
}

