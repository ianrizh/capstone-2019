<?php 
	include 'includes/session.php';

	if(isset($_POST['id_products'])){
		$id_products = $_POST['id_products'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, products.id_products AS id_products, products.name AS name, category.category AS category FROM products LEFT JOIN category ON category.id_category=products.id_category WHERE products.id_products=:id_products");
		$stmt->execute(['id_products'=>$id_products]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>