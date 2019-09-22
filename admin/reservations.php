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

$stmt = $conn->prepare("SELECT * FROM reservation where id_services = '0' group by status");
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
$stmt = $conn->prepare("SELECT * FROM reservation where id_services = '0'");
$stmt->execute();
foreach($stmt as $row){
$reservation_id = $row['reservation_id'];
$date = $row['thedate'];
$time = $row['time_reservation'];
$s_id = $row['id_services'];
$user_pets_id = $row['user_pets_id'];
$r_type = $row['r_type'];
		$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
		$stmt->execute();
		foreach($stmt as $row1){
		$id_cust = $row1['id_cust'];
		$id_pet = $row1['id_pet'];
			$stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
			$stmt->execute();
			foreach($stmt as $pet){
			$pet_name = $pet['pet_name'];
				$stmt = $conn->prepare("SELECT * FROM users where id_cust = '$id_cust'");
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
<td>".$r_type."</td>
<td>".$row['status']."</td>
<td> ";?>
<?php
if($row['status'] == 'Pending'){
echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-edit'></i> Confirmation</button> ";
}
elseif($row['status'] == 'Waiting' &&  $r_type == 'Walkin'){
echo "<button class='btn btn-success btn-sm edit1 btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-edit'></i> Change Status</button> ";
}
else{
}
?>
<?php 
if($row['status'] == 'Confirm' || $row['status'] == 'On Process'){
echo "<button class='btn btn-primary btn-sm findings btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-clipboard'></i> Findings</button> ";
}
else {
echo "<button class='btn btn-primary btn-sm findings btn-flat' data-id='".$row['reservation_id']."' disabled><i class='fa fa-clipboard'></i> Findings</button> "; }?>
<?php echo "<a href='history1.php?user=".$row['user_pets_id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i> History</a>
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
<?php include 'includes/reservations_new.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){

$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var reservation_id = $(this).data('id');
getRow(reservation_id);
});

$(document).on('click', '.edit1', function(e){
e.preventDefault();
$('#edit1').modal('show');
var reservation_id = $(this).data('id');
getRow(reservation_id);
});

$(document).on('click', '.findings', function(e){
e.preventDefault();
$('#findings').modal('show');
var reservation_id = $(this).data('id');
getRow(reservation_id);
getRow2(reservation_id);
});

$('#select_category').change(function(){
	if ($('#select_category').find(":selected").val()=='0'){
      getRow3();
	}
else if ($('#select_category').find(":selected").val()=='On Process'){
		  getRow3('On Process');
	}
else if ($('#select_category').find(":selected").val()=='Pending'){
		  getRow3('Pending');
	}
else if ($('#select_category').find(":selected").val()=='Waiting'){   
	    	getRow3('Waiting');
  }
else if ($('#select_category').find(":selected").val()=='Process Done'){             
		    getRow3('Process Done');
	}
else if ($('#select_category').find(":selected").val()=='Confirm'){             
		    getRow3('Confirm');
	}
else if ($('#select_category').find(":selected").val()=='Decline'){             
		    getRow3('Decline');
  }
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

function getRow3(status=''){
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
