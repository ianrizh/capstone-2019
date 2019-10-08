
<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$product = $_POST['product'];
		$category = $_POST['category'];
		$price = $_POST['price'];	
		$stocks = $_POST['stocks'];
		$expired_date = $_POST['expired_date'];
		$batch_number = $_POST['batch_number'];
		$reason = $_POST['reason'];
		$qty = $_POST['qty'];

		$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("INSERT INTO inventory_adjustment (id_products, category, price, stocks, expired_date, batch_number, reason, qty) VALUES (:product, :category, :price, :stocks, :expired_date, :batch_number, :reason, :qty)");
				$stmt->execute(['product'=>$product, 'category'=>$category,'price'=>$price, 'stocks'=>$stocks, 'expired_date'=>$expired_date,'batch_number'=>$batch_number, 'reason'=>$reason, 'qty'=>$qty]);

				$stmt=$conn->prepare("UPDATE products SET total_stocks = total_stocks - :qty WHERE id_products = :product");
				$stmt->execute(['qty'=>$qty, 'product'=>$product]);
				
				$stmt = $conn->prepare("
					SELECT
						id_stocks_expired,stocks
					FROM
						stocks_expired
					WHERE
						id_products = :product
						AND stocks != 0
						AND expired_flag != 1
					ORDER BY
						batch_number
				");
				$stmt->execute([
					'product'=>$product
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

				$_SESSION['success'] = 'Inventory adjustment added successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up inventory adjustment form first';
	}

	header('location: adjustment.php');

?>