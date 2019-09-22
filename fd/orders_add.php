<?php

	include 'includes/session.php';

	if(isset($_POST)){
		$a_product	= $_POST['a_product'];
	    $a_quantity = $_POST['a_quantity'];
	    $a_price	= $_POST['a_price'];
	    $a_amount	= $_POST['a_amount'];
	    $total		= $_POST['total'];
	    $cash		= $_POST['cash'];
	    $change		= $_POST['change'];

		$conn = $pdo->open();

		try{ 
			$stmt = $conn->prepare("
				INSERT INTO
					order_main
				VALUES (
					NULL,
					:total,
					:cash,
					CURRENT_DATE()
				)
			");
			$stmt->execute([
				'total'=>$total,
				'cash'=>$cash
			]);

			for($i=0; $i<count($a_product); $i++)
			{
				//print_r($i);
				//print_r(count($a_product));
				$productid = $a_product[$i];
				$quantity = $a_quantity[$i];
				$price = $a_price[$i];
				$amount = $a_amount[$i];
				date_default_timezone_set('Asia/Manila');
				$sales_date=date('Y-m-d');
				//print_r($productid.' '.$quantity.' '.$price.' '.$amount);
				//$stmt = $conn->prepare("select * from stocks_expired where id_products =:productid order by date_added limit 1");
				$stmt = $conn->prepare("
					INSERT INTO
						order_detail
					VALUES (
						NULL,
						(SELECT MAX(order_id) FROM order_main),
						:productid,
						:quantity,
						:price
					)
				");
				$stmt->execute([
					'productid'=>$productid,
					'quantity'=>$quantity,
					'price'=>$price
				]);
				
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
					
					if($quantity > $stock)
					{
						$quantity = $quantity - $stock;
						$stmt = $conn->prepare("UPDATE stocks_expired SET stocks = 0 WHERE id_stocks_expired = :id");
						$stmt->execute([
							'id'=>$stockdata[$row]['id_stocks_expired']
						]);
					}
					else
					{
						$stockdata[$row]['stocks'] -= $quantity;
						$stmt = $conn->prepare("UPDATE stocks_expired SET stocks = :stock WHERE id_stocks_expired = :id");
						$stmt->execute([
							'stock'=>$stockdata[$row]['stocks'],
							'id'=>$stockdata[$row]['id_stocks_expired']
						]);
						break;
					}
				}
			}

		 	$_SESSION['success'] = 'Transaction complete.';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up order form first';
	}

	//header('location: orders.php');

?>