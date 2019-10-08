<?php
	include 'includes/session.php';
	date_default_timezone_set('Asia/Manila');

	if(isset($_POST)){
		$reservation_id	= $_POST['reservation_id'];
		$findings 		= $_POST['findings'];
		$prescription 	= $_POST['prescription'];
		$a_product 		= $_POST['a_product'];
		$a_productid 	= $_POST['a_productid'];
		$a_quantity 	= $_POST['a_quantity'];
		$a_price 		= $_POST['a_price'];
		$s_price 		= '250.00';
		$date_processed	= date('Y-m-d');
		$total = 0;
		
		$conn = $pdo->open();

		try
		{
			if(!empty($a_product)) {
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

			$stmt = $conn->prepare("UPDATE reservation SET total=:total, status='Process Done', s_price = '250.00', process_done='$date_processed' WHERE reservation_id=:reservation_id");
			$stmt->execute(['total'=>$total, 'reservation_id'=>$reservation_id]);

			$stmt=$conn->prepare("INSERT INTO findings_prescription (reservation_id, findings, prescription) VALUES (:reservation_id, :findings, :prescription)");
			$stmt->execute(['reservation_id'=>$reservation_id, 'findings'=>$findings, 'prescription'=>$prescription]);
			$fp_id = $conn->lastInsertId();	

			$_SESSION['success'] = 'Successful';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
	$pdo->close();

	//header('location: reservations.php');
	}

?>