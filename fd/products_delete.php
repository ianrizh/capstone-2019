<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id_products = $_POST['id_products'];
		
		$conn = $pdo->open();

		try{
			date_default_timezone_set('Asia/Manila');
			$todays=date('Y-m-d');
			$stmt = $conn->prepare("UPDATE products set deleted_date = '$todays' WHERE id_products=:id_products");
			$stmt->execute(['id_products'=>$id_products]);

			$_SESSION['success'] = 'Product deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select product to delete first';
	}

	header('location: products.php');
	
?>