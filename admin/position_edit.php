<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id_position = $_POST['id_position'];
		$position = $_POST['position'];

		try{
			$stmt = $conn->prepare("UPDATE position SET position=:position WHERE id_position=:id_position");
			$stmt->execute(['position'=>$position, 'id_position'=>$id_position]);
			$_SESSION['success'] = 'Position updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit position form first';
	}

	header('location: position.php');

?>