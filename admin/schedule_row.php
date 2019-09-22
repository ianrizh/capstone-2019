
<?php 
include 'includes/session.php';

if(isset($_POST['doctor_id'])){
$doctor_id = $_POST['doctor_id'];

$conn = $pdo->open();


$stmt = $conn->prepare("SELECT * FROM doctor WHERE doctor_id=:doctor_id");
$stmt->execute(['doctor_id'=>$doctor_id]);
foreach($stmt as $row1){

$dt = $row1['date'];
$date = date('M. d, Y', strtotime($row1['date']));
}


$pdo->close();

echo json_encode($date);
}
?>