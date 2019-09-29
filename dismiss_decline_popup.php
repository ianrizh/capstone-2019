<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	try{
		$update = $conn->prepare("
			UPDATE
				reservation
			SET
				flag_seen=1
			WHERE
				flag_seen = 0
				AND decline_remarks IS NOT NULL
				AND user_pets_id IN (
					SELECT
						user_pets_id
					FROM
						user_pets
					WHERE
						id_cust=:id
				)
		");
		$update->execute(['id'=>$_SESSION['user']]);
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	$pdo->close();
?>