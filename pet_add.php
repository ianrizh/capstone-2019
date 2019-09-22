
<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		$id_cust = $_POST['id_cust'];
		$pet_name = $_POST['pet_name'];
		$pet_type = $_POST['pet_type'];
		$pet_breed = $_POST['pet_breed'];
		$pet_gender = $_POST['pet_gender'];

		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO pets (id_cust, pet_name, pet_type, pet_breed, pet_gender) VALUES (:id_cust, :pet_name, :pet_type, :pet_breed, :pet_gender)");
				$stmt->execute(['id_cust'=>$id_cust, 'pet_name'=>$pet_name, 'pet_type'=>$pet_type, 'pet_breed'=>$pet_breed, 'pet_gender'=>$pet_gender]);
				$id_pet = $conn->lastInsertId();
				$stmt = $conn->prepare("insert into user_pets (id_cust, id_pet) values (:id_cust, :id_pet)");
				$stmt->execute(['id_cust'=>$id_cust, 'id_pet'=>$id_pet]);
				$_SESSION['success'] = 'Pet added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up pet form first';
	}
	
	header('location: index.php');

?>