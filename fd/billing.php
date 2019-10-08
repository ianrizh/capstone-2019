
<?php
include 'includes/session.php';

if(isset($_POST)){

$reservation_id= $_POST['reservation_id'];
$total= $_POST['total'];
$amount_paid = $_POST['amount_paid'];
$_change = $amount_paid - $total;

$conn = $pdo->open();
try{
date_default_timezone_set('Asia/Manila');
$pay_date=date('Y-m-d');

$stmt = $conn->prepare("UPDATE reservation SET status='Paid', amount_paid=:amount_paid, _change=:_change, pay_date='$pay_date' WHERE reservation_id=:reservation_id");
$stmt->execute(['amount_paid'=>$amount_paid, '_change'=>$_change, 'reservation_id'=>$reservation_id]);

$stmt = $conn->prepare("SELECT productid,qty FROM products_used WHERE reservation_id = :reservation_id");
$stmt->execute(['reservation_id'=>$reservation_id]);
$a_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($a_products as $key => $idx)
{
	$productid = $idx['productid'];
	$qty = $idx['qty'];
	$stmt=$conn->prepare("UPDATE products SET total_stocks = total_stocks - :qty WHERE id_products = :productid");
	$stmt->execute(['qty'=>$qty, 'productid'=>$productid]);

	$stmt = $conn->prepare("
		SELECT
			id_stocks_expired,stocks
		FROM
			stocks_expired
		WHERE
			id_products = :productid
			AND stocks != 0
			AND expired_flag != 1
		ORDER BY
			batch_number
	");
	$stmt->execute([
		'productid'=>$productid
	]);

	$stockdata = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach($stockdata as $row => $col)
	{
		$stock = $col['stocks'];
		
		if($qty > $stock)
		{
			$qty = $qty - $stock;
			$stmt = $conn->prepare("UPDATE stocks_expired SET stocks = 0 WHERE id_stocks_expired = :id");
			$stmt->execute([
				'id'=>$stockdata[$row]['id_stocks_expired']
			]);
		}
		else
		{
			$stockdata[$row]['stocks'] -= $qty;
			$stmt = $conn->prepare("UPDATE stocks_expired SET stocks = :stock WHERE id_stocks_expired = :id");
			$stmt->execute([
				'stock'=>$stockdata[$row]['stocks'],
				'id'=>$stockdata[$row]['id_stocks_expired']
			]);
			break;
		}
	}
}

$_SESSION['success'] = 'Successful Transaction';
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}

$pdo->close();

//header('location: bill1.php?copy='.$reservation_id.'');
}

?>