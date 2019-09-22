<?php
	include 'includes/session.php';

	
		$a_product = $_POST['a_product'];
		$a_quantity= $_POST['a_quantity'];
		$expired_date = $_POST['expired_date'];
		$date_added = date('Y-m-d');

		$conn = $pdo->open();

		try{
			for($i=0; $i<count($a_product); $i++)
			{
				$stmt=$conn->prepare("UPDATE products SET total_stocks = total_stocks + :quantity WHERE id_products=:id_products");
				$stmt->execute(['quantity'=>$a_quantity[$i],'id_products'=>$a_product[$i]]);

				$stmt = $conn->prepare("SELECT COUNT(*)+1 AS batch_number FROM stocks_expired WHERE id_products = :id_products");
				$stmt->execute(['id_products' => $a_product[$i]]);

				foreach($stmt as $row)
				{
					$batch_number = $row['batch_number'];
				
					$stmt = $conn->prepare("
						INSERT INTO 
							stocks_expired (
								id_products,
								batch_number,
								expired_date,
								stocks,
								date_added
							)

						VALUES (
							:id_products,
							:batch_number,
							:expired_date,
							:stocks,
							:date_added
						)
					");
				
					$stmt->execute([
						'id_products' => $a_product[$i],
						'batch_number' => $batch_number,
						'expired_date' => $expired_date,
						'stocks' => $a_quantity[$i],
						'date_added' => $date_added
					]);
				}
			}
			
			//$_SESSION['success'] = 'Product(s) added successfully';
			echo json_encode('Product(s) added successfully');

		}
		catch(PDOException $e){
			echo json_encode($e->getMessage());
		}

		$pdo->close();

	//header('location: expired_products.php');

?>