<?php
include 'includes/session.php';

if(isset($_POST['add'])){
$schedule_name = $_POST['schedule_name'];
$day = $_POST['day'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$status = $_POST['status'];

$conn = $pdo->open();

/*$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM schedule WHERE schedule_name=:schedule_name and content=:content");
$stmt->execute(['schedule_name'=>$schedule_name, 'content'=>$content]);
$row = $stmt->fetch();

if($row['numrows'] > 0){
$_SESSION['error'] = 'Schedule name or content already exist';
}
else{*/
try{
$stmt = " INSERT INTO schedule (schedule_name, day, start_time, end_time, status) VALUES (:schedule_name, :day, :start_time, :end_time, :status)";
$sth = $conn->prepare($stmt);
foreach ($schedule_name as $one_piece) {
$sth -> execute(array(':schedule_name'=>$one_piece, ':day'=>$day, ':start_time'=>$start_time, ':end_time'=>$end_time, ':status'=>$status));
}
$_SESSION['success'] = 'Schedule added successfully';
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}
//}

$pdo->close();
}
else{
$_SESSION['error'] = 'Fill up schedule form first';
}
header('location: schedule.php');

?>