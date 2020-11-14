<?php
require_once 'includes/functions.php';
if( !isset($_SESSION)) {
	session_start();
}
if( !isset($_GET['lang'])) {
	$_GET['lang'] = 'en';
}

try {
	if (isset($_GET['link'])) {

		$email = base64_decode(str_replace('_','/',str_replace('-','+',$_GET['link'])));

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "biobazar";

		$conn = null;
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare("UPDATE email_subscriptions SET email_verified = 1,email_verified_at = NOW() WHERE email_verified = 0 and email = :email");
		$stmt->bindParam(":email", $email);
		$stmt->execute();
		$result = $stmt->rowCount();

		if($result == 1){
			redirect('index.php?email_verified');
		}else{
			redirect('index.php');
		}
	} else {
		redirect('index.php');
	}
} catch (\Exception $e) {
	redirect('index.php');
}
?>
