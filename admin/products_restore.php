<?php
	include 'includes/session.php';

	if(isset($_POST['restore'])){
		$id_products = $_POST['id_products'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE products set deleted_date = '0000-00-00' WHERE id_products=:id_products");
			$stmt->execute(['id_products'=>$id_products]);

			$_SESSION['success'] = 'Product restored successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select product to delete first';
	}

	header('location: deleted_product.php');
	
?>