<div class="modal fade" id="pet">
<div class="modal-dialog">
<div class="modal-content">
<div class='box-header with-border'>
<h3 class='box-title' style='color:#36bbbe' ><b><i class='fa fa-paw'></i> PET'S INFO</b></h3>
</div>
<div class="modal-body">
<form class="form-horizontal">
<div class="form-group">
<label for="name" class="col-sm-3 control-label">PET NAME</label>
<div class="col-sm-9">
<select class="form-control" name="user_pets_id" onChange="onSelect1(this.value)" autocomplete="off" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM pets");
$stmt->execute();

foreach($stmt as $crow){
echo "
<option value='".$crow['id_pet']."'>".$crow['pet_name']."</option>
";
}

$pdo->close();
?>
</select>
</div>
</div>
<div id="details1">
</div>
<script>
 function onSelect1(str){
  var pet = new XMLHttpRequest
  pet.onreadystatechange=function(){
    document.getElementById("details1").innerHTML=this.responseText;
  }
  pet.open('GET', "details1.php?id_pet="+str,true);
  pet.send();
 }
</script>

<div id="details2">
</div>
<script>
 function onSelect2(str){
  var srvc = new XMLHttpRequest
  srvc.onreadystatechange=function(){
    document.getElementById("details2").innerHTML=this.responseText;
  }
  srvc.open('GET', "g_time1.php?id_services1="+str,true);
  srvc.send();
 }
</script>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-send"></i> Submit</button>
</form>
</div>
</div>
</div>
</div>