<?php include '../includes/session.php'; ?>
<?php
	if(!empty($_POST))
	{
		$conn = $pdo->open();

		$id_products = $_POST['id_products'];

		try{
			$stmt = $conn->prepare("
				SELECT
					batch_number,
					stocks,
					expired_date
				
				FROM
					stocks_expired
				
				WHERE
					id_products = :id_products
					AND stocks != 0
					AND expired_date > CURRENT_DATE()
					AND expired_flag != 1 
			UNION ALL

				SELECT
					batch_number,
					stocks,
					expired_date
				
				FROM
					stocks_expired
				
				WHERE
					id_products = :id_products
					AND stocks != 0
					AND expired_date = '0000-00-00' order by batch_number asc
			");
			
			$stmt->execute([
				'id_products' => $id_products,
				'id_products' => $id_products
			]);
?>
<?php foreach($stmt as $row): ?>
	<tr>
		<td><?= $row['batch_number'] ?></td>
		<td><?= $row['stocks'] ?></td>
		<td><?= $row['expired_date'] == '0000-00-00' ? 'No Expiration Date' : date('M. d, Y', strtotime($row['expired_date'])) ?></td>
	</tr>
<?php endforeach; ?>
<?php
		}

		catch(PDOException $e){
			echo $e->getMessage();
		}

		$pdo->close();
	}
?>