<?php 
	include 'includes/session.php';

	if(isset($_POST['id_stocks_expired'])){
		$id_stocks_expired = $_POST['id_stocks_expired'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM stocks_expired WHERE id_stocks_expired=:id_stocks_expired");
		$stmt->execute(['id_stocks_expired'=>$id_stocks_expired]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>