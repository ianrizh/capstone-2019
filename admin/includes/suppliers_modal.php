
<!-- Add -->
<div class="modal fade" id="addnew">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>NEW SUPPLIER</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="suppliers_add.php" enctype="multipart/form-data">
<div class="form-group">
<label for="cperson" class="col-sm-3 control-label">CONTACT PERSON</label>

<div class="col-sm-9">
<input type="text" class="form-control" id="contact_person" name="contact_person" autocomplete="off" maxlength="50" min="2" required>
</div>
</div>
<div class="form-group">
<label for="cnumber" class="col-sm-3 control-label">CONTACT NUMBER</label>

<div class="col-sm-9">
<input type="text" class="form-control" id="contact_number" name="contact_number" autocomplete="off" maxlength="11" min="8" required>
</div>
</div>
<div class="form-group">
<label for="cnumber" class="col-sm-3 control-label">PRODUCT</label>

<div class="col-sm-9">
<select class="form-control" id="product" name="product" autocomplete="off" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();

foreach($stmt as $crow){
echo "
<option value='".$crow['name']."'>".$crow['name']."</option>
";
}

$pdo->close();
?>
</select>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
</form>
</div>
</div>
</div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>EDIT SUPPLIER</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="suppliers_edit.php">
<input type="hidden" class="id_supplier" name="id_supplier">
<div class="form-group">
<label for="cperson" class="col-sm-3 control-label">CONTACT PERSON</label>

<div class="col-sm-9">
<input type="text" class="form-control" id="edit_contact_person" name="contact_person" autocomplete="off" maxlength="50" min="2">
</div>
</div>
<div class="form-group">
<label for="cnumber" class="col-sm-3 control-label">CONTACT NUMBER</label>

<div class="col-sm-9">
<input type="text" class="form-control" id="edit_contact_number" name="contact_number" autocomplete="off" maxlength="11" min="8">
</div>
</div>
<div class="form-group">
<label for="cnumber" class="col-sm-3 control-label">PRODUCT</label>

<div class="col-sm-9">
<select class="form-control" id="edit_product" name="product">
<option hidden id="catselected"></option>
<option value="" disabled style="background-color:#CCCCCC" required>---Select---</option>
<?php 
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();

foreach($stmt as $crow){
$selected = ($crow['name'] == $id_supplier) ? 'selected' : ''; 
echo "
<option value='".$crow['name']."' ".$selected.">".$crow['name']."</option>
";
}

$pdo->close();
?>
</select>

</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
</form>
</div>
</div>
</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>DELETE SUPPLIER</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="suppliers_delete.php">
<input type="hidden" class="id_supplier" name="id_supplier">
<div class="text-center">
<p>DELETE SUPPLIER</p>
<input type="text" style="border:0; background-color:white; text-align:center; font-size:18px; font-weight:bold; text-transform:uppercase" class="form-control contact_person" readonly>
<input type="text" style="border:0; background-color:white; text-align:center; font-size:18px; font-weight:bold" class="form-control product" readonly>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
</form>
</div>
</div>
</div>
</div>

<!-- Restore -->
<div class="modal fade" id="restore">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>RESTORE SUPPLIER</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="suppliers_restore.php">
<input type="hidden" class="id_supplier" name="id_supplier">
<div class="text-center">
<p>RESTORE SUPPLIER</p>
<input type="text" style="border:0; background-color:white; text-align:center; font-size:18px; font-weight:bold; text-transform:uppercase" class="form-control contact_person" readonly>
<input type="text" style="border:0; background-color:white; text-align:center; font-size:18px; font-weight:bold" class="form-control product" readonly>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-primary btn-flat" name="restore"><i class="fa fa-recycle"></i> Restore</button>
</form>
</div>
</div>
</div>
</div>

