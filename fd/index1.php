<?php include 'includes/session.php';?> 
<html>  
<head>  
<title>Inline Table Add Edit Delete using AngularJS in PHP Mysql</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
</head>  
<body>  
<div class="container">  
<br />
<h3 align="center">Inline Table Add Edit Delete using AngularJS in PHP Mysql</h3><br />
<div class="table-responsive" ng-app="liveApp1" ng-controller="liveController1" ng-init="fetchData()">
<form name="testform" ng-submit="insertDatas()">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Pet Name</th>
<th>Service Type</th>
<th>Service Id</th>
<th>Time</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td><select ng-model="addData.pet_name" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM pets");
$stmt->execute();
foreach($stmt as $crows){
$id_pet = $crows['id_pet'];
$pet_name = $crows['pet_name'];
echo "
<option value='$pet_name'>".$pet_name."</option>
";
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select></td>
<td><select ng-model="addData.service_type" class="form-control" ng-required="true" onChange="java_script_:show1(this.options[this.selectedIndex].value)">
<option value="" disabled selected required>---Select---</option>
<option value="Clinic">Veterinary Health Care</option>
<option value="Boarding">Boarding</option>
<option value="Grooming">Grooming</option>
</select></td>
<td>
<input type="text" ng-model="addData.id_services" id="clinic3" ng-required="true" style="display: none">
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
<div class="col-sm-8" style="width:100%;">
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
<div class="col-sm-8" style="width:100%;">
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
<div class="col-sm-8" style="width:100%;">
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
<div class="col-sm-8" style="width:100%;">
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
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; " required>
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
<div class="col-sm-8" style="width:100%;">
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
<div class="col-sm-8" style="width:100%;">
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
<select class="form-control" name="id_services" id="id_services" onChange="onSelect(this.value)">
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
if (aval == "Clinic") {
clinic2.style.display='inline-block';
clinic3.style.display='inline-block';
grooming2.style.display='none';
gtime1.style.display='none';
boarding1.style.display='none';
boarding2.style.display='none';
Form.fileURL.focus();
} 
if (aval == "Grooming") {
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
if (aval == "Boarding") {
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
<td>{{data.id_services}}</td>
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

$scope.getTemplate = function(data){
if (data.pota_id === $scope.formData.pota_id)
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
