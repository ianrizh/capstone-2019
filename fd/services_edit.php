<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id_services = $_POST['id_services'];
		$name = $_POST['name'];
		$id_category = $_POST['id_category'];
		$price = $_POST['price'];
		$details = $_POST['details'];
		$filename = $_FILES['photo']['name'];
		
		$conn = $pdo->open();

		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $row['slug'].'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], ''.$new_filename);	
		}
		else{
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $row['slug'].'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], ''.$new_filename);	
		}
		
		try{
			$stmt = $conn->prepare("UPDATE services SET name=:name, id_category=:id_category, price=:price, details=:details, photo=:photo WHERE id_services=:id_services");
			$stmt->execute(['name'=>$name, 'id_category'=>$id_category, 'price'=>$price, 'details'=>$details, 'photo'=>$new_filename, 'id_services'=>$id_services]);
			$_SESSION['success'] = 'Service updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit service form first';
	}

	header('location: services.php');

?>