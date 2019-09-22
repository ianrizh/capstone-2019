
<?php
include 'includes/session.php';

if(isset($_POST['add'])){
$user_pets_id= $_POST['user_pets_id'];
$status = $_POST['status'];
$amount_paid = $_POST['amount_paid'];
$_change = $_POST['_change'];

$conn = $pdo->open();
try{
date_default_timezone_set('Asia/Manila');
$pay_date=date('Y-m-d');
$stmt = $conn->prepare("UPDATE reservation SET status=:status, amount_paid=:amount_paid, _change=:_change, pay_date='$pay_date' WHERE user_pets_id=:user_pets_id");
$stmt->execute(['status'=>'Paid', 'amount_paid'=>$amount_paid, '_change'=>$_change, 'user_pets_id'=>$user_pets_id]);

$_SESSION['success'] = 'Successful Transaction';
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}

$pdo->close();

header('location: bill3.php?copy='.$user_pets_id.'');
}

?>