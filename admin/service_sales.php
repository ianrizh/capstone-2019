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
<b>SERVICES</b>
</h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header with-border">
<div class="pull-right">
<form method="POST" class="form-inline" action="sales_print.php">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
</div>
<button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><span class="glyphicon glyphicon-print"></span> Print</button>
</form>
</div>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered">
<thead>
<th class="hidden"></th>
<th>DATE</th>
<th>TRANSACTION NO.</th>
<th>SERVICE TYPE</th>
<th>TOTAL</th>
<th>FULL DETAILS</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT * FROM reservation where status = 'Paid' group by reservation_id");
$stmt->execute();
foreach($stmt as $row){
$reservation_id = $row['reservation_id'];
$pay_date = $row['pay_date'];
$total = $row['total'];
$id_services = $row['id_services'];
$r_type = $row['r_type'];
$stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$id_services'");
$stmt->execute();
foreach($stmt as $row5){
}
if($id_services == "0"){
$name = ' Veterinary Health Care';
}
else{
$name = $row5['name'];
}
echo "
<tr>
<td class='hidden'></td>
<td>".date('M d, Y', strtotime($pay_date))."</td>";
if($id_services == '0'){
echo "<td>VHC_0".$reservation_id."</td>";
}
elseif(strstr($name, "Boarding") !== FALSE){
echo "<td>BRDNG_0".$reservation_id."</td>";
}
else{
echo "<td>GRMMNG_0".$reservation_id."</td>";
}
echo "
<td>".$r_type."</td>
<td>&#8369; ".number_format($total, 2)."</td>
<td><button type='button' class='btn btn-info btn-sm btn-flat service' data-id='".$reservation_id."'><i class='fa fa-search'></i> View</button></td>
</tr>
";
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
<?php include '../includes/modal_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<!-- Date Picker -->
<script>
$(function(){
//Date picker
$('#datepicker_add').datepicker({
autoclose: true,
format: 'yyyy-mm-dd'
})
$('#datepicker_edit').datepicker({
autoclose: true,
format: 'yyyy-mm-dd'
})

//Timepicker
$('.timepicker').timepicker({
showInputs: false
})

//Date range picker
$('#reservation').daterangepicker()
//Date range picker with time picker
$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
//Date range as a button
$('#daterange-btn').daterangepicker(
{
ranges   : {
'Today'       : [moment(), moment()],
'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
'Last 30 Days': [moment().subtract(29, 'days'), moment()],
'This Month'  : [moment().startOf('month'), moment().endOf('month')],
'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
},
startDate: moment().subtract(29, 'days'),
endDate  : moment()
},
function (start, end) {
$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
}
)

});
</script>
<script>
$(function(){
$(document).on('click', '.service', function(e){
e.preventDefault();
$('#service').modal('show');
var reservation_id = $(this).data('id');
$.ajax({
type: 'POST',
url: 'transact1.php',
data: {reservation_id:reservation_id},
dataType: 'json',
success:function(response){
$('#pay_date').html(response.pay_date);
$('#transid1').html(response.transaction);
$('#detail1').prepend(response.list);
$('#total1').html(response.total);
}
});
});

$("#service").on("hidden.bs.modal", function () {
$('.prepend_items').remove();
});
});
</script>
</body>
</html>
