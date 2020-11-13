<?php

function __ ($value = false , $lang = false)
{
	global $en , $de , $fr , $pt , $page_lang;
	// echo json_encode($de); exit;
	// echo $_SESSION['page_lang']; exit;
	
	if( !$value) {
		echo '';
	}
	
	if( !$lang) {
		if($page_lang === 'en') {
			echo $en[$value];
		}
		
		if($page_lang === 'de') {
			echo $de[$value];
		}
		
		if($page_lang === 'fr') {
			echo $fr[$value];
		}
		
		if($page_lang === 'pt') {
			echo $pt[$value];
		}
	}
	else {
		if($lang === 'en') {
			echo $en[$value];
		}
		
		if($lang === 'de') {
			echo $de[$value];
		}
		
		if($lang === 'fr') {
			echo $fr[$value];
		}
		
		if($lang === 'pt') {
			echo $pt[$value];
		}
	}
}

function redirect($url)
{
	if (!headers_sent())
	{
		header('Location: '.$url);
		exit;
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		echo '</noscript>'; exit;
	}
}

function send_email ($to)
{
	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$link = str_replace('includes/save_send_emails.php' , 'verify_email.php' , $link);
	require_once("../PHPMailer/src/PHPMailer.php");
	require_once("../PHPMailer/src/SMTP.php");
	require_once("../PHPMailer/src/Exception.php");
	
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	
	$mail->Host = "mail.codestudio.pk";
	$mail->Port = 465; //587
	$mail->SMTPSecure = "ssl";
	$mail->SMTPAuth = true;
	$mail->Username = "info@codestudio.pk";
	$mail->Password = "CodeStudio@123_";
	
	$mail->addAddress($to , "User Name");
	$mail->Subject = "Please Verify Your Email Address";
	$mail->isHTML();
	$mail->Body = "Dear Customer, Please use following link to verify your eamil.<b> <br>" . $link . "<br> Thank you for registring.";
	$mail->From = "info@codestudio.pk";
	$mail->FromName = "BioBazar";
	
	if($mail->send()) {
		$_SESSION['mail_sent_success'] = true;
		echo 'email send suss';
	}
	else {
		$_SESSION['mail_sent_success'] = false;
		echo 'email not send suss';
		echo "Failed To Sent An Email To Your Email Address";
	}
}