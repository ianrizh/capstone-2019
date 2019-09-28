
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$contact_person = $_POST['contact_person'];
		$contact_number = $_POST['contact_number'];
		$product = $_POST['product'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM suppliers WHERE contact_person=:contact_person and contact_number=:contact_number and product=:product");
		$stmt->execute(['contact_person'=>$contact_person,'contact_number'=>$contact_number, 'product'=>$product]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Supplier already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO suppliers (contact_person, contact_number, product) VALUES (:contact_person, :contact_number, :product)");
				$stmt->execute(['contact_person'=>$contact_person, 'contact_number'=>$contact_number, 'product'=>$product]);
				$_SESSION['success'] = 'Supplier added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up supplier form first';
	}

	header('location: suppliers.php');

?>