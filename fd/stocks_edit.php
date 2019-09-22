<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id_stocks_expired = $_POST['id_stocks_expired'];
		$expired_date = $_POST['expired_date'];
		$stocks = $_POST['stocks'];

		$conn = $pdo->open();

		try{ 
			$stmt = $conn->prepare("UPDATE stocks_expired SET stocks=:stocks+stocks, expired_date=:expired_date WHERE id_stocks_expired=:id_stocks_expired");
			$stmt->execute(['stocks'=>$stocks, 'expired_date'=>$expired_date, 'id_stocks_expired'=>$id_stocks_expired]);
			$_SESSION['success'] = 'Stock added successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up stock form first';
	}

	header('location: expired_products.php');

?>