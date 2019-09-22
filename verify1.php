<?php
	include 'includes/session1.php';
	$conn = $pdo->open();

	if(!empty($_SESSION['admin']) || !empty($_SESSION['fd']))
	{
		$_SESSION['error'] = 'Another session is currently ongoing. You can\'t log in right now.';
		die();
		header('location: home.php');
	}
	else if(isset($_POST['login1'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				if($row['status']){
					if(password_verify($password, $row['password'])){
						if($row['type']=='1'){
							$_SESSION['admin'] = $row['id_cust'];
						}
						else if($row['type']=='2'){
							$_SESSION['fd'] = $row['id_cust'];
						}
					}
					else{
						$_SESSION['error'] = 'Incorrect password';
					}
				}
				else{
					$_SESSION['error'] = 'Account not activated.';
				}
			}
			else{
				$_SESSION['error'] = 'Email Address not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	header('location: login1.php');

?>