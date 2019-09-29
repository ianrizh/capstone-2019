<div class="modal fade" id="edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">Confirmation</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="confirmation.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<select name="status" id="dropdown_confirmation" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select---</option>
<option value="Confirm">Confirm Reservation</option>
<option value="Decline">Decline Reservation</option>
</select>
<br>
<div id="declinecontainer" style="display:none">
	<label>Reason: </label>
	<textarea class="form-control" id="editor1" name="decline_remarks" required></textarea>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check"></i> Submit</button>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade" id="edit1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">Change Status</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="change_status.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<select name="status" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select---</option>
<option value="On Process">On Process</option>
</select>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="edit1"><i class="fa fa-check"></i> Submit</button>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade" id="findings">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b style="text-transform:uppercase">Findings and Prescription</b></h4>
</div>
<div class="modal-body">

<input type="hidden" class="reservation_id" id="reservation_id" name="reservation_id" />
<input type="hidden" class="status" name="status" />
<input type="hidden" value="250.00" name="s_price" />
<div id="insufficiientproducts_container"></div>
<div class="form-group">
<label>Findings</label>
<div class="col-sm-12">
<textarea class="form-control" id="f" name="findings" autocomplete="off" required></textarea>
</div>
</div>
<div class="form-group">
<label>Prescription</label>
<div class="col-sm-12">
<textarea class="form-control" id="p" name="prescription" autocomplete="off" required></textarea>
</div>
</div>
<div class="container-fluid">
	<table class="table" id="tbl_stock" style="margin:0">
	  <thead>
		<tr>
		  <th style="text-align:center;">PRODUCT</th>
		  <th style="text-align:center">PRICE</th>
		  <th style="text-align:center">QUANTITY</th>
		  <th style="text-align:center"></th>
		</tr>
	  </thead>
	  <tbody>
		<tr>
		  <td>
			<div class="form-group">
			  <select class="form-control order_product" style="width:100%" autocomplete="off" required>
				<option value="" disabled selected required>---Select---</option>
				<?php 
				$conn = $pdo->open();
				
				try {
				$stmt = $conn->prepare("SELECT * FROM products where deleted_date = '0000-00-00'");
				$stmt->execute();
				?>
				<?php foreach($stmt as $row): ?>
				<option value="<?= $row['name'] ?>" data-price="<?= $row['price'] ?>" data-productid="<?= $row['id_products'] ?>"><?= $row['name'] ?></option>
				<?php endforeach; ?>
				<?php
				}
				catch(PDOException $e){
				echo $e->getMessage();
				}
				
				$pdo->close();
				?>
			  </select>
			</div>
		  </td>
		  <td>
			<div class="form-group">
			  <input type="number" class="form-control text-right order_price" readonly/>
			</div>
		  </td>
		  <td>
			<div class="form-group">
			  <input type="number"  class="form-control text-right order_qty" oninput="this.value=Math.abs(this.value)" />
			</div>
		  </td>
		  <td>
			<button class="btn btn-danger btn_deleterow">X</button>
		  </td>
		</tr>
	  </tbody>
	</table>
	<button type="button" class="btn btn-primary" id="btn_addproduct" style="margin-left:8px;margin-bottom:15px"><i class="fa fa-plus"></i> ADD PRODUCT</button>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="button" class="btn btn-success btn-flat" id="btn_confirmorder" name="edit"><i class="fa fa-check"></i> Submit</button>

</div>
</div>
</div>
</div>