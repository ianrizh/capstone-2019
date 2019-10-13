<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id_products = $_POST['id_products'];
		$name = $_POST['name'];
		$id_category = $_POST['id_category'];
		$price = $_POST['price'];
		$filename = $_FILES['photo']['name'];
		
		$conn = $pdo->open();

		if(!empty($filename)){
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $name.'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
		}
		else{
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			$new_filename = $name.'_'.time().'.'.$ext;
			move_uploaded_file($_FILES['photo']['tmp_name'], ''.$new_filename);	
		}
		
		try{
			$stmt = $conn->prepare("UPDATE products SET name=:name, id_category=:id_category, price=:price,  photo=:photo WHERE id_products=:id_products");
			$stmt->execute(['name'=>$name, 'id_category'=>$id_category, 'price'=>$price, 'photo'=>$new_filename, 'id_products'=>$id_products]);
			$_SESSION['success'] = 'Product updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products.php');

?>