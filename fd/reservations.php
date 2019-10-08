<?php include 'includes/session.php'; ?>
<?php
  if(isset($_GET['status'])){
    $status = $_GET['status'];
    $where = $status;
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
<section class="content-header">
<h1 style="text-transform:uppercase; font-weight:bold">
Reservations
</h1>
</section>

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
<div class="pull-left">
<form class="form-inline">
<div class="form-group">
<label>Status: </label>
<select class="form-control input-sm" id="select_category">
<option value="0">ALL</option>
<?php
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM reservation where id_services != '0' group by status");
$stmt->execute();

foreach($stmt as $crow){
$selected = ($crow['status'] == $status) ? 'selected' : ''; 
echo "
<option value='".$crow['status']."' ".$selected.">".$crow['status']."</option>
";
}

$pdo->close();
?>
</select>
</div>
</form>
</div>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered">
<thead>
<th>TRANSACTION NO.</th>
<th>NAME</th>
<th>PET NAME</th>
<th>SERVICE NAME</th>
<th>DATE AND TIME</th>
<th>TYPE</th>
<th>STATUS</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();

try{
$now = date('Y-m-d');
$stmt = $conn->prepare("SELECT * FROM reservation WHERE id_services != '0' order by reservation_id desc");
$stmt->execute();
foreach($stmt as $row3){
$reservation_id = $row3['reservation_id'];
$date = $row3['thedate'];
$time = $row3['time_reservation'];
$s_id = $row3['id_services'];
$r_type = $row3['r_type'];
$user_pets_id = $row3['user_pets_id'];

		$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'  order by user_pets_id DESC");
		$stmt->execute();
		foreach($stmt as $row4){
		$id_cust = $row4['id_cust'];
		$id_pet = $row4['id_pet'];
			$stmt = $conn->prepare("SELECT * FROM pets WHERE id_pet = '$id_pet' ORDER BY id_pet DESC");
			$stmt->execute();
			foreach($stmt as $pet1){
			$pet_name = $pet1['pet_name'];
				$stmt = $conn->prepare("SELECT * FROM users where id_cust = '$id_cust' order by id_cust DESC");
				$stmt->execute();
				foreach($stmt as $rowsss){
				$fullname = $rowsss['firstname']. ' ' .$rowsss['lastname'];
					$stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$s_id'
						order by id_services DESC");
					$stmt->execute();
					foreach($stmt as $row5){
					}
					if($s_id == "0"){
						$name = ' Veterinary Health Care';
					}
					else{
						$name = $row5['name'];
					}

if(strstr($name, "Boarding") !== FALSE){

$transacno="BRDNG_0$reservation_id";

}
else{
	$transacno="GRMMNG_0$reservation_id";

}
echo "
<tr>";
echo "
<td>".$transacno."</td>
<td>".$fullname."</td>
<td>".$pet_name."</td>
<td>".$name."</td>
<td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
<td>".$r_type."</td>
<td>".$row3['status']."</td>
<td> ";?>
<?php
if($row3['status'] == 'Pending'){
echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='".$row3['reservation_id']."'><i class='fa fa-edit'></i> Confirmation</button>";
}
elseif($row3['status'] == 'Confirm' || $row3['status'] == 'On Process'){	
	if(strstr($name, "Boarding") !== FALSE){
		echo "<button class='btn btn-success btn-sm edit5 btn-flat' data-id='".$row3['reservation_id']."'><i class='fa fa-edit'></i> Edit</button> ";
	}
	else{
echo "<button class='btn btn-success btn-sm edit4 btn-flat' data-id='".$row3['reservation_id']."'><i class='fa fa-edit'></i> Edit</button> ";
	}
}
else{
echo "<button class='btn btn-success btn-sm edit4 btn-flat' data-id='".$row3['reservation_id']."' disabled><i class='fa fa-edit'></i> Edit</button> ";
}
?>
<?php echo "
</td>
</tr>
";
}
}
}
}
}
catch(PDOException $e){
echo $e->getMessage();
}

$pdo->close();
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
<?php include 'includes/reservations_new1.php'; ?>
<?php include 'includes/reservations_new3.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var reservation_id = $(this).data('id');
getRow3(reservation_id);
});

$(document).on('click', '.edit4', function(e){
e.preventDefault();
$('#grooming_modal').modal('show');
var reservation_id = $(this).data('id');
getRow3(reservation_id);
getRow1(reservation_id);
});

$(document).on('click', '.edit5', function(e){
e.preventDefault();
$('#edit5').modal('show');
var reservation_id = $(this).data('id');
getRow3(reservation_id);
getRow1(reservation_id);
});

$('#select_category').change(function(){
	if ($('#select_category').find(":selected").val()=='0'){
      getRow9();
	}
else if ($('#select_category').find(":selected").val()=='On Process'){
		  getRow9('On Process');
	}
else if ($('#select_category').find(":selected").val()=='Pending'){
		  getRow9('Pending');
	}
else if ($('#select_category').find(":selected").val()=='Waiting'){   
	    	getRow9('Waiting');
  }
else if ($('#select_category').find(":selected").val()=='Process Done'){             
		    getRow9('Process Done');
	}
else if ($('#select_category').find(":selected").val()=='Confirm'){             
		    getRow9('Confirm');
	}
else if ($('#select_category').find(":selected").val()=='Decline'){             
		    getRow9('Decline');
  }
else if ($('#select_category').find(":selected").val()=='Paid'){             
      getRow9('Paid');
}
  });

});


function getRow1(reservation_id){
$.ajax({
type: 'POST',
url: 'row1.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.price').val(response.price);
}
});
}
function getRow3(reservation_id){
  $.ajax({
    type: 'POST',
    url: 'row3.php',
    data: {reservation_id:reservation_id},
    dataType: 'json',
    success: function(response){
      $('.reservation_id').val(response.reservation_id);
	  $('.status').val(response.status);
	  $('.total').val(response.total);
    }
  });
}
function getRow5(reservation_id){
$.ajax({
type: 'POST',
url: 'row5.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.pet_size').val(response.pet_size);
}
});
}
function getRow6(reservation_id){
  $.ajax({
    type: 'POST',
    url: 'row6.php',
    data: {reservation_id:reservation_id},
    dataType: 'json',
    success: function(response){
      $('.reservation_id').val(response.reservation_id);
	  $('.status').val(response.status);
	  $('.total').val(response.total);
    }
  });
}
function getRow7(reservation_id){
$.ajax({
type: 'POST',
url: 'row7.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.price').val(response.price);
}
});
}
function getRow8(reservation_id){
$.ajax({
type: 'POST',
url: 'row8.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success: function(response){
$('.pet_size').val(response.pet_size);
}
});
}

function getRow9(status=''){
$.ajax({
type: 'POST',
url: 'reservation_query.php',
data: {status:status},
dataType: 'html',
success: function(response){
console.log(response);	
$('#example1 tbody').empty().html(response);
}
});
}

</script>
</body>
</html>
