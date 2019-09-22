
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$category = $_POST['category'];
		$type = $_POST['type'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM category WHERE category=:category");
		$stmt->execute(['category'=>$category]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Category already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO category (category, type) VALUES (:category, :type)");
				$stmt->execute(['category'=>$category, 'type'=>$type]);
				$_SESSION['success'] = 'Category added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up category form first';
	}

	header('location: category.php');

?>