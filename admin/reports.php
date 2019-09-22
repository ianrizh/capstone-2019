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
<b>REPORTS</b>
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
					<div class="pull-right">
						<!--form method="POST" class="form-inline" action="sales_print.php"-->
							<!--div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
							</div-->
							<button type="button" class="btn btn-primary btn-sm btn-flat float-right" name="print" data-toggle="modal" data-target="#modal_reportpreview">
								<span class="glyphicon glyphicon-print"></span> Print Preview
							</button>
						<!--/form-->
					</div>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered">
						<thead>
							<tr>
								<th>PRODUCT NAME</th>
								<th>CATEGORY</th>
								<th>PRICE</th>
								<th>STOCKS</th>
								<th>BATCH</th>
								<th>EXPIRATION DATE</th>
								<th>STOCK DATE</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$conn = $pdo->open();

								try{
									$stmt=$conn->prepare("
										SELECT
											p.name,
											c.category,
											p.price,
											se.stocks,
											se.batch_number,
											se.expired_date,
											se.date_added
										FROM
											stocks_expired se
										LEFT JOIN products p
											ON se.id_products = p.id_products
										LEFT JOIN category c
											ON p.id_category = c.id_category
										WHERE
											se.date_added = DATE_FORMAT(CURRENT_DATE(),'%Y-%m-%d')
									");

									$stmt->execute();
							?>
							<?php foreach($stmt as $row): ?>
								<tr>
									<td><?= $row['name'] ?></td>
									<td><?= $row['category'] ?></td>
									<td><?= $row['price'] ?></td>
									<td><?= $row['stocks'] ?></td>
									<td><?= $row['batch_number'] ?></td>
									<td><?= $row['expired_date'] ?></td>
									<td><?= $row['date_added'] ?></td>
								</tr>
							<?php endforeach; ?>
							<?php
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
<?php include 'includes/reports_modal.php'; ?>
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
var id = $(this).data('id');
$.ajax({
type: 'POST',
url: 'transact.php',
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
