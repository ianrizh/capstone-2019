<?php
	include 'includes/session.php';

	if(isset($_POST['restore'])){
		$id_services = $_POST['id_services'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE services set deleted_date = '0000-00-00' WHERE id_services=:id_services");
			$stmt->execute(['id_services'=>$id_services]);

			$_SESSION['success'] = 'Service restored successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select service to delete first';
	}

	header('location: deleted_services.php');
	
?>