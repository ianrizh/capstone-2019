<?php 
include 'includes/session.php';
$conn = $pdo->open();
$output='';
if(isset($_POST['groomers']))
{
	if($_POST['groomers'] != '')
	{
$date= $_POST["groomers"];
	$theday=date('l',strtotime($date));
echo '<div id="groom" class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Groomers</label>
<div class="col-sm-9">
<select class="form-control" id="groomer" name="groomer_id" required>
<option value="" disabled selected required>---Select---</option>';
$stmt=$conn->prepare("select * from groomer");
$stmt->execute();
foreach ($stmt as $rows)
{
$grooming_date=$rows['date'];
$groomer_name= $rows['name'];
}
if($date != $grooming_date)
{
echo'
<option value="Groomer 1">Groomer</option>
<option value="Groomer 2">Both Groomer</option>';
}
else
{
	echo '<option value="Groomer 2">Both Groomer</option>';

}

echo'
</select>
</div>
</div>';
	}
	else
	{
	
	}

}
?>