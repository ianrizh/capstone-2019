
<?php
include 'includes/session.php';

if(isset($_POST['edit'])){
$reservation_id = $_POST['reservation_id'];
$findings = $_POST['findings'];
$prescription = $_POST['prescription'];
$products_used = $_POST['products_used'];
$qty = $_POST['qty'];
$prod_price = $_POST['prod_price'];
$status = $_POST['status'];
$price = $_POST['price'];

$conn = $pdo->open();
try{
$ptotal = $prod_price * $qty;
$total = $ptotal + $price;
date_default_timezone_set('Asia/Manila');
$process_done=date('Y-m-d');
$stmt = $conn->prepare("UPDATE reservation SET findings=:findings, prescription=:prescription, products_used=:products_used, qty=:qty, prod_price=:prod_price, status=:status, total=:total, process_done='$process_done' WHERE reservation_id=:reservation_id");
$stmt->execute(['findings'=>$findings, 'prescription'=>$prescription, 'products_used'=>$products_used, 'qty'=>$qty, 'prod_price'=>$prod_price, 'status'=>'Process Done', 'total'=>$total, 'reservation_id'=>$reservation_id]);

$_SESSION['success'] = 'Successful';
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}

$pdo->close();

header('location: reservations.php');
}

?>