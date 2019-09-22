<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id_services = $_POST['id_services'];
		
		$conn = $pdo->open();

		try{
			date_default_timezone_set('Asia/Manila');
			$todays=date('Y-m-d');
			$stmt = $conn->prepare("UPDATE services set deleted_date = '$todays' WHERE id_services=:id_services");
			$stmt->execute(['id_services'=>$id_services]);

			$_SESSION['success'] = 'Service deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select service to delete first';
	}

	header('location: services.php');
	
?>