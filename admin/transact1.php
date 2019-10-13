<?php
	include 'includes/session.php';

	$reservation_id = $_POST['reservation_id'];
	$total = 0;
	
	$conn = $pdo->open();
	
	$stmt = $conn->prepare("
		SELECT
            r.reservation_id,
            r.type_id,
            rt.type as service_type,
            r.id_services,
            r.r_type,
            r.s_price,
            r.total,
            r.pay_date,
            IF(r.id_services=0,'Veterinary Health Care',s.name) AS service_name
        FROM
            reservation r
        LEFT JOIN services s
            ON r.id_services = s.id_services
        LEFT JOIN reservation_type rt
        	ON r.type_id = rt.id
        WHERE
        	reservation_id = :reservation_id
	");
	$stmt->execute(['reservation_id'=>$reservation_id]);
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($data as $key => $row) {
		if($row['type_id'] == 1) //Boarding
			$output['transaction_id'] = 'BRDNG_' . str_pad($reservation_id, 3, '0', STR_PAD_LEFT);
		else if($row['type_id'] == 2) //Check-up
			$output['transaction_id'] = 'VHC_' . str_pad($reservation_id, 3, '0', STR_PAD_LEFT);
		else if($row['type_id'] == 3) //Grooming
			$output['transaction_id'] = 'GRMMNG_' . str_pad($reservation_id, 3, '0', STR_PAD_LEFT);

		$output['pay_date'] = $row['pay_date'];
		$output['service_name'] = $row['service_name'];
		$output['service_type'] = $row['service_type'];
		$output['service_price'] = $row['s_price'];
		$output['total'] = $row['total'];
	}

	$stmt = $conn->prepare("SELECT * FROM products_used WHERE reservation_id = :reservation_id");
	$stmt->execute(['reservation_id'=>$reservation_id]);

	$output['product_list']  = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$pdo->close();
	echo json_encode($output);

?>