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
<b>STOCKS</b>
</h1>
</section>

<!-- Main content -->
<section class="content">

<!-- ALERT CONTAINER -->
<div id="alert_container"></div>

<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-body">
	<table id="example1" class="table table-bordered">
		<thead>
			<th>PRODUCT NAME</th>
			<th width="100px">TOOLS</th>
		</thead>
		<tbody>
		<?php
			$conn = $pdo->open();

			try{
				$now = date('Y-m-d');
				
				$stmt = $conn->prepare("
					SELECT
						se.id_products,
						p.name
					FROM
						stocks_expired se
					LEFT JOIN products p
						ON se.id_products = p.id_products
					GROUP BY
						p.id_products
				");
				
				$stmt->execute();
			?>
			<?php foreach($stmt as $row): ?>
				<tr>
					<td><?= $row['name'] ?></td>
					<td>
						<!--button class="btn btn-success btn-sm edit btn-flat" data-id="<?= $row['id_products'] ?>" data-toggle="modal" data-target="#edit">
							<i class='fa fa-edit'></i> Edit
						</button-->
						<button class="btn btn-block btn-primary btn-sm view btn-flat" data-id="<?= $row['id_products'] ?>">
							<i class='fa fa-eye'></i> VIEW
						</button>
					</td>
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
<?php include 'includes/expired_modal.php'; ?>
<?php include 'includes/expired_modal2.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

	// $(document).on('click', '.edit', function(e){
	// e.preventDefault();
	// $('#edit').modal('show');
	// var id_stocks_expired = $(this).data('id');
	// getRow(id_stocks_expired);
	// });

	$('.view').click(function(){
		var productid = $(this).data('id');
		$.ajax({
			url			 : 'expired_products_batch.php',
			method	 : 'POST',
			data 		 : { id_products : productid },
			dataType : 'HTML',
			success  : function(result){
									$('tbody','#view').empty().append(result);
									$('#product_batch').DataTable();
									$('#view').modal('show');
								}
		});
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
<script type="text/javascript">
	 $('#btn_addstock').click(function(){
       
      var row = $('#name').last();
      var newrow = row.clone(row);
      var tbody = row.closest('div');
      tbody.append(row);
      $('input',newrow).val(''); 
    });
</script>
</body>
</html>
