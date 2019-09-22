<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id_category = $_POST['id_category'];
		$category = $_POST['category'];
		$type = $_POST['type'];

		try{
			$stmt = $conn->prepare("UPDATE category SET category=:category, type=:type WHERE id_category=:id_category");
			$stmt->execute(['category'=>$category, 'type'=>$type, 'id_category'=>$id_category]);
			$_SESSION['success'] = 'Category updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit category form first';
	}

	header('location: category.php');

?>