
<?php
include 'includes/session.php';


if(isset($_POST['add'])){
$user_pets_id = $_POST['user_pets_id'];
$id_services = $_POST['id_services'];
$thedate = $_POST['thedate'];
$time_reservation= $_POST['time_reservation'];
$status = $_POST['status'];
$theday=date('l',strtotime($thedate));

$stmt=$conn->prepare("select * from services where name = 'Boarding for Small Breed'");
$stmt->execute();
foreach($stmt as $row){
$srvc = $row['id_services'];
}

$stmt=$conn->prepare("select * from services where name = 'Boarding for Medium Breed'");
$stmt->execute();
foreach($stmt as $row1){
$srvc1 = $row1['id_services'];
}

$stmt=$conn->prepare("select * from services where name = 'Boarding for Large Breed'");
$stmt->execute();
foreach($stmt as $row2){
$srvc2 = $row2['id_services'];
}


if($id_services == $srvc){
$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc'");
$stmt->execute();
$row3 = $stmt->fetch();
if($row3['numrows'] < 3){
$stmt = $conn->prepare("INSERT INTO reservation (user_pets_id,id_services,thedate,time_reservation,status,r_type) VALUES (:user_pets_id,:id_services,:thedate,:time_reservation,:status,:r_type)");
$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'status'=>'Pending','r_type'=>'Online']);
$_SESSION['success'] = 'Reservation successful';
}
}

if($id_services == $srvc1){
$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc1'");
$stmt->execute();
$row4 = $stmt->fetch();
if($row4['numrows'] < 3){
$stmt = $conn->prepare("INSERT INTO reservation (user_pets_id,id_services,thedate,time_reservation,status,r_type) VALUES (:user_pets_id,:id_services,:thedate,:time_reservation,:status,:r_type)");
$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'status'=>'Pending','r_type'=>'Online']);
$_SESSION['success'] = 'Reservation successful';
}
}

if($id_services == $srvc2){
$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services='$srvc2'");
$stmt->execute();
$row5 = $stmt->fetch();
if($row5['numrows'] < 3){
$stmt = $conn->prepare("INSERT INTO reservation (user_pets_id,id_services,thedate,time_reservation,status,r_type) VALUES (:user_pets_id,:id_services,:thedate,:time_reservation,:status,:r_type)");
$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'status'=>'Pending','r_type'=>'Online']);
$_SESSION['success'] = 'Reservation successful';
}
}


$pdo->close();
header('location: appointment.php?service='.$id_services.'');
}
?>