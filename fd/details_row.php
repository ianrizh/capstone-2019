<?php 
	include 'includes/session.php';

	if(isset($_POST['id_cust'])){
		$id_cust = $_POST['id_cust'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM pets WHERE id_cust=:id_cust");
		$stmt->execute(['id_cust'=>$id_cust]);
		$row = $stmt->fetch();
		$pdo->close();

		echo json_encode($row);
	}
?>