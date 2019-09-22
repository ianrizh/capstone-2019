<?php 
	include 'includes/session.php';

	if(isset($_POST['id_position'])){
		$id_position = $_POST['id_position'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM position WHERE id_position=:id_position");
		$stmt->execute(['id_position'=>$id_position]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>