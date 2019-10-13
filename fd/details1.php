<?php include 'includes/session.php';
$conn = $pdo->open();
if(isset($_GET['id_pet'])){
$id_pet = $_GET['id_pet'];
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet='$id_pet'");
$stmt->execute();
foreach($stmt as $crows){
$pet_type = $crows['pet_type'];
$pet_breed = $crows['pet_breed'];
$pet_gender = $crows['pet_gender'];
$stmt = $conn->prepare("select * from user_pets where id_pet = '$id_pet'");
$stmt->execute();
foreach($stmt as $z){
	$user_pets_id = $z['user_pets_id'];

echo "
<form class='form-control' method='post' action='walk-in_add1.php'>
<input type='hidden' name='user_pets_id' value='".$user_pets_id."'>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label' style='text-align:right; margin-top:15px;'>PET TYPE</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$pet_type."' style='margin-top:15px;' readonly>
</div>
</div>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label' style='text-align:right; margin-top:15px;'>PET BREED</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$pet_breed."' style='margin-top:15px;' readonly>
</div>
</div>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label' style='text-align:right; margin-top:15px;'>PET GENDER</label>
<div class='col-sm-8' style='margin-bottom: 30px;'>
<input class='form-control' type='text' value='".$pet_gender."' style='margin-top:15px;' readonly>
</div>
</div>
";
}
}
}
?>
<div class='box-header'>
<h3 class='box-title' style='color:#36bbbe;'><b><i class='fa fa-calendar'></i> TRANSACTION DETAILS</b></h3>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label" style="text-align: right">DATE</label>
<div class="col-sm-8" style="margin-bottom: 15px;">
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
?>
<input type="hidden" name="thedate" id="thedate" value="<?php echo $date ?>">
<input type="text" class="form-control" name="thedate" value="<?php echo date('M. d, Y', strtotime($date)); ?>" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label" style="text-align: right">SERVICE TYPE</label>
<div class="col-sm-8" style="margin-bottom: 15px;">
<select id="type" class="form-control" required onChange="java_script_:show9(this.options[this.selectedIndex].value)"  required>
<option value="" disabled selected required>---Select---</option>
<option value="Clinic1">Veterinary Health Care</option>
<option value="Boarding1">Boarding</option>
<option value="Grooming1">Grooming</option>
</select>
</div>
</div>

<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="0" name="id_services" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic11" style="display:none; text-align:right">TIME</label>
<div class="col-sm-8" id="clinic21" style="display:none">
<select class="form-control" id="time_reservation" name="time_reservation">
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
<input type="hidden" value="0" name="id_services" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic11" style="display:none; text-align:right">TIME</label>
<div class="col-sm-8" id="clinic21" style="display:none">
<select class="form-control" id="time_reservation" name="time_reservation">
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
<input type="hidden" value="0" name="id_services" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic11" style="display:none; text-align:right">TIME</label>
<div class="col-sm-8" id="clinic21" style="display:none">
<select class="form-control" id="time_reservation" name="time_reservation">
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
<input type="hidden" value="0" name="id_services" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic11" style="display:none; text-align:right">TIME</label>
<div class="col-sm-8" id="clinic21" style="display:none">
<select class="form-control" id="time_reservation" name="time_reservation">
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
<input type="hidden" value="0" name="id_services" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic11" style="display:none; text-align:right">TIME</label>
<div class="col-sm-8" id="clinic21" style="display:none">
<select class="form-control" id="time_reservation" name="time_reservation">
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
<input type="hidden" value="0" name="id_services" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic11" style="display:none; text-align:right">TIME</label>
<div class="col-sm-8" id="clinic21" style="display:none">
<select class="form-control" id="time_reservation" name="time_reservation">
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
<input type="hidden" value="0" name="id_services" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic11" style="display:none; text-align:right">TIME</label>
<div class="col-sm-8" id="clinic21" style="display:none">
<select class="form-control" id="time_reservation" name="time_reservation">
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
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label" id="grooming11" style="display:none; margin-top:-15px;">GROOMING SERVICES</label>
<div class="col-sm-8" id="grooming21" style="display:none; margin-top:-15px;">
<select class="form-control" name="id_services" onChange="onSelect9(this.value)">
<option value="" disabled selected required>---Select---</option>
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
$id_services10 = $row['id_services'];
$name = $row['name'];
echo "
<option value='$id_services10'>".$name."</option>
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
<div id="g_time0">
</div>
<script>
 function onSelect9(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("g_time0").innerHTML=this.responseText;
	}
	a.open('GET', "g_time0.php?id_services10="+str,true);
	a.send();
 }
</script>
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label" id="boarding11" style="display:none; margin-top:-30px;">BOARDING SERVICES</label>
<div class="col-sm-8" id="boarding21" style="display:none; margin-top:-30px; float: right; margin-right: 110px;">
<select class="form-control" name="id_services" onChange="onSelect8(this.value)">
<option value="" disabled selected required>---Select---</option>
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
$id_services20 = $row['id_services'];
$name = $row['name'];
echo "
<option value='$id_services20'>".$name."</option>
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
<div id="g_time20">
</div>
<script>
 function onSelect8(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("g_time20").innerHTML=this.responseText;
	}
	a.open('GET', "g_time20.php?id_services20="+str,true);
	a.send();
 }
</script>

<div id="details1">
</div>
<script>
 function onSelect3(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details1").innerHTML=this.responseText;
	}
	a.open('GET', "details1.php?id_pet="+str,true);
	a.send();
 }
</script>	
<?php echo "</form>"; ?>
