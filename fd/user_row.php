<?php 
include 'includes/session.php';

if(isset($_POST['reservation_id'])){
$reservation_id = $_POST['reservation_id'];

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM online_reservation WHERE reservation_id=:reservation_id");
$stmt->execute(['reservation_id'=>$reservation_id]);
foreach($stmt as $row){
$user_pets_id = $row['user_pets_id'];
$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $qrow){
$id_cust = $qrow['id_cust'];
$stmt = $conn->prepare("SELECT * FROM customer where id_cust = '$id_cust'");
$stmt->execute();
foreach($stmt as $qrow2){
$firstname = $qrow2['firstname'];
$lastname = $qrow2['lastname'];
}
}
}
$stmt->execute(['reservation_id'=>$reservation_id, 'firstname'=>$firstname, 'lastname'=>$lastname]);
$row = $stmt->fetch();

$pdo->close();

echo json_encode($row);
}
?>