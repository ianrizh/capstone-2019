<?php include 'includes/session.php';
$conn = $pdo->open();
if(isset($_GET['id_cust'])){
$id_cust = $_GET['id_cust'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust='$id_cust'");
$stmt->execute();
foreach($stmt as $crows){
$contact = $crows['contact'];
$fullname = $crows['firstname'] ." ". $crows['lastname'];

echo "
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label' id='cntct' style='text-align:right; margin-top:15px'>CONTACT NUMBER</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$contact."' readonly id='cntct1' style='margin-top:15px'>
</div>
</div>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label' id='cntct2' style='text-align:right; margin-top:15px'>CUSTOMER NAME</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$fullname."' readonly id='cntct3' style='margin-top:15px'>
</div>
</div>
";

echo "<a href='next1.php?id_cust=".$id_cust."' class='btn btn-success btn-sm btn-flat' style='width:100%; margin-top:30px;'><i class='fa fa-arrow-right'></i> Next</a>";

/*echo '
<div class="box-header">
<h3 class="box-title" style="color:#36bbbe;""><b><i class="fa fa-paw"></i> PET DETAILS</b></h3>
</div>
';
echo "
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label' id='cntct'>PET NAME</label>
<div class='col-sm-8'>
<select class='form-control select2' onChange='onSelect3(this.value)' style='width: 100%' required>
<option value='' disabled selected required>---Select---</option>"; 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM user_pets where id_cust = '$id_cust'");
$stmt->execute();
foreach($stmt as $crow){
$ip = $crow['id_pet'];
$ic = $crow['id_cust'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet='$ip' and id_cust = '$ic'");
$stmt->execute();
foreach($stmt as $crows){
$id_pet = $crows['id_pet'];
$pet_name = $crows['pet_name'];
echo "
<option value='$id_pet'>".$pet_name."</option>
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
</script>*/
}
}
?>