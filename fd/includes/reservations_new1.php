<div class="modal fade" id="edit1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">Confirmation</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="confirmation1.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<select name="status" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select Confirmation---</option>
<option value="Confirm">Confirm Reservation</option>
<option value="Decline">Decline Reservation</option>
</select>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check"></i> Submit</button>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade" id="grooming_modal">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">EDIT STATUS</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="cnf.php">
<input type="hidden" class="reservation_id" id="reservation_id" />
<input type="hidden" class="price" id="s_price" />
<div id="insufficiientproducts_container"></div>
<select id="status" class="form-control" id="dropdown_confirmation1" style="width:100%;" required>
<option value="" disabled selected required>---Select Status---</option>
<option value="On Process">On Process</option>
<option value="Process Done">Process Done</option>
</select>
<br>
<input type="checkbox" id="grooming_products_toggle" disabled/> <strong>Add product(s) used</strong>
<div class="container-fluid" id="grooming_products" style="display:none">
	<table class="table" id="grooming_table">
		<thead>
			<tr>
				<th style="text-align:center">PRODUCT</th>
				<th style="text-align:center">QUANTITY</th>
				<th style="text-align:center">PRICE</th>
				<th style="text-align:center">AMOUNT</th>
				<th style="text-align:center"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<select class="form-control grooming_product">
						<option value="" disabled selected required>---Select---</option>
						<?php
						$conn = $pdo->open();

						try {
						$stmt = $conn->prepare("SELECT * FROM products where deleted_date = '0000-00-00'");
						$stmt->execute();
						?>
						<?php foreach($stmt as $row): ?>
						<option value="<?= $row['id_products'] ?>" data-price="<?= $row['price'] ?>"><?= $row['name'] ?></option>
						<?php endforeach; ?>
						<?php
						}
						catch(PDOException $e){
						echo $e->getMessage();
						}

						$pdo->close();
						?>
					</select>
				</td>
				<td>
					<input type="text" class="form-control text-right grooming_quantity" />
				</td>
				<td>
					<input type="text" class="form-control text-right grooming_price" readonly/>
				</td>
				<td>
					<input type="text" class="form-control text-right grooming_amount" readonly/>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn_deleterow">X</button>
				</td>
			</tr>
		</tbody>
	</table>
	<button type="button" class="btn btn-primary btn-sm btn-flat" id="grooming_addproduct" style="margin-left:8px"><i class="fa fa-plus"></i> ADD PRODUCT</button>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="button" class="btn btn-success btn-flat" id="grooming_submit"><i class="fa fa-check"></i> Submit</button>
</form>
</div>
</div>
</div>
</div>