<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$type_id			= 3; //Grooming
		$user_pets_id		= $_POST['user_pets_id'];
		$id_services		= $_POST['id_services'];
		$thedate			= $_POST['thedate'];
		$time_reservation	= $_POST['time_reservation'];
		$status				= $_POST['status'];
		$theday				= date('l',strtotime($thedate));
		
		$time = explode(' - ', $time_reservation);
		$starttime 	= date("G:i", strtotime($time[0]));
		$endtime 	= date("G:i", strtotime($time[1]));

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows  FROM reservation WHERE user_pets_id = :user_pets_id and id_services = :id_services and thedate=:thedate and  end_time > :starttime and start_time < :endtime OR user_pets_id = :user_pets_id  and thedate=:thedate and  end_time > :starttime and start_time < :endtime ");
		$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'starttime'=>$starttime,'endtime'=>$endtime]);
		$row = $stmt->fetch();

		$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows2  FROM reservation WHERE user_pets_id = :user_pets_id  and thedate=:thedate and  end_time > :starttime and start_time < :endtime or user_pets_id = :user_pets_id  and thedate=:thedate");
		$stmt->execute(['user_pets_id'=>$user_pets_id,'thedate'=>$thedate,'starttime'=>$starttime,'endtime'=>$endtime]);
		$row2 = $stmt->fetch();

		$stmt=$conn->prepare("select * from doctor where date =:thedate  and status = 'Not Available'");
		$stmt->execute(['thedate'=>$thedate]);
		$row3=$stmt->fetch();

		$s=$row3['in_charge'];
		if($row['numrows'] >= 2) {
			$_SESSION['error'] = 'The chosen date and time is already taken by other customer.';
		}
		else if($row2['numrows2'] > 0) {
			$_SESSION['error'] = 'Cannot process the same pet.';	
		}
		else {
			try {
				$stmt = $conn->prepare("INSERT INTO reservation (type_id,user_pets_id,id_services,thedate,time_reservation,status,start_time,end_time,r_type) VALUES (:type_id,:user_pets_id,:id_services,:thedate,:time_reservation,:status,:starttime,:endtime,:r_type)");
				$stmt->execute(['type_id'=>$type_id,'user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'status'=>'Pending','starttime'=>$starttime,'endtime'=>$endtime,'r_type'=>'Online']);
				$_SESSION['success'] = 'Reservation successful';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
		header('location: appointment.php?service='.$id_services.'');
	}
?>