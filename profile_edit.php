<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	if(isset($_POST['edit'])){
		$curr_password = $_POST['curr_password'];
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contact = $_POST['contact'];
		$home = $_POST['home'];
		$photo = $_FILES['photo']['name'];
		if(password_verify($curr_password, $user['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			try{
				$stmt = $conn->prepare("UPDATE users SET email=:email, firstname=:firstname, lastname=:lastname, contact=:contact, home=:home, photo=:photo WHERE id_cust=:id_cust");
				$stmt->execute(['email'=>$email, 'firstname'=>$firstname, 'lastname'=>$lastname, 'contact'=>$contact, 'home'=>$home, 'photo'=>$filename, 'id_cust'=>$user['id_cust']]);

				$_SESSION['success'] = 'Account updated successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	$pdo->close();

	header('location: profile.php');

?>