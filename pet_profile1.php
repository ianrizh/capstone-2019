<?php include 'includes/session.php'; 
$conn = $pdo->open();

$id_pet = $_GET['pet'];

try{
$stmt = $conn->prepare("SELECT *, pets.pet_name AS pet_name, pets.id_pet AS id_pet FROM pets LEFT JOIN user_pets ON user_pets.id_pet=pets.id_pet WHERE pets.id_pet = :id_pet");
$stmt->execute(['id_pet' => $id_pet]);
$pet = $stmt->fetch();

}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>

<div class="content-wrapper">
<div class="container">

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-9">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='callout callout-danger'>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
echo "
<div class='callout callout-success'>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>
<div class="box box-solid">
<div class="box-body">
<div class="col-sm-3">
<img src="<?php echo 'images/pet.png'; ?>" width="100%">
</div>
<div class="col-sm-9">
<div class="row">
<div class="col-sm-3">
<h4>Pet Name:</h4>
<h4>Pet Type:</h4>
<h4>Pet Breed:</h4>
<h4>Pet Gender:</h4>
</div>
<?php
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet=:id_pet");
$stmt->execute(['id_pet'=>$_GET['pet']]);
foreach($stmt as $row){
$name = $row['pet_name'];
$type = $row['pet_type'];
$breed = $row['pet_breed'];
$gender = $row['pet_gender'];
?>
<div class="col-sm-9">
<h4><?php echo $name; ?>
<span class="pull-right">
<!--<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>-->
</span>
</h4>
<h4><?php echo (!empty($type)) ? $type : 'N/A'; ?></h4>
<h4><?php echo (!empty($breed)) ? $breed : 'N/A'; ?></h4>
<h4><?php echo (!empty($gender)) ? $gender : 'N/A'; ?></h4>
</div>
<?php
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
?>
</div>
</div>
</div>
</div>
<div class="box box-solid">
<div class="box-header with-border">
<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Transaction History</b></h4>
</div>
<div class="box-body">
<table class="table table-bordered" id="example1">
<thead>
<th>TRANSACTION NO.</th>
<th>RESERVATION DATE AND TIME</th>
<th>STATUS</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();
try{
$stmt=$conn->prepare("select * from pets where id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row1);
$id_pet = $row1['id_pet'];
$stmt=$conn->prepare("select * from user_pets where id_pet=:id_pet");
$stmt->execute(['id_pet'=>$_GET['pet']]);
foreach($stmt as $row2);
$user_pets_id = $row2['user_pets_id'];
$stmt=$conn->prepare("select * from reservation where user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $row3){
$reservation_id = $row3['reservation_id'];
$thedate = $row3['thedate'];
$time_reservation = $row3['time_reservation'];
$status = $row3['status'];
$id_services = $row3['id_services'];
echo "
<tr>
<td>";
if($id_services == "0"){
echo "VHC_0".$reservation_id;
}
else{
echo "GMMNG_0".$reservation_id;
}
echo "</td>
<td>".date('M. d, Y', strtotime($thedate))." <br> ".$time_reservation."</td>
<td>".$status."</td>
<td></td>
</tr>
";
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-sm-3">
<?php include 'includes/sidebar.php'; ?>
</div>
</div>
</section>

</div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
$(document).on('click', '.transact', function(e){
e.preventDefault();
$('#transaction').modal('show');
var id = $(this).data('id');
$.ajax({
type: 'POST',
url: 'transaction.php',
data: {id:id},
dataType: 'json',
success:function(response){
$('#date').html(response.date);
$('#transid').html(response.transaction);
$('#detail').prepend(response.list);
$('#total').html(response.total);
}
});
});

$("#transaction").on("hidden.bs.modal", function () {
$('.prepend_items').remove();
});
});
</script>
</body>
</html>