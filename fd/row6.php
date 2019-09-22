<?php 
	include 'includes/session.php';

	if(isset($_POST['reservation_id'])){
		$reservation_id = $_POST['reservation_id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM online_reservation2 WHERE reservation_id=:reservation_id");
		$stmt->execute(['reservation_id'=>$reservation_id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>
 