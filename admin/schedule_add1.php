<?php
include 'includes/session.php';

$conn = $pdo->open();

	if(isset($_POST['add'])){
		$time_id = $_POST['time_id'];
		$date = $_POST['date'];
		$status = $_POST['status'];
		$in_charge = 2;
		

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM doctor WHERE time_id=:time_id and date=:date and status = 'Not Available' and in_charge=:in_charge");
		$stmt->execute(['time_id'=>$time_id,'date'=>$date, 'in_charge'=>$in_charge]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Schedule already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO doctor (time_id, date, status, in_charge) VALUES (:time_id, :date, :status, :in_charge)");
				$stmt->execute(['time_id'=>$time_id, 'date'=>$date, 'status'=>'Not Available', 'in_charge'=>$in_charge]);
				$_SESSION['success'] = 'Schedule added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up schedule form first';
	}

	header('location: schedule.php');
?>