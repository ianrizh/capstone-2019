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

// try{
// $stmt=$conn->prepare("select * from users where id_cust=:id_cust");
// $stmt->execute(['id_cust'=>$_SESSION['user']]);
// foreach($stmt as $row1){
// $id_cust = $row1['id_cust'];
// $stmt=$conn->prepare("select * from user_pets where id_cust = '$id_cust'");
// $stmt->execute();
// foreach($stmt as $row2){
// $user_pets_id = $row2['user_pets_id'];
// $stmt=$conn->prepare("select * from reservation where  user_pets_id = :user_pets_id and status !='Pending' and status!='Process Done' and status!='Paid' order by reservation_id desc");
// $stmt->execute(['user_pets_id'=>$user_pets_id]);
// foreach($stmt as $row3){
// echo "<div class='notification-item' style='color:white'>" .
// "<div class='notification-subject'><b>Your appointment on <b>" .date('M. d, Y', strtotime($row3['thedate'])). "</b>, at  <b>" .$row3['time_reservation']. "</b>. was ".$row3['status']."</div><hr>" . 
// "</div>";
// }
// }
// }
// }
// catch(PDOException $e){
// echo $e->getMessage();
// }
// echo "<b style='color:white; float:right'>NOTIFICATIONS</b>";

	$stmt = $conn->prepare("
		SELECT
			thedate, time_reservation, status
		FROM
			reservation
		WHERE
			user_pets_id IN (
				SELECT
					id_pet
				FROM
					pets
				WHERE
					id_cust = :id
			)
			AND status !='Pending'
			AND status!='Process Done'
			AND status!='Paid'
		ORDER BY
			reservation_id DESC
	");
	$stmt->execute(['id'=>$_SESSION['user']]);

	foreach($stmt as $row)
	{
		echo "
			<div class='notification-item' style='color:white'>
				<div class='notification-subject'>
					Your appointment on <b>" .date('M. d, Y', strtotime($row['thedate'])). "</b>, at  <b>" .$row['time_reservation']. "</b>. was <b>".$row['status']."</b>
				</div>
				<hr>
			</div>
		";
	}

	echo "<b style='color:white; float:right'>NOTIFICATIONS</b>";

?>
