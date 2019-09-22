<?php 
	include 'includes/session.php';

	if(isset($_POST['id_services'])){
		$id_services = $_POST['id_services'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, services.id_services AS id_services, services.name AS name, category.category AS category FROM services LEFT JOIN category ON category.id_category=services.id_category WHERE services.id_services=:id_services");
		$stmt->execute(['id_services'=>$id_services]);
		$row = $stmt->fetch();
		
		$pdo->close();

		echo json_encode($row);
	}
?>