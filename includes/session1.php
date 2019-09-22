<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}
	
	if(isset($_SESSION['fd'])){
		header('location: fd/home.php');
	}
		$pdo->close();
?>