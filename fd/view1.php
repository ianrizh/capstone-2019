<?php include 'includes/session.php'; ?>
<?php
if(!isset($_GET['bill'])){
header('location: history.php');
exit();
}
else{
$conn = $pdo->open();

$stmt = $conn->prepare("select reservation_id, user_pets_id, time_reservation, id_services, thedate, status, process_done, sum(total) as amount from 
(select reservation_id,user_pets_id,time_reservation,id_services,thedate,status,process_done,total,findings,prescription,products_used,qty,prod_price,amount_paid,sukli,pay_date from online_reservation where status = 'Process Done' 
union all 
select reservation_id,user_pets_id,time_reservation,id_services,thedate,status,process_done,total,null as findings,null as prescription,null as products_used,null as qty,null as prod_price,cash,_change,pay_date from online_reservation1 where status = 'Process Done')
t where thedate = :thedate");
$stmt->execute(['thedate'=>$_GET['bill']]);
$user = $stmt->fetch();

$pdo->close();
}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Error!</h4>
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
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header with-border">
<a href="suppliers.php" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Back</a>
</div>
<div class="box-body">
<table class="table table-bordered">
<thead>
<th>TRANSACTION NO.</th>
<th>DATE AND TIME</th>
<th>NAME</th>
<th>SERVICE</th>
<th>STATUS</th>
<th>TOTAL</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php 

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM online_reservation where status ='Process Done'");
$stmt->execute();
foreach($stmt as $row){
$reservation_id = $row['reservation_id'];
$date = $row['thedate'];
$time = $row['time_reservation'];
$s_id = $row['id_services'];
$user_pets_id = $row['user_pets_id'];
		$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
		$stmt->execute();
		foreach($stmt as $row1){
		$id_cust = $row1['id_cust'];
		$id_pet = $row1['id_pet'];
			$stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
			$stmt->execute();
			foreach($stmt as $pet){
			$pet_name = $pet['pet_name'];
				$stmt = $conn->prepare("SELECT * FROM customer where id_cust = '$id_cust'");
				$stmt->execute();
				foreach($stmt as $rowss){
				$fullname = $rowss['firstname']. ' ' .$rowss['lastname'];
					$stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$s_id'");
					$stmt->execute();
					foreach($stmt as $row2){
					}
					if($s_id == "0"){
						$name = ' Veterinary Health Care';
					}
					else{
						$name = $row2['name'];
					}
echo "
<tr>
<td>VHC_0".$reservation_id."</td>
<td>".$fullname."</td>
<td>".$pet_name."</td>
<td>".$name."</td>
<td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
<td>".$row['status']."</td>
<td> ";?>
<?php
echo"
</tr>
";
}
}
}
}
$stmt = $conn->prepare("SELECT * FROM online_reservation1 where status ='Process Done'");
$stmt->execute();
foreach($stmt as $row3){
$reservation_id = $row3['reservation_id'];
$date = $row3['thedate'];
$time = $row3['time_reservation'];
$s_id = $row3['id_services'];
$user_pets_id = $row3['user_pets_id'];
		$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
		$stmt->execute();
		foreach($stmt as $row4){
		$id_cust = $row4['id_cust'];
		$id_pet = $row4['id_pet'];
			$stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
			$stmt->execute();
			foreach($stmt as $pet1){
			$pet_name = $pet1['pet_name'];
				$stmt = $conn->prepare("SELECT * FROM customer where id_cust = '$id_cust'");
				$stmt->execute();
				foreach($stmt as $rowss1){
				$fullname = $rowss1['firstname']. ' ' .$rowss['lastname'];
					$stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$s_id'");
					$stmt->execute();
					foreach($stmt as $row5){
					}
					if($s_id == "0"){
						$name = ' Veterinary Health Care';
					}
					else{
						$name = $row5['name'];
					}
echo "
<tr>
<td>GRMMNG_0".$reservation_id."</td>
<td>".$fullname."</td>
<td>".$pet_name."</td>
<td>".$name."</td>
<td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
<td>".$row['status']."</td>
<td> ";?>
<?php
echo"
</tr>
";
}
}
}
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>

</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/payment.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var reservation_id = $(this).data('id');
getRow(reservation_id);
getRow2(reservation_id);
getRow4(reservation_id);
});

$(document).on('click', '.edit1', function(e){
e.preventDefault();
$('#edit1').modal('show');
var reservation_id = $(this).data('id');
getRow1(reservation_id);
getRow3(reservation_id);
getRow5(reservation_id);
getRow7(reservation_id);
});

$(document).on('click', '.receipt', function(e){
e.preventDefault();
$('#receipt').modal('show');
var reservation_id = $(this).data('id');
getRow(reservation_id);
getRow2(reservation_id);
getRow4(reservation_id);
getRow6(reservation_id);
});

$(document).on('click', '.receipt1', function(e){
e.preventDefault();
$('#receipt1').modal('show');
var reservation_id = $(this).data('id');
getRow1(reservation_id);
getRow3(reservation_id);
getRow5(reservation_id);
getRow7(reservation_id);
getRow8(reservation_id);
});

});

function getRow(reservation_id){
  $.ajax({
    type: 'POST',
    url: 'reservations_row.php',
    data: {reservation_id:reservation_id},
    dataType: 'json',
    success: function(response){
      $('.reservation_id').val(response.reservation_id);
	  $('.status').val(response.status);
	  $('.total').val(response.total);
	  $('.products_used').val(response.products_used);
	  $('.prod_price').val(response.prod_price);
	  $('.qty').val(response.qty);
	  $('.amount_paid').val(response.amount_paid);
	  $('.sukli').val(response.sukli);
    }
  });
}
function getRow1(reservation_id){
$.ajax({
type: 'POST',
url: 'reservations_row1.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.price').val(response.price);
$('.name').val(response.name);
}
});
}
function getRow2(reservation_id){
$.ajax({
type: 'POST',
url: 'reservations_row2.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.pet_size').val(response.pet_size);
}
});
}
function getRow3(reservation_id){
  $.ajax({
    type: 'POST',
    url: 'reservations_row3.php',
    data: {reservation_id:reservation_id},
    dataType: 'json',
    success: function(response){
      $('.reservation_id').val(response.reservation_id);
	  $('.status').val(response.status);
	  $('.total1').val(response.total);
	  $('.products_used').val(response.products_used);
	  $('.prod_price').val(response.prod_price);
	  $('.qty').val(response.qty);
	  $('.cash').val(response.cash);
	  $('._change').val(response._change);
    }
  });
}
function getRow7(reservation_id){
$.ajax({
type: 'POST',
url: 'reservations_row6.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.pet_size').val(response.pet_size);
}
});
}
function getRow4(reservation_id){
$.ajax({
type: 'POST',
url: 'reservations_row4.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.sname').val(response.name);
}
});
}
function getRow5(reservation_id){
$.ajax({
type: 'POST',
url: 'reservations_row5.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.sname').val(response.name);
}
});
}
function getRow6(reservation_id){
$.ajax({
type: 'POST',
url: 'user_row.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.fullname').val(response.firstname+' '+response.lastname);
$('.contact').val(response.contact);
$('.home').val(response.home);
}
});
}
function getRow8(reservation_id){
$.ajax({
type: 'POST',
url: 'user_row1.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.fullname').val(response.firstname+' '+response.lastname);
$('.contact').val(response.contact);
$('.home').val(response.home);
}
});
}
</script>	
</body>
</html>
