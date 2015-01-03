<?php

	if(isset($_POST['name'])){
		if($_POST['name'] != ''){
			$to = 'ian@coulton.org';
			$subject = 'Message sent from my website';
			$body = "Name: " . $_POST['name'] . "\r\nEmail: " . $_POST['email'] . "\r\nMessage:\r\n" . $_POST['message'];
			$headers = 'From: ian@coulton.org' . "\n" .
						'Reply-To: ian@coulton.org' . "\n" .
						'X-Mailer: PHP/' . phpversion();
		
			mail($to, $subject, $body, $headers);
			
			$to =  $_POST['email'];
			$subject = 'Message sent to Ian';
			$body = "Dear " . $_POST['name'] . "\r\n\r\nThank you for getting in touch. Your message has been sent to Ian and he will respond as soon as he is available.";
			$headers = 'From: ian@coulton.org' . "\n" .
						'Reply-To: ian@coulton.org' . "\n" .
						'X-Mailer: PHP/' . phpversion();
		
			mail($to, $subject, $body, $headers);
			
			header("Location: ../thankyou.php");
		}
	}
	
?>