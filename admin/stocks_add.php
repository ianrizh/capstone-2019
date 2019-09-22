<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$id_products = $_POST['id_products'];
		$stocks = $_POST['stocks'];

		$conn = $pdo->open();
		
			if ($HTTP_POST_VARS['expired_date'] == "1"){ 
				$expired_date = 'No Expiration Date'; 
				echo " check box is". $ProDesc; 
			} else { 
				$ProDesc =0; 
				$expired_date = $_POST['expired_date'];
			} 
		
			try{
				$stmt = $conn->prepare("INSERT INTO stocks_expired (id_products, stocks, expired_date) VALUES (:id_products, :stocks, :expired_date)");
				$stmt->execute(['id_products'=>$id_products, 'stocks'=>$stocks, 'expired_date'=>$expired_date]);
				$_SESSION['success'] = 'Stocks added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up stock form first';
	}

	header('location: stocks.php');

?>