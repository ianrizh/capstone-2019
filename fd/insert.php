<?php  

//insert.php

include('includes/session.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

date_default_timezone_set('Asia/Manila');
$thedate=date('Y-m-d');

$data = array(
	':id_cust'  => $form_data->id_cust,
 ':user_pets_id'  => $form_data->user_pets_id,
   ':type_id'  => $form_data->type_id,
  ':id_services'  => $form_data->id_services,
 ':thedate'  => $form_data->thedate,
 ':time_reservation'  => $form_data->time_reservation
);
$id_cust  = $form_data->id_cust;
$user_pets_id  = $form_data->user_pets_id;
$type_id = $form_data->type_id;
$id_services  = $form_data->id_services;
$thedate  = $form_data->thedate;
$time_reservation  = $form_data->time_reservation;
$time = explode(' - ', $time_reservation);
$starttime 	= date("G:i", strtotime($time[0]));
$endtime 	= date("G:i", strtotime($time[1]));
			if($type_id == 1){

					$stmt=$conn->prepare("select * from services where name = 'Boarding for Small Breed'");
					$stmt->execute();
					foreach($stmt as $row){
						$srvc = $row['id_services'];
					}

					$stmt=$conn->prepare("select * from services where name = 'Boarding for Medium Breed'");
					$stmt->execute();
					foreach($stmt as $row1){
						$srvc1 = $row1['id_services'];
					}

					$stmt=$conn->prepare("select * from services where name = 'Boarding for Large Breed'");
					$stmt->execute();
					foreach($stmt as $row2){
						$srvc2 = $row2['id_services'];
					}
					if($id_services == $srvc){
							$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc' and thedate = '$thedate' and status != 'Decline'");
							$stmt->execute();
							$row3 = $stmt->fetch();
							$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM reservation WHERE id_cust = '$id_cust' and id_services='$srvc' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'  and start_time <= '$starttime' and end_time >= '$starttime'  or id_cust = '$id_cust' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'  and start_time <= '$starttime' and end_time >= '$starttime' or id_cust = '$id_cust' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline' and start_time <= '$starttime' and end_time <= '$starttime' ");
							$stmt->execute();
							$roww3 = $stmt->fetch();
							if($roww3['numrows1'] > 0)
							{
								if($roww3['id_services'] == 0){
								$service="Veterinary Health Care";
								}
								else{
									$ser=$roww3['id_services'];
									$stmt=$conn->prepare("SELECT * FROM services
										WHERE id_services = '$ser'");
									$stmt->execute();
									$rowww3=$stmt->fetch();
									$service = $rowww3['name'];
								}
							$_SESSION['error'] = 'This pet already has an appointment during this time <strong>('.$service.' '.$roww3['time_reservation'].')</strong>';
							}
							else if($row3['numrows'] >=3 ){
								$_SESSION['error'] = 'No Available Cage';
							}
							else{
								$query = "
									 INSERT INTO reservation 
									 (user_pets_id, id_cust, type_id, id_services, thedate, time_reservation, start_time, r_type, status) VALUES 
									 (:user_pets_id, :id_cust, :type_id, :id_services, :thedate, :time_reservation, '$starttime', 'Walkin', 'Pending')";

									$statement = $conn->prepare($query);

											if($statement->execute($data))
											{
											$_SESSION['success'] = 'Data Inserted';
											}

									$output = array(
									 'message' => $_SESSION['success']
									);

									echo json_encode($output);
							}
						}
					if($id_services == $srvc1){
									$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc1' and thedate = '$thedate' and status != 'Decline'");
									$stmt->execute();
									$row4 = $stmt->fetch();
									$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM reservation WHERE id_services='$srvc1' and id_cust = '$id_cust' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'  and start_time <= '$starttime' and end_time >= '$starttime'  or user_pets_id = '$user_pets_id' and id_cust = '$id_cust' and thedate = '$thedate' and status != 'Decline'  and start_time <= '$starttime' and end_time >= '$starttime' or user_pets_id = '$user_pets_id' and id_cust = '$id_cust' and thedate = '$thedate' and status != 'Decline' and start_time <= '$starttime' and end_time <= '$starttime' ");
									$stmt->execute();
									$roww4 = $stmt->fetch();
									if($roww4['numrows1'] > 0)
									{		if($roww4['id_services'] == 0){
												$service="Veterinary Health Care";
											}
											else{
												$ser=$roww4['id_services'];
												$stmt=$conn->prepare("SELECT * FROM services
													WHERE id_services = '$ser'");
												$stmt->execute();
												$rowww4=$stmt->fetch();
												$service = $rowww4['name'];
											}
									$_SESSION['error'] = 'This pet already has an appointment during this time <strong>('.$service.' '.$roww4['time_reservation'].')</strong>';
									
									}
									else if($row4['numrows'] >=3 )
									{
										$_SESSION['error'] = 'No Available Cage';
									}
							else{
								$query = "
									 INSERT INTO reservation 
									 (user_pets_id, id_cust, type_id, id_services, thedate, time_reservation, start_time, r_type, status) VALUES 
									 (:user_pets_id, :id_cust, :type_id, :id_services, :thedate, :time_reservation,'$starttime', 'Walkin', 'Pending')";

									$statement = $conn->prepare($query);

											if($statement->execute($data))
											{
											$_SESSION['success'] = 'Data Inserted';
											}

									$output = array(
									 'message' => $_SESSION['success']
									);

									echo json_encode($output);
							}
						}
					if($id_services == $srvc2){
								$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc2' and thedate = '$thedate' and status != 'Decline'");
								$stmt->execute();
								$row5 = $stmt->fetch();
								$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM reservation WHERE id_cust = '$id_cust' and id_services='$srvc2' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'  and start_time <= '$starttime' and end_time >= '$starttime'  or id_cust = '$id_cust' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline'  and start_time <= '$starttime' and end_time >= '$starttime' or id_cust = '$id_cust' and user_pets_id = '$user_pets_id' and thedate = '$thedate' and status != 'Decline' and start_time <= '$starttime' and end_time <= '$starttime' ");
								$stmt->execute();
								$roww5 = $stmt->fetch();
						if($roww5['numrows1'] > 0)
						{
							if($roww5['id_services'] == 0){
							$service="Veterinary Health Care";
							}
							else{
							$ser=$roww5['id_services'];
							$stmt=$conn->prepare("SELECT * FROM services
								WHERE id_services = '$ser'");
							$stmt->execute();
							$rowww5=$stmt->fetch();
							$service = $rowww5['name'];
						}
						$_SESSION['error'] = 'This pet already has an appointment during this time <strong>('.$service.' '.$roww5['time_reservation'].')</strong>';
						}
						else if($row5['numrows'] >=3 ){
							$_SESSION['error'] = 'No Available Cage';
						}
						else{
							$query = "
									 INSERT INTO reservation 
									 (user_pets_id, id_cust, type_id, id_services, thedate, time_reservation, start_time, r_type, status) VALUES 
									 (:user_pets_id, :id_cust, :type_id, :id_services, :thedate, :time_reservation,'$starttime', 'Walkin', 'Pending')";

									$statement = $conn->prepare($query);

											if($statement->execute($data))
											{
											$_SESSION['success'] = 'Data Inserted';
											}

									$output = array(
									 'message' => $_SESSION['success']
									);

									echo json_encode($output);
						}
					}
			}
			else if($type_id == 2){
				$conn = $pdo->open();

				$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM reservation WHERE user_pets_id = :user_pets_id and id_services = :id_services and thedate=:thedate and  end_time > :starttime and start_time < :endtime ");
				$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'starttime'=>$starttime,'endtime'=>$endtime]);
				$row = $stmt->fetch();

				$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows FROM reservation WHERE user_pets_id = :user_pets_id and thedate=:thedate and  end_time > :starttime and start_time < :endtime OR user_pets_id = :user_pets_id and thedate=:thedate and  start_time <= :starttime and end_time <= :starttime or  thedate=:thedate and  start_time <= :starttime and end_time <= :starttime");
				$stmt->execute(['user_pets_id'=>$user_pets_id,'thedate'=>$thedate,'starttime'=>$starttime,'endtime'=>$endtime]);
				$row2 = $stmt->fetch();

						if($row['numrows'] > 0) {
							$_SESSION['error'] = 'The chosen date and time is already taken by other customer.';
						}
						else if($row2['numrows'] > 0){
									if($row2['id_services'] == 0){
									$service="Veterinary Health Care";
								}
								else{
									$ser=$row2['id_services'];
									$stmt=$conn->prepare("SELECT * FROM services
										WHERE id_services = '$ser'");
									$stmt->execute();
									$rowww4=$stmt->fetch();
									$service = $rowww4['name'];
								}
						$_SESSION['error'] = 'This pet already has an appointment during this time <strong>('.$service.' '.$row2['time_reservation'].')</strong>';
						}
						else{
							$query = "
									 INSERT INTO reservation 
									 (user_pets_id, id_cust, type_id, id_services, thedate, time_reservation, start_time, end_time, r_type, status) VALUES 
									 (:user_pets_id, :id_cust, :type_id, :id_services, :thedate, :time_reservation,'$starttime','$endtime', 'Walkin', 'Pending')";

									$statement = $conn->prepare($query);

											if($statement->execute($data))
											{
											$_SESSION['success'] = 'Data Inserted';
											}

									$output = array(
									 'message' => $_SESSION['success']
									);

									echo json_encode($output);
						}
				}

			else if($type_id == 3){
				$conn = $pdo->open();

				$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows  FROM reservation WHERE user_pets_id = :user_pets_id and id_services = :id_services and thedate=:thedate and  end_time > :starttime and start_time < :endtime OR user_pets_id = :user_pets_id  and thedate=:thedate and  end_time > :starttime and start_time < :endtime ");
				$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'starttime'=>$starttime,'endtime'=>$endtime]);
				$row = $stmt->fetch();

				$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows2  FROM reservation WHERE user_pets_id = :user_pets_id  and thedate=:thedate and  end_time > :starttime and start_time < :endtime or thedate=:thedate and  end_time > :starttime and start_time < :endtime");
				$stmt->execute(['user_pets_id'=>$user_pets_id,'thedate'=>$thedate,'starttime'=>$starttime,'endtime'=>$endtime]);
				$row2 = $stmt->fetch();

				$stmt=$conn->prepare("select * from doctor where date =:thedate  and status = 'Not Available'");
				$stmt->execute(['thedate'=>$thedate]);
				$row3=$stmt->fetch();

				$s=$row3['in_charge'];
						if($row['numrows'] >= 2) {
							$_SESSION['error'] = 'The chosen date and time is already taken by other customer.';
						}
						else if($row2['numrows2'] > 0) {
									if($row2['id_services'] == 0){
									$service="Veterinary Health Care";
									}
								else{
									$ser=$row2['id_services'];
									$stmt=$conn->prepare("SELECT * FROM services
										WHERE id_services = '$ser'");
									$stmt->execute();
									$rowww4=$stmt->fetch();
									$service = $rowww4['name'];
									}
						$_SESSION['error'] = 'This pet already has an appointment during this time <strong>('.$service.' '.$row2['time_reservation'].')</strong>';
						
						}
						else{
							$query = "
									 INSERT INTO reservation 
									 (user_pets_id, id_cust, type_id, id_services, thedate, time_reservation, start_time, end_time, r_type, status) VALUES 
									 (:user_pets_id, :id_cust, :type_id, :id_services, :thedate, :time_reservation,'$starttime','$endtime', 'Walkin', 'Pending')";

									$statement = $conn->prepare($query);

											if($statement->execute($data))
											{
											$_SESSION['success'] = 'Data Inserted';
											}

									$output = array(
									 'message' => $_SESSION['success']
									);

									echo json_encode($output);

							}

			}

?>