		
<?php
	include 'includes/session.php';

	if(isset($_POST['next'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE contact=:contact");
			$stmt->execute(['contact'=>$contact]);
			$row1 = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email Address already taken';
			header('location: orders.php');
		}
		elseif($row1['numrows'] > 0){
				$_SESSION['error'] = 'Contact number already taken';
				header('location: orders.php');
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, contact, email) VALUES (:firstname, :lastname, :contact, :email)");
				$stmt->execute(['firstname'=>$firstname, 'lastname'=>$lastname, 'contact'=>$contact, 'email'=>$email]);
				$_SESSION['success'] = 'New customer registered successfully';
				$id_cust = $conn->lastInsertId();
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up form first';
		header('location: orders.php');
	}

	

				header('location: next.php?id_cust='.$id_cust.'');
?>