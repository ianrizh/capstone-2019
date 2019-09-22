<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$id_category = $_POST['id_category'];
		$price = $_POST['price'];
		$details = $_POST['details'];
		$filename = $_FILES['photo']['name'];	

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM services WHERE name=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Service already exist';
		}
		else{
			if(!empty($filename)){
				move_uploaded_file($_FILES['photo']['tmp_name'], ''.$filename);
				$photo = $filename;	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO services (id_category, name, details, price, photo) VALUES (:id_category, :name, :details, :price, :photo)");
				$stmt->execute(['id_category'=>$id_category, 'name'=>$name, 'details'=>$details, 'price'=>$price, 'photo'=>$photo]);
				$_SESSION['success'] = 'Service added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up service form first';
	}

	header('location: services.php');

?>