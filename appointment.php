<?php include 'includes/session.php'; 
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
include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php include 'includes/navbar.php'; ?>
<div class="content-wrapper">
<div class="container">
<!-- Main content -->
<?php
if($service['category']=='Boarding')
{
echo '
<section class="content">
<div class="row">
<div class="col-sm-9">
<h1 class="page-header" style="text-transform:uppercase; font-weight:bold; color:#efb74e">'.$service['name'].'</h1>';?>
<i class='fa fa-paw'></i> Stella's Animal Clinic requires that all vaccinations are current. Proof of vaccination must be provided before your pet(s) will be accepted for boarding.<br>
<i class='fa fa-paw'></i> <b>FINANCIAL POLICY:</b> Payment is due as services are rendered. Please feel free to ask for an estimate prior to providing services. If at any time you are not satisfied with our service, please let us know. We Will be happy to answer your questions.
<br>
<br>
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Ooops!</h4>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-check'></i> Success!</h4>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>
<div class="col-lg-12">
<div class="box box-solid">
<form id="form1" action="appointment_add2.php" class="form-horizontal" method="post">
<?php
$stmt=$conn->prepare("select * from services where id_services = :id_services");
$stmt->execute(['id_services'=>$_GET['service']]);
foreach($stmt as $srvc){
$id_services = $srvc['id_services'];
echo "<input type='hidden' name='id_services' value='".$id_services."' readonly>";
}
?>
<?php 

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row){
$id_cust = $row['id_cust'];
$user = $row['firstname'] ." ". $row['lastname'];
$address = $row['home'];
$number = $row['contact'];
$email = $row['email'];
?>
<input type="hidden" class="form-control" id="full_name" name="full_name" value="<?php echo $user; ?>" readonly>
<input type="hidden" class="form-control" id="address" name="address" value="<?php echo $address; ?>" readonly>
<input type="hidden" class="form-control" id="contact" name="contact" autocomplete="off" value="<?php echo $number; ?>" readonly>
<input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
<?php
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
// echo '<pre>';
// print_r($id_cust);
// echo '</pre>';
?>

<div class="box-header with-border">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-paw"></i> PET'S INFO</b></h3>
</div>
<div class="box-body">
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Pet Name</label>
<div class="col-sm-9">
<select class="form-control" id="user_pets_id" name="user_pets_id" onChange="onSelect(this.value)" required>
<option value="" disabled selected required>---Select---</option>
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
<option value='$user_pets_id'>".$crows['pet_name']."</option>
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
</div>
</div>
<div id="details">
</div>
<script>
 function onSelect(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details").innerHTML=this.responseText;
	}
	a.open('GET', "details.php?user_pets_id="+str,true);
	a.send();
 }
</script>
</div>

<div class="box-header with-border">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-clock-o"></i> DATE AND TIME</b></h3>
</div>
<div class="box-body">

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
        maxDate: "+14",
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
</div>
<button type="submit" class="btn btn-success btn-flat" name="add" style="width:100%"><i class="fa fa-send"></i> Submit</button>
</form>
</div>
</div>
</div>
<?php
}
else{
echo '
<section class="content">
<div class="row">
<div class="col-sm-9">
<h1 class="page-header" style="text-transform:uppercase; font-weight:bold; color:#efb74e">'.$service['name'].'</h1>';?>
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Ooops!</h4>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-check'></i> Success!</h4>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>
<div class="col-lg-12">
<div class="box box-solid">
<form id="form1" action="appointment_add1.php" class="form-horizontal" method="post">
<?php
$stmt=$conn->prepare("select * from services where id_services = :id_services");
$stmt->execute(['id_services'=>$_GET['service']]);
foreach($stmt as $srvc){
$id_services = $srvc['id_services'];
echo "<input type='hidden' name='id_services' value='".$id_services."' readonly>";
}
?>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row){
$id_cust = $row['id_cust'];
$user = $row['firstname'] ." ". $row['lastname'];
$address = $row['home'];
$number = $row['contact'];
$email = $row['email'];
?>
<input type="hidden" class="form-control" id="full_name" name="full_name" value="<?php echo $user; ?>" readonly>
<input type="hidden" class="form-control" id="address" name="address" value="<?php echo $address; ?>" readonly>
<input type="hidden" class="form-control" id="contact" name="contact" autocomplete="off" value="<?php echo $number; ?>" readonly>
<input type="hidden" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
<?php
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
?>

<div class="box-header with-border">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-paw"></i> PET'S INFO</b></h3>
</div>
<div class="box-body">
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Pet Name</label>
<div class="col-sm-9">
<select class="form-control" id="user_pets_id" name="user_pets_id" onChange="onSelect(this.value)" required>
<option value="" disabled selected required>---Select---</option>
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
<option value='$user_pets_id'>".$crows['pet_name']."</option>
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
</div>
</div>
<div id="details">
</div>
<script>
 function onSelect(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details").innerHTML=this.responseText;
	}
	a.open('GET', "details.php?user_pets_id="+str,true);
	a.send();
 }
</script>
</div>

<div class="box-header with-border">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-clock-o"></i> DATE AND TIME</b></h3>
</div>
<div class="box-body">
<input type="hidden" id="date22" value="<?php echo $id_services; ?>">
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
        maxDate: "+14",
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
           var date2 = $('#date22').val();  
      
           $.ajax({  
                url:"date2.php",
                method:"POST",  
                data:{date:date,date2:date2},  
                success:function(data){  
                     $('#time').html(data);  
                }  
           });
          
             
      });  
 });
</script>

<div id="time">
</div>
</div>
<button type="submit" class="btn btn-success btn-flat" name="add" style="width:100%"><i class="fa fa-send"></i> Submit</button>
</form>
</div>
</div>
</div>
<?php
}
?>
<div class="col-sm-3">
<?php include 'includes/sidebar.php'; ?>
</div>
</div>
</section>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>