<?php 
	include 'includes/session.php';

	if(isset($_POST['id_category'])){
		$id_category = $_POST['id_category'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM category WHERE id_category=:id_category");
		$stmt->execute(['id_category'=>$id_category]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>