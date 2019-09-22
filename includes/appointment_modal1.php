<?php
$conn = $pdo->open();

$id_services = $_GET['service'];

try{
$stmt = $conn->prepare("SELECT *, services.name AS sername, category.category AS sername1, services.id_services AS serid FROM services LEFT JOIN category ON category.id_category=services.id_category WHERE services.id_services = :id_services");
$stmt->execute(['id_services' => $id_services]);
$service = $stmt->fetch();

}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

?>
<!-- Transaction History -->
<div class="modal fade" id="appointment1">
<div class="modal-dialog" style="width:50%">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b style="text-transform:uppercase"><?php echo $service['name']; ?></b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="appointment_add1.php">
<input type="hidden" class="id_services" id="id_services" name="service_id" value="<?php echo $service['id_services']; ?>">
<input type="hidden" class="id_category" name="id_category" value="<?php echo $service['id_category']; ?>">
<input type="hidden" class="name" name="name" value="<?php echo $service['name']; ?>">
<?php
try{
$stmt = $conn->prepare("SELECT * FROM customer WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row){
$id_cust = $row['id_cust'];
$user = $row['firstname'] ." ". $row['lastname'];
$address = $row['home'];
$number = $row['contact'];
$email = $row['email'];
$stmt = $conn->prepare("select * from pets where id_cust = '$id_cust'");
$stmt->execute();
foreach($stmt as $row1){
$pet_name = $row1['pet_name'];
echo '
<input type="hidden" class="form-control" id="cust_id" name="cust_id" value="'.$id_cust.'" readonly>
<input type="hidden" class="form-control" id="full_name" name="full_name" value="'.$user.'" readonly>
<input type="hidden" class="form-control" id="address" name="address" value="'.$address.'" readonly>
<input type="hidden" class="form-control" id="contact" name="contact" autocomplete="off" value="'.$number.'" readonly>
';
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
?>

<?php
$stmt = $conn->prepare("SELECT * FROM category WHERE category = 'Boarding'");
$stmt->execute();
foreach($stmt as $row){
$id_category = $row['id_category'];
if($service['id_category'] == $id_category){
echo '
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Pet Name</label>
<div class="col-sm-9">
<select class="form-control" id="user_pets_id" name="user_pets_id" required>
<option value="" disabled selected required>---Select---</option>';
?>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row){
$id_cust = $row['id_cust'];
$user_pets_id = $row['user_pets_id'];
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id='$user_pets_id'");
$stmt->execute();
foreach($stmt as $crow){
$id_pet = $row['id_pet'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet='$id_pet'");
$stmt->execute();
foreach($stmt as $crows){
echo "
<option value='$user_pets_id'>".$crows['pet_name']." - ".$crows['pet_type']." - ".$crows['pet_breed']." - ".$crows['pet_gender']." - ".$crows['pet_size']."</option>
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
<?php
echo '
</select>
</div>
</div>
';
?>
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Date</label>
<div class="col-sm-9">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
$(function(){
    var date = new Date();
    var minDate = new Date(date.getFullYear(), date.getMonth(), date.getDate()+4);
    $('#thedate').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: minDate,
        beforeShowDay: $.datepicker.Weekends
    });
    
});
</script>
<input class="form-control" id="thedate" name="thedate" type="text" required/>
</div>
</div>
<script>
 $(document).ready(function(){  
      $('#thedate').change(function(){  
           var date = $(this).val();
           $.ajax({  
                url:"date1.php",
                method:"POST",  
                data:{date:date},  
                success:function(data){  
                     $('#time').html(data);  
                }  
           });  
      });  
 });
</script>

<div id="time">
</div>
<?php
}
}
?>

<?php
$stmt = $conn->prepare("SELECT * FROM category WHERE category = 'Grooming'");
$stmt->execute();
foreach($stmt as $row){
$id_category = $row['id_category'];
if($service['id_category'] == $id_category){
echo '
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Pet Name</label>
<div class="col-sm-9">
<select class="form-control" id="user_pets_id" name="user_pets_id" required>
<option value="" disabled selected required>---Select---</option>';
?>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row){
$id_cust = $row['id_cust'];
$user_pets_id = $row['user_pets_id'];
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id='$user_pets_id'");
$stmt->execute();
foreach($stmt as $crow){
$id_pet = $row['id_pet'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet='$id_pet'");
$stmt->execute();
foreach($stmt as $crows){
echo "
<option value='$user_pets_id'>".$crows['pet_name']." - ".$crows['pet_type']." - ".$crows['pet_breed']." - ".$crows['pet_gender']." - ".$crows['pet_size']."</option>
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
<?php
echo '
</select>
</div>
</div>
';
?>
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Date</label>
<div class="col-sm-9">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
$(function(){
    var date = new Date();
    var minDate = new Date(date.getFullYear(), date.getMonth(), date.getDate()+8);
    $('#thedate').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: minDate,
        beforeShowDay: $.datepicker.Weekends
    });
    
});
</script>
<input class="form-control" id="thedate" name="thedate" type="text" required/>
</div>
</div>
<script>
 $(document).ready(function(){  
      $('#thedate').change(function(){  
           var date = $(this).val();
           $.ajax({  
                url:"date1.php",
                method:"POST",  
                data:{date:date},  
                success:function(data){  
                     $('#time').html(data);  
                }  
           });  
      });  
 });
</script>

<div id="time">
</div>
<?php
}
}
?>

<?php
$stmt = $conn->prepare("SELECT * FROM category WHERE category = 'Deworming'");
$stmt->execute();
foreach($stmt as $row){
$id_category = $row['id_category'];
if($service['id_category'] == $id_category){
echo '
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Pet Name</label>
<div class="col-sm-9">
<select class="form-control" id="user_pets_id" name="user_pets_id" required>
<option value="" disabled selected required>---Select---</option>';
?>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row){
$id_cust = $row['id_cust'];
$user_pets_id = $row['user_pets_id'];
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id='$user_pets_id'");
$stmt->execute();
foreach($stmt as $crow){
$id_pet = $row['id_pet'];
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet='$id_pet'");
$stmt->execute();
foreach($stmt as $crows){
echo "
<option value='$user_pets_id'>".$crows['pet_name']." - ".$crows['pet_type']." - ".$crows['pet_breed']." - ".$crows['pet_gender']." - ".$crows['pet_size']."</option>
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
<?php
echo '
</select>
</div>
</div>
';
?>
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Date</label>
<div class="col-sm-9">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
$(function(){
    var date = new Date();
    var minDate = new Date(date.getFullYear(), date.getMonth(), date.getDate()+8);
    $('#thedate').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: minDate,
        beforeShowDay: $.datepicker.Weekends
    });
    
});
</script>
<input class="form-control" id="thedate" name="thedate" type="text" required/>
</div>
</div>
<script>
 $(document).ready(function(){  
      $('#thedate').change(function(){  
           var date = $(this).val();
           $.ajax({  
                url:"date1.php",
                method:"POST",  
                data:{date:date},  
                success:function(data){  
                     $('#time').html(data);  
                }  
           });  
      });  
 });
</script>

<div id="time">
</div>
<?php
}
}
?>

</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-send"></i> Submit</button>
</div>
</div>
</div>
</div>
