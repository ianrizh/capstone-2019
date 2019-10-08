<?php

	include 'includes/session.php';

	if(isset($_POST)){
		$a_insufficientstocks = array();
		$conn = $pdo->open();

		try{
			if(!empty($_POST['a_product']) && !empty($_POST['a_quantity'])) {
				$a_product	= $_POST['a_product'];
	    		$a_quantity	= $_POST['a_quantity'];

			    for($i=0; $i<count($a_product); $i++)
			    {
			    	$stmt = $conn->prepare("SELECT id_products,name,total_stocks FROM products WHERE id_products = :id");
					$stmt->execute(['id'=>$a_product[$i]]);
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
					if($a_quantity[$i] > $data['total_stocks'])
						array_push($a_insufficientstocks,$data['name'].' (remaining stock: '.$data['total_stocks'].')');
			    }
			}
			
			echo json_encode($a_insufficientstocks);
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