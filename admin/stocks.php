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
<b>EXPIRED PRODUCTS</b>
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
<!--<div class="box-header with-border">
<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New Product</a>
</div>-->
<div class="box-body">
	<table id="example1" class="table table-bordered">
		<thead>
			<!--th width="15"></th-->
			<th>PRODUCT NAME</th>
			<th>BATCH NUMBER</th>
			<th>EXPIRATION DATE</th>
		</thead>
		<tbody>
			<?php
				$conn = $pdo->open();

				try{
					$now = date('Y-m-d');
					
					$stmt = $conn->prepare("
						SELECT
							p.name,
							se.batch_number,
							se.expired_date
						FROM
							stocks_expired se
						LEFT JOIN
							products p
						ON
							se.id_products = p.id_products

						WHERE
							se.expired_flag = 1

						ORDER BY 
							se.id_products, se.batch_number
					");
					
					$stmt->execute();
			?>
			<?php foreach($stmt as $row): ?>
				<tr>
					<!--td><input type="checkbox" /></td-->
					<td><?= $row['name'] ?></td>
					<td><?= $row['batch_number'] ?></td>
					<td><?= date('M. d, Y', strtotime($row['expired_date'])) ?></td>
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
<?php include 'includes/footer.php'; ?>
<?php include 'includes/stocks_modal.php'; ?>
<?php include 'includes/stocks_modal1.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
$(document).on('click', '.edit1', function(e){
e.preventDefault();
$('#edit1').modal('show');
var id_stocks_expired = $(this).data('id');
getRow(id_stocks_expired);
});

$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var id_stocks_expired = $(this).data('id');
getRow(id_stocks_expired);
});

$(document).on('click', '.delete', function(e){
e.preventDefault();
$('#delete').modal('show');
var id_stocks_expired = $(this).data('id');
getRow(id_stocks_expired);
});

$("#addnew").on("hidden.bs.modal", function () {
$('.append_items').remove();
});

$("#edit").on("hidden.bs.modal", function () {
$('.append_items').remove();
});

});

function getRow(id_stocks_expired){
$.ajax({
type: 'POST',
url: 'expired_row.php',
data: {id_stocks_expired:id_stocks_expired},
dataType: 'json',
success: function(response){
$('.id_stocks_expired').val(response.id_stocks_expired);
$('#edit_id_products').val(response.id_products);
$('#catselected').val(response.id_products).html(response.name);
$('.edit_expired_date').val(response.expired_date);
$('.edit_stocks').val(response.stocks);
}
});
}
</script>
</body>
</html>
