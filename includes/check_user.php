<?php

require_once 'functions.php';

if(!count($_POST) || !isset($_POST['email']) || !isset($_POST['password'])){
	redirect('../bbadm/index.php');
}

$email = $_POST['email'];
$user_password = $_POST['password']; //admin

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biobazar";

$conn = null;
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "select * FROM users where email='".$email."' and status = 1";
	$stmt = $conn->query($query);
	$user  = $stmt->fetchObject();

	if(empty($user))
	{
		redirect('../bbadm/index.php');
	}
	if(password_verify($user_password, $user->password)) {
		redirect('../bbadm/email_detail.php');
	}else{
		redirect('../bbadm/index.php');
	}
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
	redirect('../bbadm/index.php');
} finally {
	$conn = null;
}
