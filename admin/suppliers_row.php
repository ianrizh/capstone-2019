<?php 
	include 'includes/session.php';

	if(isset($_POST['id_supplier'])){
		$id_supplier = $_POST['id_supplier'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM suppliers WHERE id_supplier=:id_supplier");
		$stmt->execute(['id_supplier'=>$id_supplier]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>