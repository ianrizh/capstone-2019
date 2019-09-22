<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['fd']) || trim($_SESSION['fd']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust=:id_cust");
	$stmt->execute(['id_cust'=>$_SESSION['fd']]);
	$admin = $stmt->fetch();

	$pdo->close();

?>