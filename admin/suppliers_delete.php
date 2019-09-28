<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id_supplier = $_POST['id_supplier'];
		
		$conn = $pdo->open();

		try{
			date_default_timezone_set('Asia/Manila');
			$todays=date('Y-m-d');
			$stmt = $conn->prepare("UPDATE suppliers set deleted_date = '$todays' WHERE id_supplier=:id_supplier");
			$stmt->execute(['id_supplier'=>$id_supplier]);

			$_SESSION['success'] = 'Supplier deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select supplier to delete first';
	}

	header('location: suppliers.php');
	
?>