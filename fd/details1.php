<?php include 'includes/session.php';
$conn = $pdo->open();
if(isset($_GET['upi1'])){
$user_pets_id = $_GET['upi1'];
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id='$user_pets_id'");
$stmt->execute();
foreach($stmt as $crow){
$id_pet = $crow['id_pet'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet='$id_pet'");
$stmt->execute();
foreach($stmt as $crows){
$pet_type = $crows['pet_type'];
$pet_breed = $crows['pet_breed'];
$pet_gender = $crows['pet_gender'];

echo "
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label'>Pet Type</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$pet_type."' readonly>
</div>
</div>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label'>Pet Breed</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$pet_breed."' readonly>
</div>
</div>
<div id='details' class='form-group'>
<label for='edit_name' class='col-sm-3 control-label'>Pet Gender</label>
<div class='col-sm-8'>
<input class='form-control' type='text' value='".$pet_gender."' readonly>
</div>
</div>

";
}
}
}
?>