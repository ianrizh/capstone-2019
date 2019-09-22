<!-- Add -->
<div class="modal fade" id="addnew1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>NEW RESERVATION</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action=".php">
<div class="form-group">
<label for="name" class="col-sm-3 control-label">Customer Name</label>

<div class="col-sm-9">
<select name="id_cust" id="id_cust" data-live-search="true" class="form-control select2" style="width:100%" required>
<option value="" disabled selected required>---Select---</option>
</select>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label">Pet Name</label>

<div class="col-sm-9">
<select name="user_pets_id" id="user_pets_id" data-live-search="true" class="form-control" required>
<option value="" disabled selected required>---Select---</option>
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