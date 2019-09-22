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
<select name="status" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select---</option>
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
<form class="form-horizontal" method="POST" action="fap.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<input type="hidden" class="status" name="status" />
<input type="hidden" name="price" value="250.00" />
<p><b>Findings</b></p>
<div class="form-group">
<div class="col-sm-12">
<textarea class="form-control" name="findings" autocomplete="off" required></textarea>
</div>
</div>
<p><b>Prescription</b></p>
<div class="form-group">
<div class="col-sm-12">
<textarea class="form-control" name="prescription" autocomplete="off" required></textarea>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Product(s) Used</label>
<div class="col-sm-4">
<select class="form-control order_product" style="width:100%" autocomplete="off" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();

try {
$stmt = $conn->prepare("SELECT * FROM products where deleted_date = '0000-00-00'");
$stmt->execute();
?>
<?php foreach($stmt as $row): ?>
<option value="<?= $row['name'] ?>" data-price="<?= $row['price'] ?>"><?= $row['name'] ?></option>
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
<label for="name" class="col-sm-1 control-label">Price</label>
<div class="col-sm-2">
<input type="number" class="form-control text-right order_price" readonly/>
</div>
<label for="name" class="col-sm-1 control-label">Qty</label>
<div class="col-sm-2">
<input type="number"  class="form-control text-right order_qty" oninput="this.value=Math.abs(this.value)" />
</div>
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