<?php 
	include 'includes/session.php';

	if(isset($_POST['reservation_id'])){
		$reservation_id = $_POST['reservation_id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM online_reservation1 WHERE reservation_id=:reservation_id");
		$stmt->execute(['reservation_id'=>$reservation_id]);
		foreach($stmt as $row){
			$id_services = $row['id_services'];
			$stmt = $conn->prepare("SELECT * FROM services where id_services = '$id_services'");
			$stmt->execute();
			foreach($stmt as $qrow){
				$price = $qrow['price'];
				$name = $qrow['name'];
			}
		}
		$stmt->execute(['reservation_id'=>$reservation_id, 'price'=>$price]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>