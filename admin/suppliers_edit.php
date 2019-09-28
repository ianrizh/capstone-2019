<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id_supplier = $_POST['id_supplier'];
		$contact_person = $_POST['contact_person'];
		$contact_number = $_POST['contact_number'];
		$product = $_POST['product'];

		try{
			$stmt = $conn->prepare("UPDATE suppliers SET contact_person=:contact_person, contact_number=:contact_number, product=:product WHERE id_supplier=:id_supplier");
			$stmt->execute(['contact_person'=>$contact_person, 'contact_number'=>$contact_number, 'product'=>$product, 'id_supplier'=>$id_supplier]);
			$_SESSION['success'] = 'Supplier updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit supplier form first';
	}

	header('location: suppliers.php');

?>