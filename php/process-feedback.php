<?php
session_start();

$mysqli = require __DIR__ . "/dbcon.php";

$username = $_SESSION['username'];
$feedback = $_POST['feedback'];
$stars = $_POST['rate'];

$sql = "insert into feedback (username, feedback, stars) values ('$username', '$feedback','$stars')";

if ($mysqli->query($sql) === TRUE) {
	header("Location: ../pages/feedback.php");
} 
else {
	$signupError = "Error: " . $sql . "<br>" . $mysqli->error;
	echo $signupError;
}
		
$mysqli->close();
?>