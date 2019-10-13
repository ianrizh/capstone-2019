<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php';
$customer = $_GET['customer'];

try{
$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust = :id_cust");
$stmt->execute(['id_cust' => $customer]);
$customer = $stmt->fetch();
$user = $customer['id_cust'];
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
<!-- STYLING FOR TAB CONTAINER -->
<style>
/* Style the tab */
.tab {
overflow: hidden;
border: 1px solid #ccc;
background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
background-color: inherit;
float: left;
border: none;
outline: none;
cursor: pointer;
padding: 14px 16px;
transition: 0.3s;
font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
border-bottom: none;
}

.tabcontent {
animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
from {opacity: 0;}
to {opacity: 1;}
}
</style>

<script>
function printContent(el)
{
var restorepage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorepage;
window.location.href='orders.php';
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="tab">
<button class="tablinks" onClick="openTab(event, 'tab_services')">TRANSACTION DETAILS</button>
</div>

<div class="content">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger alert-dismissible' style='width:80% margin-top:10px;'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Ooops!</h4>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible' style='width:80% margin-top:10px;'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-check'></i> Success!</h4>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>

<div class="box">
<div class="box-body">
<div class='box-header'>
<h3 class='box-title' style='color:#36bbbe;'><b><i class='fa fa-calendar'></i> TRANSACTION DETAILS</b></h3>
</div> 
<div class="table-responsive" ng-app="liveApp1" ng-controller="liveController1" ng-init="fetchData()">
<form name="testform" ng-submit="insertDatas()">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Pet Name</th>
<th>Service Type</th>
<th>Service Category</th>
<th>Date</th>
<th>Time</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
	<input type="hidden" ng-model="addData.id_cust" id="id_cust" name="id_cust">
<td><select ng-model="addData.user_pets_id" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM user_pets where id_cust = '$user'");
$stmt->execute();
foreach($stmt as $crows){
$user_pets_id = $crows['user_pets_id'];
$id_pet = $crows['id_pet'];
$stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
$stmt->execute();
foreach($stmt as $crows1){
	$pet_name = $crows1['pet_name'];
echo "
<option value='$user_pets_id'>".$pet_name."</option>
";
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select></td>
<td><select ng-model="addData.type_id" class="form-control" ng-required="true" onChange="java_script_:show1(this.options[this.selectedIndex].value)">
<option value="" disabled selected required>---Select---</option>

<option value="1">Boarding</option>
<option value="2">Veterinary Health Care</option>
<option value="3">Grooming</option>
</select></td>
<td>
<input type="hidden" ng-model="addData.id_services" id="clinic3" ng-required="true" style="display: none">
<div id="time" class="form-group">
<div class="col-sm-8" id="grooming2" style="display:none; width:100%;">
<select class="form-control" ng-model="addData.id_services" ng-required="true">
<option value="" ng-model="addData.id_services" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("select * from category where category = 'Grooming'");
$stmt->execute();
foreach($stmt as $row1){
$id_category = $row1['id_category'];
$stmt = $conn->prepare("SELECT * FROM services WHERE id_category = '$id_category' and deleted_date = '0000-00-00'");
$stmt->execute();
foreach($stmt as $row){
$id_services1 = $row['id_services'];
$name = $row['name'];
echo "
<option value='$id_services1'>".$name."</option>
";
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select>
</div>
</div>
<div id="time" class="form-group">
<div class="col-sm-8" id="boarding1" style="display:none; width:100%; margin-top: -15px;">
<select class="form-control" ng-model="addData.id_services" ng-required="true">
<option value="" ng-model="addData.id_services" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("select * from category where category = 'Boarding'");
$stmt->execute();
foreach($stmt as $row1){
$id_category = $row1['id_category'];
$stmt = $conn->prepare("SELECT * FROM services WHERE id_category = '$id_category' and deleted_date = '0000-00-00'");
$stmt->execute();
foreach($stmt as $row){
$id_services2 = $row['id_services'];
$names = $row['name'];
echo "
<option value='$id_services2'>".$names."</option>
";
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select>
</div>
</div>
</td>
<td>
<input type="hidden" class="form-control" ng-model="addData.thedate" id="thedate" name="thedate" readonly>
<input type="text" class="form-control" ng-model="addData.date" readonly>
</td>
<td>
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<div class="col-sm-9" style="width:100%">
<select ng-model="addData.time_reservation" class="form-control" id="boarding2" style="display:none; width:100%" required>
<option value="" disabled selected required>---Select---</option>
<option value="12:00 p.m">12:00 p.m</option>
<option value="01:00 p.m">01:00 p.m</option>
<option value="02:00 p.m">02:00 p.m</option>
<option value="03:00 p.m">03:00 p.m</option>
<option value="04:00 p.m">04:00 p.m</option>
<option value="05:00 p.m">05:00 p.m</option>
</select>
</div>
</div>
';

}	
else
{
echo '
<div id="time" class="form-group">
<div class="col-sm-9" style="width:100%">
<select ng-model="addData.time_reservation" class="form-control" id="boarding2" style="display:none; width:100%" required>
<option value="" disabled selected required>---Select---</option>
<option value="09:00 a.m">09:00 a.m</option>
<option value="10:00 a.m">10:00 a.m</option>
<option value="11:00 a.m">11:00 a.m</option>
<option value="12:00 p.m">12:00 p.m</option>
<option value="01:00 p.m">01:00 p.m</option>
<option value="02:00 p.m">02:00 p.m</option>
<option value="03:00 p.m">03:00 p.m</option>
<option value="04:00 p.m">04:00 p.m</option>
<option value="05:00 p.m">05:00 p.m</option>
<option value="06:00 p.m">06:00 p.m</option>
<option value="07:00 p.m">07:00 p.m</option>
</select>
</div>
</div>
';
}
?>

<?php
$stmt = $conn->prepare("SELECT * FROM services");
$stmt->execute();
foreach($stmt as $crow){
$price = $crow['price'];
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
}
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Sunday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}	
elseif($theday == 'Monday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Monday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Tuesday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Tuesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Wednesday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Wednesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Thursday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Thursday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Friday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Friday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Saturday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Saturday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
?>	
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Sunday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
} 
elseif($theday == 'Monday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Monday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Tuesday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Tuesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Wednesday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Wednesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Thursday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Thursday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Friday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Friday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Saturday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Saturday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
?>


<script>
function show1(aval) {
if (aval == "2") {
clinic2.style.display='inline-block';
clinic3.style.display='inline-block';
grooming2.style.display='none';
gtime1.style.display='none';
boarding1.style.display='none';
boarding2.style.display='none';
Form.fileURL.focus();
} 
if (aval == "3") {
clinic2.style.display='none';
clinic3.style.display='none';
grooming2.style.display='inline-block';
gtime1.style.display='inline-block';
clinic2.style.display='none';
clinic3.style.display='none';
boarding1.style.display='none';
boarding2.style.display='none';
/*gtime2.style.display='none';
gtime22.style.display='none';
Form.fileURL.focus();
}*/
}   
if (aval == "1") {
clinic2.style.display='none';
clinic3.style.display='none';
grooming2.style.display='none';
gtime1.style.display='none';
clinic2.style.display='none';
clinic3.style.display='none';
boarding1.style.display='inline-block';
boarding2.style.display='inline-block';
/*gtime2.style.display='none';
gtime22.style.display='none';
Form.fileURL.focus();
}*/
}   
}
</script>
</td>
<td><button type="submit" class="btn btn-success btn-sm">Add</button></td>
</tr>
<tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
</tr>

</tbody>
</table>
</form>

<script type="text/ng-template" id="display1">
<td>{{data.pet_name}}</td>
<td>{{data.service_type}}</td>
<td>{{data.service_name}}</td>
<td>{{data.thedate}}</td>
<td>{{data.time_reservation}}</td>
<td>
<button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
<button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.pota_id)">Delete</button>
</td>
</script>
<script type="text/ng-template" id="edit1">
<td><input type="text" ng-model="formData.pet_name" class="form-control"  /></td>
<td><td>
<input type="hidden" ng-model="formData.data.pota_id" />
<button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
<button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
</td>
</script>         
</div>  
</div>
<script>
var app = angular.module('liveApp1', []);

app.controller('liveController1', function($scope, $http){

$scope.formData = {};
$scope.addData = {};
$scope.success = false;
$scope.addData.id_services = "0";
$scope.addData.id_cust = "<?php echo $user ?>";
<?php
date_default_timezone_set('Asia/Manila');
$thedate=date('Y-m-d');
?>
$scope.addData.date = "<?php echo "".date('M. d, Y', strtotime($thedate))."" ?>";
$scope.addData.thedate = "<?php echo $thedate; ?>";

$scope.getTemplate = function(data){
if (data.user_pets_id === $scope.formData.user_pets_id)
{
return 'edit1';
}
else
{
return 'display1';
}
};

$scope.fetchData = function(){
$http.get('select1.php').success(function(data){
	console.log(data);
$scope.namesData = data;
});
};

$scope.insertDatas = function(){
$http({
method:"POST",
url:"insert.php",
data:$scope.addData,
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
$scope.addData = {};
window.location.href='';
});
};

$scope.showEdit = function(data) {
$scope.formData = angular.copy(data);
};

$scope.editData = function(){
$http({
method:"POST",
url:"edit.php",
data:$scope.formData,
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
$scope.formData = {};
});
};

$scope.reset = function(){
$scope.formData = {};
};

$scope.closeMsg = function(){
$scope.success = false;
};

$scope.deleteData = function(pota_id){
if(confirm("Are you sure you want to remove it?"))
{
$http({
method:"POST",
url:"delete.php",
data:{'pota_id':pota_id}
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
}); 
}
};

});

</script>

</div> 
</div>
</div>
<!-- ORDERS -->

<!-- SCRIPT FOR TAB CONTAINER -->
<script type="text/javascript">
function openTab(evt, tab_id) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}
document.getElementById(tab_id).style.display = "block";
evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/orders_modal.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(window).on('load',function(){
$('#mdl_addorder').modal('show');
});
$(function(){
$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var id_emp = $(this).data('id');
getRow(id_emp);
});

$(document).on('click', '.photo', function(e){
e.preventDefault();
var id_emp = $(this).data('id');
getRow(id_emp);
});

});

function getRow(id_emp){
$.ajax({
type: 'POST',
url: 'employees_row.php',
data: {id_emp:id_emp},
dataType: 'json',
success: function(response){
$('.id_emp').val(response.id_emp);
$('#edit_email').val(response.email);
$('#edit_firstname').val(response.firstname);
$('#edit_lastname').val(response.lastname);
$('#edit_home').val(response.home);
$('#edit_id_position').val(response.id_position);
$('#catselected').val(response.id_position).html(response.position);
$('#edit_contact').val(response.contact);
$('#edit_fullname').val(response.firstname+' '+response.lastname);
$('.fullname').html(response.firstname+' '+response.lastname);
getCategory();
}
});

}
</script>
</body>
</html>
