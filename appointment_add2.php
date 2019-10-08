<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$type_id			= 1; //Boarding
		$user_pets_id		= $_POST['user_pets_id'];
		$id_services		= $_POST['id_services'];
		$thedate			= $_POST['thedate'];
		$time_reservation	= $_POST['time_reservation'];
		//$status				= $_POST['status'];
		$theday				= date('l',strtotime($thedate));

		$stmt=$conn->prepare("select * from services where name = 'Boarding for Small Breed'");
		$stmt->execute();
		foreach($stmt as $row){
			$srvc = $row['id_services'];
		}

		$stmt=$conn->prepare("select * from services where name = 'Boarding for Medium Breed'");
		$stmt->execute();
		foreach($stmt as $row1){
			$srvc1 = $row1['id_services'];
		}

		$stmt=$conn->prepare("select * from services where name = 'Boarding for Large Breed'");
		$stmt->execute();
		foreach($stmt as $row2){
			$srvc2 = $row2['id_services'];
		}

		if($id_services == $srvc){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc' and status != 'Decline'");
		$stmt->execute();
		$row3 = $stmt->fetch();
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM reservation WHERE id_services='$srvc' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline' or user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'");
		$stmt->execute();
		$roww3 = $stmt->fetch();
		if($roww3['numrows1'] > 0)
		{
		$_SESSION['error'] = 'Cannot Book the Same Pet';
		}
		else if($row3['numrows'] >=3 ){
			$_SESSION['error'] = 'No Available Cage';
		}
		else{
		$stmt = $conn->prepare("INSERT INTO reservation (type_id, user_pets_id,id_services,thedate,time_reservation,status,r_type) VALUES (:type_id, :user_pets_id,:id_services,:thedate,:time_reservation,:status,:r_type)");
		$stmt->execute(['type_id'=>$type_id, 'user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'status'=>'Pending','r_type'=>'Online']);
		$_SESSION['success'] = 'Reservation successful';
		}
		}

		if($id_services == $srvc1){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc1' and status != 'Decline'");
		$stmt->execute();
		$row4 = $stmt->fetch();
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM reservation WHERE id_services='$srvc1' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline' or user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'");
		$stmt->execute();
		$roww4 = $stmt->fetch();
		if($roww4['numrows1'] > 0)
		{
		$_SESSION['error'] = 'Cannot Book the Same Pet';
		}
		else if($row4['numrows'] >=3 )
		{
			$_SESSION['error'] = 'No Available Cage';
		}
		else{
		$stmt = $conn->prepare("INSERT INTO reservation (type_id, user_pets_id, id_services, thedate, time_reservation,status,r_type) VALUES (:type_id, :user_pets_id,:id_services,:thedate,:time_reservation,:status,:r_type)");
		$stmt->execute(['type_id'=>$type_id, 'user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'status'=>'Pending','r_type'=>'Online']);
		$_SESSION['success'] = 'Reservation successful';
		}
		}

		if($id_services == $srvc2){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc2' and status != 'Decline'");
		$stmt->execute();
		$row5 = $stmt->fetch();
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM reservation WHERE id_services='$srvc2' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline' or user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'");
		$stmt->execute();
		$roww5 = $stmt->fetch();
		if($roww5['numrows1'] > 0)
		{
		$_SESSION['error'] = 'Cannot Book the Same Pet';
		}
		else if($row5['numrows'] >=3 ){
			$_SESSION['error'] = 'No Available Cage';
		}
		else{
		$stmt = $conn->prepare("INSERT INTO reservation (type_id, user_pets_id,id_services,thedate,time_reservation,status,r_type) VALUES (:type_id, :user_pets_id,:id_services,:thedate,:time_reservation,:status,:r_type)");
		$stmt->execute(['type_id'=>$type_id, 'user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'status'=>'Pending','r_type'=>'Online']);
		$_SESSION['success'] = 'Reservation successful';
		}
		}


		$pdo->close();
		header('location: appointment.php?service='.$id_services.'');
	}
?>