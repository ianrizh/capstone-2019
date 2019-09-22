<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("SELECT * FROM pets WHERE id_cust=:id_cust");
			$stmt->execute(['id_cust'=>$user['id_cust']]);
			foreach($stmt as $row){
				$output['count']++;
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$output['list'] .= "
					<li>
						<a href='pet_profile.php?pet_name=".$row['pet_name']."'>
							<div class='pull-left'>
								<img src='".$image."' class='thumbnail' alt='User Image'>
							</div>
							<h4>
		                        <b>".$row['pet_name']."</b>
		                        <small>".$row['pet_type']."</small>
		                    </h4>
						</a>
					</li>
				";
			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['pet'])){
			$_SESSION['pet'] = array();
		}

		if(empty($_SESSION['pet'])){
			$output['count'] = 0;
		}
		else{
			foreach($_SESSION['pet'] as $row){
				$output['count']++;
				$stmt = $conn->prepare("SELECT *, services.name AS sername, category.name AS catname FROM reservations LEFT JOIN services ON services.id=reservations.name LEFT JOIN category ON category.id=services.service_id WHERE services.id=:id");
				$stmt->execute(['id'=>$row['serviceid']]);
				$service = $stmt->fetch();
				$image = (!empty($service['photo'])) ? 'images/'.$service['photo'] : 'images/noimage.jpg';
				$output['list'] .= "
					<li>
						<a href='service.php?service=".$service['sername']."'>
							<div class='pull-left'>
								<img src='".$image."' class='img-circle' alt='User Image'>
							</div>
							<h4>
		                        <b>".$service['sername']."</b>
		                        <small>&times; ".$row['quantity']."</small>
		                    </h4>
		                    <p>".$service['catname']."</p>
						</a>
					</li>
				";
				
			}
		}
	}

	$pdo->close();
	echo json_encode($output);

?>

