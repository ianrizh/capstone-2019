<?php 
include 'includes/session.php';

if(isset($_POST['id_stocks_expired'])){
$id_stocks_expired = $_POST['id_stocks_expired'];

$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM stocks_expired WHERE id_stocks_expired=:id_stocks_expired");
$stmt->execute(['id_stocks_expired'=>$id_stocks_expired]);
foreach($stmt as $row){
$id_products = $row['id_products'];
$stmt = $conn->prepare("SELECT * FROM products where id_products = '$id_products'");
$stmt->execute();
foreach($stmt as $qrow){
$name = $qrow['name'];
$id_category = $qrow['id_category'];
$stmt = $conn->prepare("select * from category where id_category = '$id_category'");
$stmt->execute();
foreach($stmt as $rows){
$category = $rows['category'];
}
}
}
$stmt->execute(['id_stocks_expired'=>$id_stocks_expired, 'category'=>$category]);
$row = $stmt->fetch();

$pdo->close();

echo json_encode($row);
}
?>