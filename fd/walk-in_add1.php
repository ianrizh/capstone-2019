
<?php
include 'includes/session.php';

if(isset($_POST)){
$id_cust	= $_POST['id_cust'];
$user_pets_id	= $_POST['user_pets_id'];
$id_services = $_POST['id_services'];
$s_price = $_POST['s_price'];
date_default_timezone_set('Asia/Manila');
$thedate=date('Y-m-d');
$time_reservation = $_POST['time_reservation'];

if($id_services == '0'){
$theday=date('l',strtotime($thedate));
if($theday == 'Sunday')
{

if($time_reservation=="12:00 p.m - 12:30 p.m"){
$starttime="12:00";
$endtime="12:30";
}
elseif($time_reservation=="12:30 p.m - 01:00 p.m"){

$starttime="12:30";
$endtime="13:00";
}
elseif($time_reservation=="01:00 p.m - 01:30 p.m"){

$starttime="13:00";
$endtime="13:30";
}
elseif($time_reservation=="01:30 p.m - 02:00 p.m"){

$starttime="13:30";
$endtime="14:00";
}
elseif($time_reservation=="02:00 p.m - 02:30 p.m"){

$starttime="14:00";
$endtime="14:30";
}
elseif($time_reservation=="02:30 p.m - 03:00 p.m"){

$starttime="14:30";
$endtime="15:00";
}
elseif($time_reservation=="03:00 p.m - 03:30 p.m"){

$starttime="15:00";
$endtime="15:30";
}
elseif($time_reservation=="03:30 p.m - 04:00 p.m"){

$starttime="15:30";
$endtime="16:00";
}
elseif($time_reservation=="04:00 p.m - 04:30 p.m"){

$starttime="16:00";
$endtime="16:30";
}
elseif($time_reservation=="04:30 p.m - 05:00 p.m"){

$starttime="16:30";
$endtime="17:00";
}
}
else{
{
if($time_reservation=="10:00 a.m - 10:30 a.m"){
$starttime="10:00";
$endtime="10:30";
}
elseif($time_reservation=="10:30 a.m - 11:00 a.m"){
$starttime="10:30";
$endtime="11:00";
}
elseif($time_reservation=="11:00 a.m - 11:30 a.m"){
$starttime="11:00";
$endtime="11:30";
}
elseif($time_reservation=="11:30 a.m - 12:00 p.m"){
$starttime="11:30";
$endtime="12:30";
}
elseif($time_reservation=="12:00 p.m - 12:30 p.m"){
$starttime="12:00";
$endtime="12:30";
}
elseif($time_reservation=="12:30 p.m - 01:00 p.m"){

$starttime="12:30";
$endtime="13:00";
}
elseif($time_reservation=="01:00 p.m - 01:30 p.m"){
$starttime="13:00";
$endtime="13:30";
}
elseif($time_reservation=="01:30 p.m - 02:00 p.m"){

$starttime="13:30";
$endtime="14:00";
}
elseif($time_reservation=="02:00 p.m - 02:30 p.m"){

$starttime="14:00";
$endtime="14:30";
}
elseif($time_reservation=="02:30 p.m - 03:00 p.m"){

$starttime="14:30";
$endtime="15:00";
}
elseif($time_reservation=="03:00 p.m - 03:30 p.m"){

$starttime="15:00";
$endtime="15:30";
}
elseif($time_reservation=="03:30 p.m - 04:00 p.m"){

$starttime="15:30";
$endtime="16:00";
}
elseif($time_reservation=="04:00 p.m - 04:30 p.m"){

$starttime="16:00";
$endtime="16:30";
}
elseif($time_reservation=="04:30 p.m - 05:00 p.m"){

$starttime="16:30";
$endtime="17:00";
}
elseif($time_reservation=="05:00 p.m - 05:30 p.m"){

$starttime="17:00";
$endtime="17:30";
}
elseif($time_reservation=="05:30 p.m - 06:00 p.m"){

$starttime="17:30";
$endtime="18:00";
}
elseif($time_reservation=="06:00 p.m - 06:30 p.m"){

$starttime="18:00";
$endtime="18:30";}
elseif($time_reservation=="06:30 p.m - 07:00 p.m"){

$starttime="18:30";
$endtime="19:00";
}
}
}
}
else{
$theday=date('l',strtotime($thedate));
if($theday == 'Tuesday')
{

if($time_reservation=="09:00 a.m - 10:30 a.m"){
$starttime="09:00";
$endtime="10:30";
}
elseif($time_reservation=="10:30 a.m - 12:00 p.m"){

$starttime="10:30";
$endtime="12:00";
}
elseif($time_reservation=="12:00 p.m - 01:30 p.m"){

$starttime="12:00";
$endtime="13:30";
}
elseif($time_reservation=="01:30 p.m - 03:00 p.m"){

$starttime="13:30";
$endtime="15:00";
}
elseif($time_reservation=="03:00 p.m - 04:30 p.m"){

$starttime="15:00";
$endtime="16:30";
}
elseif($time_reservation=="04:30 p.m - 05:00 p.m"){

$starttime="16:30";
$endtime="17:00";
}
elseif($time_reservation=="05:00 p.m - 06:30 p.m"){

$starttime="17:00";
$endtime="18:30";
}}
else
{
if($time_reservation=="10:00 a.m - 11:30 a.m"){
$starttime="10:00";
$endtime="11:30";
}
elseif($time_reservation=="11:30 a.m - 01:00 p.m"){

$starttime="11:30";
$endtime="13:00";
}
elseif($time_reservation=="01:00 p.m - 02:30 p.m"){

$starttime="13:00";
$endtime="14:30";
}
elseif($time_reservation=="02:30 p.m - 04:00 p.m"){

$starttime="14:30";
$endtime="16:00";
}
elseif($time_reservation=="04:00 p.m - 05:30 p.m"){

$starttime="16:00";
$endtime="17:30";
}
elseif($time_reservation=="05:30 p.m - 07:00 p.m"){

$starttime= '17:30';
$endtime= '19:00';
}
}
}
$conn = $pdo->open();
$stmt = $conn->prepare("SELECT *,COUNT(*) AS numrows  FROM reservation WHERE user_pets_id = user_pets_id and id_services = id_services and thedate=:thedate and  end_time > :starttime and start_time < :endtime ");
$stmt->execute(['thedate'=>$thedate,'starttime'=>$starttime,'endtime'=>$endtime]);
$row = $stmt->fetch();

if($row['numrows'] > 0){
$_SESSION['error'] = 'The chosen date and time is already taken by other customer.';
}
else{
try{
if($id_services == '0'){
date_default_timezone_set('Asia/Manila');
$thedate=date('Y-m-d');
$stmt = $conn->prepare("INSERT INTO reservation (user_pets_id,id_services,thedate,time_reservation,s_price,status,start_time,end_time,r_type) VALUES (:user_pets_id,:id_services,:thedate,:time_reservation,:s_price,:status,:starttime,:endtime,:r_type)");
$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'s_price'=>$s_price,'status'=>'Pending','starttime'=>$starttime,'endtime'=>$endtime,'r_type'=>'Walkin']);
$_SESSION['success'] = 'Reservation successful';
}
else{
date_default_timezone_set('Asia/Manila');
$thedate=date('Y-m-d');
$stmt = $conn->prepare("INSERT INTO reservation (user_pets_id,id_services,thedate,time_reservation,s_price,status,start_time,end_time,r_type) VALUES (:user_pets_id,:id_services,:thedate,:time_reservation,:s_price,:status,:starttime,:endtime,:r_type)");
$stmt->execute(['user_pets_id'=>$user_pets_id,'id_services'=>$id_services,'thedate'=>$thedate,'time_reservation'=>$time_reservation,'s_price'=>$s_price,'status'=>'Pending','starttime'=>$starttime,'endtime'=>$endtime,'r_type'=>'Walkin']);
$_SESSION['success'] = 'Reservation successful';
}
}
catch(PDOException $e){
$_SESSION['error'] = $e->getMessage();
}
//}
$pdo->close();
//header('location: orders.php');
}
?>