<?php
session_start();

$mysqli = require __DIR__ . "/dbcon.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];		

// Check if the email is already registered
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	echo "Email is already registered.";
	exit;
}

// Insert user data into the database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
		
if ($mysqli->query($sql) === TRUE) {
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['username'] = $_POST['username'];
	header("Location: ../pages/home.php");
} else {
	$signupError = "Error: " . $sql . "<br>" . $mysqli->error;
	echo $signupError;
}

$mysqli->close();
?>