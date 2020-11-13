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

redirect('../index.php');