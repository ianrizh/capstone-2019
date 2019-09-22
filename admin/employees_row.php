<?php 
	include 'includes/session.php';

	if(isset($_POST['id_emp'])){
		$id_emp = $_POST['id_emp'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM employee WHERE id_emp=:id_emp");
		$stmt->execute(['id_emp'=>$id_emp]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>