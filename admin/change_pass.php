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
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		if(password_verify($curr_password, $admin['password'])){

			if($password == $admin['password']){
				$password = $admin['password'];
			}
			if($password != $repassword){
				$_SESSION['error'] = 'Passwords did not match';
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
				$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE users SET password=:password WHERE id_cust=:id_cust");
				$stmt->execute(['password'=>$password, 'id_cust'=>$admin['id_cust']]);

				$_SESSION['success'] = 'Password updated successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			}
			
		}
		else{
			$_SESSION['error'] = 'Incorrect current password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>