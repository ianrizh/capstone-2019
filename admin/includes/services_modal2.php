<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>DELETE SERVICE</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="services_delete.php">
                <input type="hidden" class="id_services" name="id_services">
                <div class="text-center">
                    <p>DELETE SERVICE</p>
                    <h2 class="bold name"></h2>
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
              <h4 class="modal-title"><b>RESTORE SERVICE</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="services_restore.php">
                <input type="hidden" class="id_services" name="id_services">
                <div class="text-center">
                    <p>RESTORE SERVICE</p>
                    <h2 class="bold name"></h2>
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

<!-- Edit -->
<div class="modal fade" id="edit">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>EDIT SERVICE</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="services_edit.php" enctype="multipart/form-data">
<input type="hidden" class="id_services" name="id_services">
<div class="form-group">
<label for="edit_name" class="col-sm-1 control-label">Name</label>

<div class="col-sm-5">
<input type="text" class="form-control" id="edit_name" name="name">
</div>

<label for="edit_category" class="col-sm-1 control-label">Category</label>

<div class="col-sm-5">
<select class="form-control" id="edit_id_category catselected" name="id_category">
<option hidden id="catselected"></option>
<option value="" disabled style="background-color:#CCCCCC" required>--Select--</option>
<?php 
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM category WHERE type = 'Services' || type = 'Both' ORDER BY category ASC");
$stmt->execute();

foreach($stmt as $crow){
$selected = ($crow['id_category'] == $id_category) ? 'selected' : ''; 
echo "
<option value='".$crow['id_category']."' ".$selected.">".$crow['category']."</option>
";
}

$pdo->close();
?>
</select>
</div>
</div>
<div class="form-group">
<label for="edit_price" class="col-sm-1 control-label">Price</label>

<div class="col-sm-5">
<input type="text" class="form-control" id="edit_price" name="price">
</div>
<label for="photo" class="col-sm-1 control-label">Photo</label>
<div class="col-sm-5">
<input type="file" id="photo" name="photo" required>
</div>
</div>

<p><b>Description</b></p>
<div class="form-group">
<div class="col-sm-12">
<textarea id="editor2" name="details" rows="10" cols="80"></textarea>
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

