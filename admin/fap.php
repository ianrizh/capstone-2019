
<?php
include 'includes/session.php';

if(isset($_POST)){
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	// die();
	$reservation_id = $_POST['reservation_id'];
	$findings = $_POST['findings'];
	$prescription = $_POST['prescription'];
	$a_product	= $_POST['a_product'];
	$a_productid = $_POST['a_productid'];
	$a_quantity = $_POST['a_quantity'];
	$a_price	= $_POST['a_price'];
	$status = $_POST['status'];
	$s_price = $_POST['s_price'];

	$conn = $pdo->open();
	for($i=0; $i<count($a_product); $i++)
	{
		//print_r($i);
		//print_r(count($a_product));
		$product = $a_product[$i];
		$productid = $a_productid[$i];
		$qty = $a_quantity[$i];
		$price1 = $a_price[$i];
		$amount = $price1 * $qty;
		
		try{
			//$ptotal = $prod_price * $qty;
			//$total = $price1 * $qty;
			$total = $amount + $s_price;
			date_default_timezone_set('Asia/Manila');
			$process_done=date('Y-m-d');

			$stmt = $conn->prepare("UPDATE reservation SET total=:total, status=:status, process_done='$process_done' WHERE reservation_id=:reservation_id");
			$stmt->execute(['total'=>$total, 'status'=>'Process Done', 'reservation_id'=>$reservation_id]);
			
			$stmt=$conn->prepare("insert into findings_prescription (reservation_id, findings, prescription) values (:reservation_id, :findings, :prescription)");
			$stmt->execute(['reservation_id'=>$reservation_id, 'findings'=>$findings, 'prescription'=>$prescription]);
			$fp_id = $conn->lastInsertId();	
			
			$stmt=$conn->prepare("insert into products_used (fp_id, product, productid, price, qty, amount) values (:fp_id, :product, :productid, :price, :qty, :amount)");
			$stmt->execute(['fp_id'=>$fp_id, 'product'=>$product, 'productid'=>$productid, 'price'=>$price1, 'qty'=>$qty, 'amount'=>$amount]);

			$_SESSION['success'] = 'Successful';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
	}
$pdo->close();

//header('location: reservations.php');
}

?>