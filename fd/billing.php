
<?php
include 'includes/session.php';

if(isset($_POST['add'])){
$reservation_id= $_POST['reservation_id'];
$status = $_POST['status'];
$amount_paid = $_POST['amount_paid'];
$_change = $_POST['_change'];

$conn = $pdo->open();
try{
date_default_timezone_set('Asia/Manila');
$pay_date=date('Y-m-d');
$stmt = $conn->prepare("UPDATE reservation SET status=:status, amount_paid=:amount_paid, _change=:_change, pay_date='$pay_date' WHERE reservation_id=:reservation_id");
$stmt->execute(['status'=>'Paid', 'amount_paid'=>$amount_paid, '_change'=>$_change, 'reservation_id'=>$reservation_id]);

$_SESSION['success'] = 'Successful Transaction';
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}

$pdo->close();

header('location: bill1.php?copy='.$reservation_id.'');
}

?>