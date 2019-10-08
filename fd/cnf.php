<?php
	include 'includes/session.php';
	date_default_timezone_set('Asia/Manila');

	if(isset($_POST)){
		$reservation_id = $_POST['reservation_id'];
		$status 		= $_POST['status'];
		$s_price		= $_POST['s_price'];
		$process_done	= date('Y-m-d');
		$total = 0;
		
		$conn = $pdo->open();

		// try {
			if(!empty($_POST['a_product'])) {
				$a_product 		= $_POST['a_product'];
				$a_productid 	= $_POST['a_productid'];
				$a_quantity 	= $_POST['a_quantity'];
				$a_price 		= $_POST['a_price'];

				for($i=0; $i<count($a_price); $i++) {
					$total += ($a_price[$i] * $a_quantity[$i]);
				}

				for($i=0; $i<count($a_product); $i++) {
					$product = $a_product[$i];
					$productid = $a_productid[$i];
					$qty = $a_quantity[$i];
					$price = $a_price[$i];
					$amount = $price * $qty;

					$stmt=$conn->prepare("insert into products_used (reservation_id, product, productid, price, qty, amount) values (:reservation_id, :product, :productid, :price, :qty, :amount)");
					$stmt->execute(['reservation_id'=>$reservation_id, 'product'=>$product, 'productid'=>$productid, 'price'=>$price, 'qty'=>$qty, 'amount'=>$amount]);
				}
			}
				$total += $s_price;

			if($status == 'On Process'){
				$stmt = $conn->prepare("UPDATE reservation SET status=:status WHERE reservation_id=:reservation_id");
				$stmt->execute(['status'=>$status, 'reservation_id'=>$reservation_id]);
			}
			else{
				$stmt = $conn->prepare("UPDATE reservation SET status=:status, total=:total, s_price=:s_price, process_done='$process_done' WHERE reservation_id=:reservation_id");
				$stmt->execute(['status'=>$status, 'total'=>$total, 's_price'=>$s_price, 'reservation_id'=>$reservation_id]);
			}

			$_SESSION['success'] = 'Status updated successfully';
		// }
		// catch(PDOException $e) {
		// 	$_SESSION['error'] = $e->getMessage();
		// }

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit status form first';
	}

	header('location: reservations.php');
?>