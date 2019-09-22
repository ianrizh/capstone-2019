<?php
include 'includes/session.php';

if(isset($_POST['edit1'])){
$reservation_id = $_POST['reservation_id'];
$status = $_POST['status'];
$total = $_POST['total'];

try{
if($status == 'On Process'){
$stmt = $conn->prepare("UPDATE reservation SET status=:status WHERE reservation_id=:reservation_id");
$stmt->execute(['status'=>$status, 'reservation_id'=>$reservation_id]);
$_SESSION['success'] = 'Status updated successfully';
}
else{
date_default_timezone_set('Asia/Manila');
$process_done=date('Y-m-d');
$stmt = $conn->prepare("UPDATE reservation SET status=:status, total=:total, process_done='$process_done' WHERE reservation_id=:reservation_id");
$stmt->execute(['status'=>$status, 'total'=>$total, 'reservation_id'=>$reservation_id]);
$_SESSION['success'] = 'Status updated successfully';
}
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}

$pdo->close();
}
else{
$_SESSION['error'] = 'Fill up edit status form first';
}

header('location: reservations.php');

?>