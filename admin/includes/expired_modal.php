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
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>NEW STOCK</b></h4>
</div>
<div class="modal-body">
	<script type="text/javascript">
		function toggleTB(what){
		if(what.checked){document.theForm.expdate.disabled=1}
		else{document.theForm.expdate.disabled=0}}
	</script>
  <div class="container-fluid">
    <table class="table" id="tbl_stock" style="margin:0">
      <thead>
        <tr>
          <th style="text-align:center;width:75%">PRODUCT</th>
          <th style="text-align:center">QUANTITY</th>
          <th style="text-align:center"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="form-group">
              <select class="form-control stock_product">
                <option value="0">Select Product</option>
                <?php
                  $conn = $pdo->open();

                  try {
                    $stmt = $conn->prepare("SELECT * FROM products");
                    $stmt->execute();
                ?>
                <?php foreach($stmt as $row): ?>
                  <option value="<?= $row['id_products'] ?>"><?= $row['name'] ?></option>
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
              <input type="number"  class="form-control text-right stock_quantity" oninput="this.value=Math.abs(this.value)" />
            </div>
          </td>
          <td>
            <button class="btn btn-danger btn_deleterow">X</button>
          </td>
        </tr>
      </tbody>
    </table>
    <button class="btn btn-primary" id="btn_addproduct" style="margin-left:8px;margin-bottom:15px"><i class="fa fa-plus"></i> ADD PRODUCT</button>
    <div class="form-group">
			<label for="price" class="col-sm-3 control-label">Expiration Date</label>
			<div class="col-sm-9">
				<input type="date" class="form-control" id="expdate" />
				<input type="checkbox" onClick="document.getElementById('expdate').disabled=this.checked;" id="expdate1" name="expired_date" value="No Expiration Date" <?php //if(isset($_POST['expired_date'])) echo 'checked="No Expiration Date"'; ?>>No Expiration Date
			</div>
		</div>
  </div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
	<button type="button" class="btn btn-success btn-flat" name="add" id="addstock"><i class="fa fa-save"></i> Save</button>
</div>
</div>
</div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b><span class="name"></span></b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="products_photo.php" enctype="multipart/form-data">
<input type="hidden" class="prodid" name="id">
<div class="form-group">
<label for="photo" class="col-sm-3 control-label">Photo</label>

<div class="col-sm-9">
<input type="file" id="photo" name="photo" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
</form>
</div>
</div>
</div>
</div>