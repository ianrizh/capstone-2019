<?php
	include 'includes/session.php';
	/*$stmt = $conn->prepare("SELECT online_reservation.reservation_id, user_pets.id_cust, user_pets.id_pet, online_reservation.thedate, online_reservation.time_reservation 
	FROM online_reservation 
	INNER JOIN user_pets on online_reservation.user_pets_id = user_pets.user_pets_id
	WHERE online_reservation.status = 'Not Confirm' 
	ORDER BY reservation_id desc");
	$stmt->execute();
	$response='';
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	$response = $response . "<div class='notification-item' style='color:white'>" .
	"<div class='notification-subject'><b>". $row['firstname']. " ". $row['lastname']. "</b> wants to have an appointment on <b>" .date('M. d, Y', strtotime($row['thedate'])). "</b>, at  <b>" .$row['time_reservation']. "</b>.</div><hr>" . 
	"</div>";
	}*/

	try{
		$stmt = $conn->prepare("SELECT * FROM reservation where id_services = '0' and status = 'Pending' order by reservation_id desc");
		$stmt->execute();

		foreach($stmt as $row){
			$reservation_id = $row['reservation_id'];
			$user_pets_id = $row['user_pets_id'];
			$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
			$stmt->execute();
			
			foreach($stmt as $rows){
				$id_cust = $rows['id_cust'];
				$id_pet = $rows['id_pet'];
				$stmt = $conn->prepare("SELECT * FROM users where id_cust = '$id_cust'");
				$stmt->execute();
				
				foreach($stmt as $rowss){
					$firstname = $rowss['firstname'];
					$lastname = $rowss['lastname'];
					echo "<div class='notification-item' style='color:white'>" .
					"<div class='notification-subject'><b>". $firstname. " ". $lastname. "</b> wants to have an appointment on <b>" .date('M. d, Y', strtotime($row['thedate'])). "</b>, at  <b>" .$row['time_reservation']. "</b>.</div><hr>" . 
					"</div>";
				}
			}
		}
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}
	echo "<a href='reservations.php' style='color:white; float:right'><b>RESERVATIONS</b></a>";
?>
