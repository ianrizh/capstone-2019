<table id="example1" border="1">
<thead>
<th>DATE</th>
<th>NO. OF CUSTOMERS</th>
<th>NO. OF SERVICE</th>
<th>STATUS</th>
<th>TOTAL</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php 
include 'includes/session.php';
$conn = $pdo->open();
$stmt =$conn->prepare("select * from reservation where status = 'Paid'");
$stmt->execute();
foreach($stmt as $row){
echo $user_pets_id = $row['user_pets_id'];	

$stmt = $conn->prepare("select * from user_pets where user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $row1){
echo $id_cust = $row1['id_cust'];

$count = 0;
$stmt1=$conn->prepare("SELECT distinct $id_cust, COUNT(distinct $id_cust) AS numrows FROM reservation where status = 'Paid'	");
$stmt1->execute();
$a = $stmt1 -> fetch();
$count = $a['numrows'];

echo "
<tr>
<td>".$count."</td>
</tr>
";
}
}
?>
</tbody>
</table>
<?php include 'includes/header.php'; ?>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/payment.php'; ?>
<?php include 'includes/payment1.php'; ?>
<script>
$(function(){

$(document).on('click', '.edit1', function(e){
e.preventDefault();
$('#edit1').modal('show');
var reservation_id = $(this).data('id');
getRow3(reservation_id);
getRow1(reservation_id);
});

$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var reservation_id = $(this).data('id');
getRow(reservation_id);
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
	  $('.id_services').val(response.id_services);
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
	  $('.id_services').val(response.id_services);
	  $('.status').val(response.status);
	  $('.total').val(response.total);
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
