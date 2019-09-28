<?php
	include 'includes/session.php';

	if(isset($_POST['restore'])){
		$id_supplier = $_POST['id_supplier'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE suppliers set deleted_date = '0000-00-00' WHERE id_supplier=:id_supplier");
			$stmt->execute(['id_supplier'=>$id_supplier]);

			$_SESSION['success'] = 'Supplier restored successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select supplier to delete first';
	}

	header('location: deleted_supplier.php');
	
?>