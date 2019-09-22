<?php include 'includes/session.php';
$conn = $pdo->open();
$output='';

if(isset($_POST["date"]))
{
if($_POST["date"] != '')

{

}
else
{

}
$date= $_POST["date"];
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="day" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Day</label>
<div class="col-sm-9">
<input class="form-control" type="text" value="Sunday" readonly name="status" style="border:0px; background-color:white">
</div>
</div>
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_id" required>
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
echo'
<option value="'.$time_id.'">'.$time.'</option>';
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
<div id="day" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Day</label>
<div class="col-sm-9">
<input class="form-control" type="text" value="Monday" readonly name="status" style="border:0px; background-color:white">
</div>
</div>
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_id" required>
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
echo'
<option value="'.$time_id.'">'.$time.'</option>';
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
<div id="day" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Day</label>
<div class="col-sm-9">
<input class="form-control" type="text" value="Tuesday" readonly name="status" style="border:0px; background-color:white">
</div>
</div>
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_id" required>
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
echo'
<option value="'.$time_id.'">'.$time.'</option>';
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
<div id="day" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Day</label>
<div class="col-sm-9">
<input class="form-control" type="text" value="Wednesday" readonly name="status" style="border:0px; background-color:white">
</div>
</div>
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_id" required>
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
echo'
<option value="'.$time_id.'">'.$time.'</option>';
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
<div id="day" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Day</label>
<div class="col-sm-9">
<input class="form-control" type="text" value="Thursday" readonly name="status" style="border:0px; background-color:white">
</div>
</div>
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_id" required>
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
echo'
<option value="'.$time_id.'">'.$time.'</option>';
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
<div id="day" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Day</label>
<div class="col-sm-9">
<input class="form-control" type="text" value="Friday" readonly name="status" style="border:0px; background-color:white">
</div>
</div>
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_id" required>
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
echo'
<option value="'.$time_id.'">'.$time.'</option>';}
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
<div id="day" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Day</label>
<div class="col-sm-9">
<input class="form-control" type="text" value="Saturday" readonly name="status" style="border:0px; background-color:white">
</div>
</div>
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_id" required>
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
echo'
<option value="'.$time_id.'">'.$time.'</option>';
}
}
}
echo'
</select>
</div>
</div>
';
}
}
?>

