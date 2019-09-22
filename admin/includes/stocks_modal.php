<!-- Description -->
<div class="modal fade" id="description">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b><span class="name"></span></b></h4>
</div>
<div class="modal-body">
<p id="desc"></p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
</div>
</div>
</div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>NEW STOCK</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="stocks_add.php" enctype="multipart/form-data" name="theForm">
<div class="form-group">
<label for="name" class="col-sm-3 control-label">Product Name</label>

<div class="col-sm-9">
<select class="select2" style="width:100%" id="id_products" name="id_products" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM products order by name asc");
$stmt->execute();

foreach($stmt as $crow){
$selected = ($crow['id_products'] == $id_products) ? 'selected' : ''; 
echo "
<option value='".$crow['id_products']."'>".$crow['name']."</option>
";
}

$pdo->close();
?>
</select>
</div>
</div>

<div class="form-group">
<label for="price" class="col-sm-3 control-label">New Stock</label>

<div class="col-sm-9">
<input type="text" class="form-control" id="stocks" name="stocks" autocomplete="off" min="1" maxlength="3" pattern="^[1-9][0-9]*$" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
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
              <h4 class="modal-title"><b>STOCK DETAILS</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                <input type="hidden" class="id_stocks_expired" name="id_stocks_expired" />
				<div class="form-group">
				</div>
                <div class="form-group">
                    <div class="col-sm-11" align="center">
                      <input type="text" style="border:0; background:white; text-align:center; font-weight:bold" class="form-control id_products" name="id_products" readonly>
                    </div>
					<div class="col-sm-11" align="center">
                      <input type="text" style="border:0; background:white; text-align:center; font-weight:bold" class="form-control" id="edit_stocks" name="edit_stocks" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>