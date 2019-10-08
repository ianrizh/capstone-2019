<div class="modal fade" id="edit2">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">Confirmation</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="confirmation2.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<select name="status" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select Confirmation---</option>
<option value="Confirm">Confirm Reservation</option>
<option value="Decline">Decline Reservation</option>
<option value="Reschedule">Reschedule</option>
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

<div class="modal fade" id="findings2">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b style="text-transform:uppercase">Findings and Prescription</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="fap1.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<input type="hidden" class="price" name="sprice" value="250.00" />
<input type="hidden" class="status" name="status" />
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
<p><b>Products Used</b></p>
<div class="form-group">
<div class="col-sm-12">
<select class="form-control select2" style="width:100%" name="products_used" autocomplete="off" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM products WHERE deleted_date = '0000-00-00' ORDER BY name ASC");
$stmt->execute();

foreach($stmt as $crow){
echo "
<option value='".$crow['id_products']."'>".$crow['name']."</option>
";
}

$pdo->close();
?>
</select>
</div>
</div>
<p><b>Pet Size</b></p>
<div class="form-group">
<div class="col-sm-12">
<input type="text" class="form-control pet_size" name="pet_size" readonly>
</div>
</div>
<br />
<div class="form-group">
<label for="category" class="col-sm-1 control-label">Price</label>
<div class="col-sm-5">
<input type="number" class="form-control" id="prod_price" name="prod_price" autocomplete="off" required>
</div>
<label for="name" class="col-sm-2 control-label">Quantity</label>
<div class="col-sm-4">
<input type="number" class="form-control" id="qty" name="qty" autocomplete="off" required>
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