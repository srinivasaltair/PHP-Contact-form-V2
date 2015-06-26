<?php

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phoneno = $_POST['phoneno'];
	$message = $_POST['message'];

	if($name!="" || $email!="" || $phoneno ="" || $message="") {

		$email_to = "srnvs0708@gmail.com";
		$email_subject = "This a php contact form mail";
		
		
		function died($error) {
			
        	echo $error."<br /><br />";
        	echo "Please go back and fix these errors.<br /><br />";
        	die();
			
		}
		
		if(!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["phoneno"]) || !isset($_POST["message"])){
			died('please fill the form before submitting');
		}
		
		$name = $_POST['name'];
    	$email = $_POST['email'];
    	$phoneno = $_POST['phoneno'];
    	$message = $_POST['message'];
		
		$error = "";
		
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		/*if(!preg_match($email_exp,$email)) {
			$error_message .= 'Invalid Email <br />';
		}
		
		$string_exp = "/^[A-Za-z .'-]+$/";
		if(!preg_match($string_exp,$name)) {
			$error_message .= 'Invalid Name <br />';
		}*/
		
		$email_message = "Form details below.\n\n";
		
		function clean_string($string) {
		  $bad = array("content-type","bcc:","to:","cc:","href");
		  return str_replace($bad,"",$string);
		}
		
		$email_message .= "Name: ".clean_string($name). "\n";
		$email_message .= "Email: ".clean_string($email). "\n";
		$email_message .= "Phone Number: ".clean_string($phoneno). "\n";
		$email_message .= "Message: ".clean_string($message). "\n";
		
		$headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n".'X-Mailer: PHP/' . phpversion();
		
		@mail($email_to,$email_subject,$email_message,$headers);

		echo "Thank You for submitting form";

	}
?>