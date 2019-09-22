<?php
	include 'includes/session.php';

	if(isset($_POST['restore'])){
		$id_category = $_POST['id_category'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE category set deleted_date = '0000-00-00' WHERE id_category=:id_category");
			$stmt->execute(['id_category'=>$id_category]);

			$_SESSION['success'] = 'Category restored successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select category to delete first';
	}

	header('location: deleted_category.php');
	
?>