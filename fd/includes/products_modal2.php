<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>DELETE PRODUCT</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_delete.php">
                <input type="hidden" class="id_products" name="id_products">
                <div class="text-center">
                    <p>DELETE PRODUCT</p>
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
              <h4 class="modal-title"><b>RESTORE PRODUCT</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_restore.php">
                <input type="hidden" class="id_products" name="id_products">
                <div class="text-center">
                    <p>RESTORE PRODUCT</p>
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
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>PRODUCT DETAILS</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" class="id_products" name="id_products">
<div class="form-group">

<div class="col-sm-12">
<input type="text" class="form-control" id="edit_name" name="name" style="background-color:white; border:0px; font-weight:bold; font-size:18px" readonly>
<select class="form-control" id="edit_id_category catselected" name="id_category" style="background-color:white; border:0px; font-weight:bold; font-size:18px" readonly>
<option hidden id="catselected" readonly></option>
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

