<?php 
	include 'includes/session.php';

	if(isset($_POST['id_stocks_expired'])){
		$id_stocks_expired = $_POST['id_stocks_expired'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, stocks_expired.id_stocks_expired AS id_stocks_expired FROM stocks_expired LEFT JOIN products ON products.id_products=stocks_expired.id_stocks_expired WHERE stocks_expired.id_stocks_expired=:id_stocks_expired");
		$stmt->execute(['id_stocks_expired'=>$id_stocks_expired]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>