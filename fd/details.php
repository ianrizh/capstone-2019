<?php include 'includes/session.php';
$conn = $pdo->open();
if(isset($_GET['id_cust'])){
$id_cust = $_GET['id_cust'];
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
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_cust='$id_cust'");
$stmt->execute();
foreach($stmt as $crows){
$id_pet = $crows['id_pet'];
echo "
<option value='$id_pet'>".$crows['pet_name']."</option>
";
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
	a.open('GET', "details1.php?id_pet="+str,true);
	a.send();
 }
</script>
<?php
echo"
</div>
";
}
}
?>