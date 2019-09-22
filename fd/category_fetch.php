<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM category");
	$stmt->execute();

	foreach($stmt as $row){
		$output .= "
			<option value='".$row['id_category']."' class='append_items'>".$row['category']."</option>
		";
	}

	$pdo->close();
	echo json_encode($output);

?>