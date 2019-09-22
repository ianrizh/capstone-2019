<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM position");
	$stmt->execute();

	foreach($stmt as $row){
		$output .= "
			<option value='".$row['id_position']."' class='append_items'>".$row['position']."</option>
		";
	}

	$pdo->close();
	echo json_encode($output);

?>