
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$position = $_POST['position'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM position WHERE position=:position");
		$stmt->execute(['position'=>$position]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Position already exist';
		}
		else{
			try{
				$stmt = $conn->prepare("INSERT INTO position (position, status) VALUES (:position, :status)");
				$stmt->execute(['position'=>$position, 'status'=>'Available']);
				$_SESSION['success'] = 'Position added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up position form first';
	}

	header('location: position.php');

?>