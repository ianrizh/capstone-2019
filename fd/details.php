<?php include 'includes/session.php';
$conn = $pdo->open();
if(isset($_GET['upi'])){
$user_pets_id = $_GET['upi'];
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id='$user_pets_id'");
$stmt->execute();
foreach($stmt as $crow){
$id_cust = $crow['id_cust'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust='$id_cust'");
$stmt->execute();
foreach($stmt as $crows){
$contact = $crows['contact'];
$email = $crows['email'];

echo "
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label'>CONTACT NUMBER</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$contact."' readonly>
</div>
</div>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label'>EMAIL ADDRESS</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$email."' readonly>
</div>
</div>

<div class='box-header with-border' style='margin-left:-10px;'>
<h3 class='box-title' style='color:#36bbbe'><b><i class='fa fa-paw'></i> PET'S INFO</b></h3>
</div>
<div class='box-body'>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label'>PET NAME</label>
<div class='col-sm-8'> ";
?>

<select class="form-control" id="user_pets_id" name="user_pets_id" onChange="onSelect(this.value)" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $row){
$upi1 = $row['user_pets_id'];
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id='$upi1'");
$stmt->execute();
foreach($stmt as $crow){
$id_pet = $crow['id_pet'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet='$id_pet'");
$stmt->execute();
foreach($stmt as $crows){
echo "
<option value='$upi1'>".$crows['pet_name']."</option>
";
}
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select>

<?php
echo "
</div>
</div>
<div id='details1'>
</div>
";
?>
<script>
 function onSelect(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details1").innerHTML=this.responseText;
	}
	a.open('GET', "details1.php?upi1="+str,true);
	a.send();
 }
</script>
<?php
echo"
</div>
";
}
}
}
?>