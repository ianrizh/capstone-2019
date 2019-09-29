<?php
	include 'includes/session.php';

	$reservation_id = $_POST['reservation_id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	
	$total = 0;
	$stmt = $conn->prepare("select * from reservation where reservation_id =:reservation_id");
	$stmt->execute(['reservation_id'=>$reservation_id]);
	foreach($stmt as $row){
		$reservation_id = $row['reservation_id'];
		$id_services = $row['id_services'];
		$pay_date = $row['pay_date'];
		$total = $row['total'];
	$stmt = $conn->prepare("select * from findings_prescription where reservation_id='$reservation_id'");
	$stmt->execute();
	foreach($stmt as $row2){
		$fp_id = $row2['fp_id'];
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows from products_used where fp_id='$fp_id'");
	$stmt->execute();
    $urow =  $stmt->fetch();
    if($urow['numrows'] == FALSE){
    	$counts = "None";
    }
    else{
    	$counts = $urow['numrows'];
    }
    $stmt = $conn->prepare("select * from products_used where fp_id='$fp_id'");
	$stmt->execute();
	foreach($stmt as $row3){
		$amount = $row3['amount'];
	$stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$id_services'");
	$stmt->execute();
	foreach($stmt as $row1){
		$name = $row1['name'];
		$price = $row1['price'];
		}
		if($id_services == '0'){
			$transaction_id = "VHC_0".$reservation_id;
			$name = "Veterinary Health Care";
			$price = "250.00";
		}
		elseif(strstr($name, "Boarding") !== FALSE){
			$transaction_id = "BRDNG_0".$reservation_id;
			$name;
			$price;
		}
		else {
			$transaction_id = "GRMMNG_0".$reservation_id;
			$name;
			$price;
		}
		$output['transaction'] = $transaction_id;
		$output['pay_date'] = date('M d, Y', strtotime($row['pay_date']));
		$subtotal = $price + $amount;
		
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$name."</td>
				<td>&#8369; ".number_format($price, 2)."</td>
				<td>".$counts."</td>
				<td>&#8369; ".number_format($amount, 2)."</td>
				<td>&#8369; ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
}
}
	$output['total'] = '<b>&#8369; '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>