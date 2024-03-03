<?php
session_start();

$mysqli = require __DIR__ . "/dbcon.php";

$username = $_SESSION['username'];
$title = $_POST['p-title'];
$descr = $_POST['p-desc'];
$src = $_POST['p-src'];

$sql = "insert into newsposts (username, title, descr, src) values ('$username', '$title', '$descr', '$src')";

if($mysqli->query($sql)===true) {
	header("location: ../pages/breaking-news.php");
}else {
	echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close;
?>