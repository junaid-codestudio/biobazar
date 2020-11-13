<?php

if( !isset($_SESSION)) {
	session_start();
}
require_once 'functions.php';

if( !count($_POST) || !isset($_POST['email'])) {
	redirect('../index.php');
}

$email = $_POST['email'];
$page_lang = $_GET['lang'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biobazar";

$conn = null;
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname" , $username , $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
	
	$stmt = $conn->prepare("INSERT IGNORE INTO email_subscriptions (email) VALUES (:email)");
	$stmt->bindParam(':email' , $email);
	$stmt->execute();
	
	$stmt = $conn->prepare("SELECT * FROM email_subscriptions where email = ? AND email_verified_at IS NULL ");
	if($stmt->execute(array($email))) {
		$row = $stmt->fetch();
		send_email($email);
	}
	echo "New record created successfully";
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
//	exit;
} finally {
	$conn = null;
}

redirect('../index.php?lang='.$page_lang);
