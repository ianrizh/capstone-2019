<?php 
	include 'includes/session.php';

	if(isset($_POST['doctor_id'])){
		$doctor_id = $_POST['doctor_id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM doctor WHERE doctor_id=:doctor_id");
		$stmt->execute(['doctor_id'=>$doctor_id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>