
<?php 
include 'includes/session.php';

if(isset($_POST['doctor_id'])){
$doctor_id = $_POST['doctor_id'];

$conn = $pdo->open();


$stmt = $conn->prepare("SELECT * FROM doctor WHERE doctor_id=:doctor_id");
$stmt->execute(['doctor_id'=>$doctor_id]);
foreach($stmt as $row1){
$time_id = $row1['time_id'];
$date = date('M. d, Y', strtotime($row1['date']));
$stmt = $conn->prepare("SELECT * FROM time WHERE time_id='$time_id'");
$stmt->execute();
foreach($stmt as $row){
$time_reservation = $row['time_reservation'];
}
}
$stmt->execute(['doctor_id'=>$doctor_id,  'time_reservation'=>$time_reservation]);
$row = $stmt->fetch();

$pdo->close();

echo json_encode($row);
}
?>