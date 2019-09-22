<?php
include 'includes/session.php';
/*$stmt = $conn->prepare("SELECT online_reservation.reservation_id, user_pets.id_cust, user_pets.id_pet, online_reservation.thedate, online_reservation.time_reservation 
FROM online_reservation 
INNER JOIN user_pets on online_reservation.user_pets_id = user_pets.user_pets_id
WHERE online_reservation.status = 'Not Confirm' 
ORDER BY reservation_id desc");
$stmt->execute();
$response='';
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
$response = $response . "<div class='notification-item' style='color:white'>" .
"<div class='notification-subject'><b>". $row['firstname']. " ". $row['lastname']. "</b> wants to have an appointment on <b>" .date('M. d, Y', strtotime($row['thedate'])). "</b>, at  <b>" .$row['time_reservation']. "</b>.</div><hr>" . 
"</div>";
}*/

try{
$stmt = $conn->prepare("SELECT * FROM stocks_expired where stocks = '0' || stocks <= '10'");
$stmt->execute();
foreach($stmt as $row){
$id_stocks_expired = $row['id_stocks_expired'];
$id_products = $row['id_products'];
$stocks = $row['stocks'];
$stmt = $conn->prepare("SELECT * FROM products where id_products = '$id_products'");
$stmt->execute();
foreach($stmt as $rows){
}
$name = $rows['name'];
if($stocks == '0'){
echo "<div class='notification-item' style='color:white'>" .
"<div class='notification-subject'><b>". $rows['name']. "</b> is out of stock.</div><hr>" . 
"</div>";
}
else{
echo "<div class='notification-item' style='color:white'>" .
"<div class='notification-subject'><b>". $rows['name']. "</b> is running out of stock.</div><hr>" . 
"</div>";
}
}
}
catch(PDOException $e){
echo $e->getMessage();
}
echo "<a href='reservations.php' style='color:white; float:right'><b>RESERVATIONS</b></a>";
?>
