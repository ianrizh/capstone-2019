<?php include 'includes/session.php';
$conn = $pdo->open();
if(isset($_GET['name'])){
$name = $_GET['name'];
echo '
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">BATCH NUMBER</label>

<div class="col-sm-8">
<select class="form-control" id="batch_number" name="batch_number" autocomplete="off" onChange="onSelect1(this.value)" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("SELECT * FROM products WHERE name='$name'");
$stmt->execute();
foreach($stmt as $crow){
$id_products = $crow['id_products'];
$stmt = $conn->prepare("SELECT * FROM stocks_expired WHERE id_products='$id_products' AND stocks != 0 and expired_flag != '1'");
$stmt->execute();
foreach($stmt as $crows){
$id_stocks_expired = $crows['id_stocks_expired'];
$batch_number = $crows['batch_number'];
echo "
<option value='".$id_stocks_expired."'>".$batch_number."</option>
";
}
echo'
</select>
</div>
</div>

<div id="adjustment2">
</div>
';
?>
<script>
 function onSelect1(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("adjustment2").innerHTML=this.responseText;
	}
	a.open('GET', "adjustment_details1.php?id_stocks_expired="+str,true);
	a.send();
 }
</script>
<?php
}
}
?>
