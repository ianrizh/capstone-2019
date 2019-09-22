<?php
	/*
	include 'includes/session.php';

	$stmt3 = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM stocks_expired where expired_date > CURRENT_DATE() and expired_date < (NOW() + INTERVAL 7 DAY)");
	$stmt3->execute();
	$response3='';
	while($row=$stmt3->fetch(PDO::FETCH_ASSOC)) {
		$timestamp = $row['expired_date'];
		$id_products = $row['id_products'];
		$stmt=$conn->prepare("select * from products where id_products = '$id_products'");
		$stmt->execute();
		foreach($stmt as $row1){
			$name = $row1['name'];
			$start_date = date('Y-m-d');
			$new_date = date_format(date_create($start_date), 'Y-m-d');
			$expires =  strtotime($timestamp);
			$date_diff=(strtotime($new_date) -$expires);
			$x=abs(floor($date_diff/(60*60*24)));
		$count = $x;
		$response3 = $response3 . "<div class='notification-item' style='color:white'>" .
		"<div class='notification-subject'><b>".$count."</b> day(s) left before the <b>". $name ."</b> expired.</div><hr>" . 
		"</div>";
	}
	if($count<=1) {
		print $response3;
	}
	else{
		"<div class='notification-item' style='color:white'>" .
		"<div class='notification-subject'><b>". $name. "</b>is already expired.</div><hr>" . 
		"</div>";
	}
	}
	echo "<a href='stocks.php' style='color:white; float:right'><b>EXPIRED PRODUCTS</b></a>";
	*/
?>

<?php
	include 'includes/session.php';

	$stmt = $conn->prepare("
		SELECT
      p.name,
      se.batch_number,
      se.expired_date
    
    FROM
      stocks_expired se
    
    LEFT JOIN products p
      ON se.id_products = p.id_products
    
    WHERE
      expired_date > CURRENT_DATE()
      AND expired_date < (NOW() + INTERVAL 7 DAY)

    ORDER BY
    	se.expired_date, se.id_products, se.batch_number
	");

	$stmt->execute();
?>
<?php foreach($stmt as $row): ?>
	<?php
		$date_today = strtotime(date('m/d/Y'));
		$date_expired = strtotime($row['expired_date']);
		$daysleft = ($date_expired - $date_today)/60/60/24;
	?>
	<div class='notification-item' style='color:white'>
		<div class='notification-subject'>
			<b><?= $daysleft ?></b> day(s) left before <b><?= $row['name'].' (Batch '.$row['batch_number'].')' ?></b> expires.
		</div>
		<hr> 
	</div>
<?php endforeach; ?>
<a href='stocks.php' style='color:white; float:right'><b>EXPIRED PRODUCTS</b></a>