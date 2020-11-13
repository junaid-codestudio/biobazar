<?php

require_once 'functions.php';

if(!count($_POST) || !isset($_POST['email'])){
	redirect('../index.php');
}

$email = $_POST['email'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biobazar";

$conn = null;
try {
	send_email($email);
	exit;
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully";

	$stmt = $conn->prepare("INSERT IGNORE INTO email_subscriptions (email) VALUES (:email)");
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	echo "New record created successfully";
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
} finally {
	$conn = null;
}

function send_email($to)
{
	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$link = str_replace('includes/save_send_emails.php', 'verify_email.php', $link);
	echo $link;
	exit;
	require_once("../PHPMailer/src/PHPMailer.php");
	require_once("../PHPMailer/src/SMTP.php");
	require_once("../PHPMailer/src/Exception.php");

	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->SMTPDebug=0;
	$mail->isSMTP();

	$mail->Host="ssl://smtp.gmail.com";
	$mail->Port=465; //587
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="noreply@berain.com.sa";
	$mail->Password="GBC@@OMS";

	$mail->addAddress($to,"User Name");
	$mail->Subject="Verify Your Email Address";
	$mail->isHTML();
	$mail->Body="Dear Customer, Please use following link to verify your eamil.<b> <br>".$link. "<br> Thank you for registring.";
	$mail->From="noreply@berain.com.sa";
	$mail->FromName="berain";

	if($mail->send())
	{
		echo 'email send suss';
		exit;
		return true;
	}
	else
	{
		echo 'email not send suss';
		exit;
		return false;
		echo "Failed To Sent An Email To Your Email Address";
	}
}

redirect('../index.php');
