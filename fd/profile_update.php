<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$home = $_POST['home'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$photo = $_FILES['photo']['name'];
		if(password_verify($curr_password, $admin['password'])){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $admin['photo'];
			}
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE employee SET firstname=:firstname, lastname=:lastname, home=:home, email=:email, contact=:contact, photo=:photo, password=:curr_password WHERE id_emp=:id_emp");
				$stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname, 'home'=>$home, 'email'=>$email, 'contact'=>$contact, 'photo'=>$filename, 'password'=>$curr_password, 'id_emp'=>$admin['id_emp']]);

				$_SESSION['success'] = 'Account updated successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>