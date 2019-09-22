<?php 
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
<div id="time" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_reservation" required>
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
<label for="edit_name" class="col-sm-3 control-label">Time</label>
<div class="col-sm-9">
<select class="form-control" id="time" name="time_reservation" required>
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
}
?>

