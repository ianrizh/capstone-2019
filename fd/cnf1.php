<?php
	include 'includes/session.php';

	if(isset($_POST['edit1'])){
		$reservation_id = $_POST['reservation_id'];
		$status = $_POST['status'];

		try{
			$stmt = $conn->prepare("UPDATE online_reservation2 SET status=:status WHERE reservation_id=:reservation_id");
			$stmt->execute(['status'=>$status, 'reservation_id'=>$reservation_id]);
			$_SESSION['success'] = 'Status updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit status form first';
	}

	header('location: reservations.php');

?>