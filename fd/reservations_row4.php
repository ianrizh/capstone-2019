<?php 
	include 'includes/session.php';

	if(isset($_POST['reservation_id'])){
		$reservation_id = $_POST['reservation_id'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT * FROM online_reservation WHERE reservation_id=:reservation_id");
		$stmt->execute(['reservation_id'=>$reservation_id]);
		foreach($stmt as $row){
			$products_used = $row['products_used'];
			$stmt = $conn->prepare("SELECT * FROM products where id_products = '$products_used'");
			$stmt->execute();
			foreach($stmt as $qrow){
				$name = $qrow['name'];
			}
		}
		$stmt->execute(['reservation_id'=>$reservation_id, 'name'=>$name]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>