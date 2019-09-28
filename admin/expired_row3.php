
<?php 
include 'includes/session.php';

if(isset($_POST['id_stocks_expired'])){
$id_stocks_expired = $_POST['id_stocks_expired'];
echo $id_stocks_expired;
$conn = $pdo->open();


$stmt = $conn->prepare("SELECT * FROM stocks_expired WHERE id_stocks_expired=:id_stocks_expired");
$stmt->execute(['id_stocks_expired'=>$id_stocks_expired]);
foreach($stmt as $row1){
$date1 = $row1['expired_date'];
$date = date('M. d, Y', strtotime($date1));

}


$pdo->close();

echo json_encode($date1);
}
?>