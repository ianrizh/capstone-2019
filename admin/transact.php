<?php
	include 'includes/session.php';

	$order_id = $_POST['order_id'];
	$order_type = $_POST['order_type'];

	$conn = $pdo->open();
	$total = 0;
	$output = array('list'=>'');
	if($order_type == 1) {
		$stmt = $conn->prepare("select * from order_main where order_id =:order_id");
		$stmt->execute(['order_id'=>$order_id]);
		foreach($stmt as $row){
			$order_id = $row['order_id'];
			$order_date = $row['order_date'];
			$total = $row['total'];
		$stmt = $conn->prepare("select * from order_detail where order_id = '$order_id'");
		$stmt->execute();
		foreach($stmt as $row1){
			$product_id = $row1['product_id'];
			$quantity = $row1['quantity'];
			$price = $row1['price'];
		$stmt = $conn->prepare("select * from products where id_products = '$product_id'");
		$stmt->execute();
		foreach($stmt as $row2){
			$name = $row2['name'];
			$pprice = $row2['price'];
			
			
			$output['transaction'] = 'ORDER_' . str_pad($row['order_id'], 3, '0', STR_PAD_LEFT);
			$output['date'] = date('M d, Y', strtotime($row['order_date']));
			$subtotal = $price*$quantity;
			
			$output['list'] .= "
				<tr class='prepend_items'>
					<td>".$name."</td>
					<td>&#8369; ".number_format($pprice, 2)."</td>
					<td>".$quantity."</td>
					<td>&#8369; ".number_format($subtotal, 2)."</td>
				</tr>
			";
		}
		}
		}
	}
	else if($order_type == 2) {
		$stmt = $conn->prepare("SELECT reservation_id,type_id,thedate,total FROM reservation WHERE reservation_id=:id");
		$stmt->execute(['id'=>$order_id]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if($row['type_id'] == 1) //Boarding
			$output['transaction'] = 'BRDNG_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);
		else if($row['type_id'] == 2) //Check-up
			$output['transaction'] = 'VHC_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);
		else if($row['type_id'] == 3) //Grooming
			$output['transaction'] = 'GRMMNG_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);

		$output['date'] = $row['thedate'];

		$stmt = $conn->prepare("SELECT * FROM products_used WHERE reservation_id=:id");
		$stmt->execute(['id'=>$order_id]);

		foreach($stmt as $row) {
			$output['list'] .= "
				<tr class='prepend_items'>
					<td>".$row['product']."</td>
					<td>&#8369; ".number_format($row['price'], 2)."</td>
					<td>".$row['qty']."</td>
					<td>&#8369; ".number_format($row['amount'], 2)."</td>
				</tr>
			";

			$total += $row['amount'];
		}
	}
	
	$output['total'] = '<b>&#8369; '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>