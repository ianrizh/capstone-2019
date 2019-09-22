<?php 
	include 'includes/session.php';

	if(isset($_POST['reservation_id'])){
		$reservation_id = $_POST['reservation_id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM online_reservation WHERE reservation_id=:reservation_id");
		$stmt->execute(['reservation_id'=>$reservation_id]);
		foreach($stmt as $row){
			$id_services = $row['id_services'];
		}
		if($id_services == '0'){
			echo "Veterinary Health Care";
		}
		$stmt->execute(['reservation_id'=>$reservation_id]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>