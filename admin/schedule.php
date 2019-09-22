
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
<b>SCHEDULE</b>
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
<button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#clinic"><i class="fa fa-plus"></i> Clinic</button>
<button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#services"><i class="fa fa-plus"></i> Services</button>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered">
<thead>
<th>TYPE</th>
<th>DATE</th>
<th>TIME</th>
<th>STATUS</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();

try{
$stmt=$conn->prepare("select * from doctor where status = 'Not Available'");
$stmt->execute();
foreach($stmt as $row){
$doctor_id = $row['doctor_id'];
$time_id = $row['time_id'];
$date = $row['date'];
$status = $row['status'];
$stmt=$conn->prepare("select * from time where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows){
$time_reservation = $rows['time_reservation'];
$schedule_id = $rows['schedule_id'];
$stmt=$conn->prepare("select * from schedule where schedule_id = '$schedule_id'");
$stmt->execute();
foreach($stmt as $row1){
$id_type = $row1['id_type'];
$stmt=$conn->prepare("select * from type where id_type = '$id_type'");
$stmt->execute();
foreach($stmt as $row1){
$type = $row1['type'];
echo "
<tr>
<td>".$type."</td>
<td>".date('M. d, Y', strtotime($date))."</td>
<td>".$time_reservation."</td>
<td>".$status."</td>
<td>
<button class='btn btn-success btn-sm edit btn-flat' data-id='".$doctor_id."'><i class='fa fa-edit'></i> Available</button>
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

<!-- Modal -->
<div class="modal fade" id="clinic" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content"	>
<div class="modal-header">
<h4 class="modal-title"><b>CLINIC</b></h4>
</div>
<div class="modal-body">
<form id="form" action="schedule_add.php" class="form-horizontal" method="post">
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Date</label>
<div class="col-sm-9">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
<input class="form-control" id="thedate" name="date" type="text" required/>
</div>
</div>
<script>
 $(document).ready(function(){  
      $('#thedate').change(function(){  
           var date = $(this).val();
           $.ajax({  
                url:"date.php",
                method:"POST",  
                data:{date:date},  
                success:function(data){  
                     $('#time').html(data);  
                }  
           });  
      });  
 });
</script>

<div id="day">
</div>

<div id="time">
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Disable</button>
</form>
</div>
</div>

</div>
</div>

<!-- Modal -->
<div class="modal fade" id="services" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>SERVICES</b></h4>
</div>
<div class="modal-body">
<form id="form1" action="schedule_add.php" class="form-horizontal" method="post">
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">Date</label>
<div class="col-sm-9">

<script>
$(function(){
var date = new Date();
var minDate = new Date(date.getFullYear(), date.getMonth(), date.getDate()+8);
$('#theDate').datepicker({
dateFormat: 'yy-mm-dd',
minDate: minDate,
beforeShowDay: $.datepicker.Weekends
});

});
</script>
<input class="form-control" id="theDate" name="date" type="text" required/>
</div>
</div>
<script>
$(document).ready(function(){  
$('#theDate').change(function(){  
var date = $(this).val();
$.ajax({  
url:"date1.php",
method:"POST",  
data:{date:date},  
success:function(data){  
$('#time1').html(data);  
}  
});  
});  
});
</script>

<div id="day1">
</div>

<div id="time1">
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Disable</button>
</form>
</div>
</div>

</div>
</div>

</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/schedule_modal.php'; ?>
</div>
<!-- ./wrapper -->
<?php  include 'includes/scripts.php'; ?>
<script>
$(function(){
$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var doctor_id = $(this).data('id');
getRow(doctor_id);
getRow1(doctor_id);
getRow2(doctor_id);
});

$(document).on('click', '.delete', function(e){
e.preventDefault();
$('#delete').modal('show');
var time_id = $(this).data('id');
getRow(time_id);
});

});

function getRow(doctor_id){
  $.ajax({
    type: 'POST',
    url: 'schedule_row.php',
    data: {doctor_id:doctor_id},
    dataType: 'json',
    success: function(response){
      $('.date').val(response);
    }
  });
}
function getRow1(doctor_id){
  $.ajax({
    type: 'POST',
    url: 'schedule_row1.php',
    data: {doctor_id:doctor_id},
    dataType: 'json',
    success: function(response){
	  $('.time_reservation').val(response.time_reservation);
    }
  });
}
function getRow2(doctor_id){
  $.ajax({
    type: 'POST',
    url: 'schedule_row2.php',
    data: {doctor_id:doctor_id},
    dataType: 'json',
    success: function(response){
	  $('.doctor_id').val(response.doctor_id);
    }
  });
}


</script>
</body>
</html>
