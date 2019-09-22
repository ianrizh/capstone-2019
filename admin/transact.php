<?php
	include 'includes/session.php';

	$order_id = $_POST['order_id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	
	$total = 0;
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
		
		
		$output['transaction'] = $row['order_id'];
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
	
		$output['total'] = '<b>&#8369; '.number_format($total, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>