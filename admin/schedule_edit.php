
<?php
include 'includes/session.php';

$conn = $pdo->open();

	if(isset($_POST['edit'])){
	 $doctor_id = $_POST['doctor_id'];
		
		try{
			$stmt = $conn->prepare("UPDATE doctor SET status=:status WHERE doctor_id=:doctor_id");
			$stmt->execute(['status'=>'Available', 'doctor_id'=>$doctor_id]);
			$_SESSION['success'] = 'Schedule updated successfully';	
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit schedule form first';
	}

	header('location: schedule.php');

?>