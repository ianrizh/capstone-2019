<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id_category = $_POST['id_category'];
		
		$conn = $pdo->open();

		try{
			date_default_timezone_set('Asia/Manila');
			$todays=date('Y-m-d');
			$stmt = $conn->prepare("UPDATE category set deleted_date = '$todays' WHERE id_category=:id_category");
			$stmt->execute(['id_category'=>$id_category]);

			$_SESSION['success'] = 'Category deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select category to delete first';
	}

	header('location: category.php');
	
?>