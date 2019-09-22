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
$id_pet = $qrow['id_pet'];
$stmt = $conn->prepare("SELECT * FROM pets where id_pet = '$id_pet'");
$stmt->execute();
foreach($stmt as $qrow2){
$pet_size = $qrow2['pet_size'];
}
}
}
$stmt->execute(['reservation_id'=>$reservation_id, 'pet_size'=>$pet_size]);
$row = $stmt->fetch();

$pdo->close();

echo json_encode($row);
}
?>