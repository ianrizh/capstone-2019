<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>NEW CATEGORY</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_add.php">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="category" name="category" autofocus autocomplete="off" required>
                    </div>
                </div>
				<div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Section</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="type" name="type" required>
					  	<option value="" disabled selected required>---Section---</option>
						<option value="Both">Both</option>
						<option value="Products">Products</option>
						<option value="Services">Services</option>
					  </select>
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
              <h4 class="modal-title"><b>EDIT CATEGORY</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_edit.php">
                <input type="hidden" class="id_category" name="id_category">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_category" name="category" autofocus autocomplete="off">
                    </div>
                </div>
				<div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Section</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="edit_type" name="type" required>
					  	<option value="" disabled selected required>---Section---</option>
						<option value="Both">Both</option>
						<option value="Products">Products</option>
						<option value="Services">Services</option>
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
              <h4 class="modal-title"><b>DELETE CATEGORY</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_delete.php">
                <input type="hidden" class="id_category" name="id_category">
                <div class="text-center">
                    <p>DELETE CATEGORY</p>
                    <h2 class="bold category"></h2>
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
              <h4 class="modal-title"><b>RESTORE CATEGORY</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="category_restore.php">
                <input type="hidden" class="id_category" name="id_category">
                <div class="text-center">
                    <p>RESTORE CATEGORY</p>
                    <h2 class="bold category"></h2>
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

