<?php include 'includes/session.php'; ?>

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
$stmt = $conn->prepare("SELECT * FROM pets WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
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
<th>DATE</th>
<th>AMOUNT</th>
<th>STATUS</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
foreach($stmt as $row1){
$user_pets_id = $row1['user_pets_id'];
$id_pet = $row1['id_pet'];
$stmt=$conn->prepare("select * from reservation where user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $row2){
$thedate = $row2['thedate'];
$reservation_id = $row2['reservation_id'];
$time = $row2['time_reservation'];
$total = $row2['total'];
$status = $row2['status'];
$id_services = $row2['id_services'];
					if($s_id == "0"){
						$name = ' Veterinary Health Care';
					}
					else{
						$name = $row5['name'];
					}
echo "
<tr>";
if(strstr($name, "Boarding") !== FALSE){
echo "<td>BRDNG_0".$reservation_id."</td>";
}
else{
echo "<td>GRMMNG_0".$reservation_id."</td>";
}
echo "</td>
<td>".date('M. d, Y', strtotime($thedate))." <br> ".$time."</td>
<td>&#8369; ".number_format($total,2)."</td>
<td>".$status."</td>
</tr>
";
}
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