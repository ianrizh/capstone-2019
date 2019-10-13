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
<b>PRODUCTS</b>
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
<th>ORDER ID</th>
<th>TOTAL</th>
<th>FULL DETAILS</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();

try{
	$stmt = $conn->prepare("SELECT * FROM order_main");
	$stmt->execute();
	foreach($stmt as $row) {
		$order_id = $row['order_id'];
		$order_date = $row['order_date'];
		$total = $row['total'];
		echo "
			<tr>
				<td class='hidden'></td>
				<td>".date('M d, Y', strtotime($order_date))."</td>
				<td>ORDER_0".$order_id."</td>
				<td>&#8369; ".number_format($total, 2)."</td>
				<td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$order_id."' data-type='1'><i class='fa fa-search'></i> View</button></td>
			</tr>
		";
	}

	$stmt = $conn->prepare("
		SELECT r.reservation_id,r.type_id,r.thedate,rp.total FROM reservation r
		LEFT JOIN (SELECT reservation_id,SUM(amount) AS total FROM products_used GROUP BY reservation_id) rp
			ON r.reservation_id = rp.reservation_id
		WHERE r.s_price != r.total
	");
	$stmt->execute();
	foreach($stmt as $row) {
		if($row['type_id'] == 1) //Boarding
			$order_id = 'BRDNG_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);
		else if($row['type_id'] == 2) //Check-up
			$order_id = 'VHC_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);
		else if($row['type_id'] == 3) //Grooming
			$order_id = 'GRMMNG_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);

		$order_date = $row['thedate'];
		$total = $row['total'];
		echo "
			<tr>
				<td class='hidden'></td>
				<td>".date('M d, Y', strtotime($order_date))."</td>
				<td>".$order_id."</td>
				<td>&#8369; ".number_format($total, 2)."</td>
				<td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['reservation_id']."' data-type='2'><i class='fa fa-search'></i> View</button></td>
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
<?php include '../includes/profile_modal.php'; ?>

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
$(document).on('click', '.transact', function(e){
e.preventDefault();
$('#transaction').modal('show');
var order_id = $(this).data('id'),
	order_type = $(this).data('type');
$.ajax({
type: 'POST',
url: 'transact.php',
data: {order_id:order_id, order_type:order_type},
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
