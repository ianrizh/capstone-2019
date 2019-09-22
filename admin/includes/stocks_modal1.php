<div class="modal fade" id="edit1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b>Add Stock(s)</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="stocks_edit.php">
<input type="hidden" class="id_stocks_expired" name="id_stocks_expired">
<div class="form-group">
<label for="edit_name" class="col-sm-2 control-label">Current Stock(s)</label>

<div class="col-sm-3">
<input type="text" class="form-control edit_stocks" autocomplete="off" min="1" maxlength="3" pattern="^[1-9][0-9]*$" onKeyPress="validate(event)" readonly>			
</div>

<div class="form-group">
<label for="edit_name" class="col-sm-2 control-label">Add Stock(s)</label>

<div class="col-sm-3">
<input type="text" class="form-control" name="stocks" autofocus autocomplete="off" min="1" maxlength="3" pattern="^[1-9][0-9]*$" onKeyPress="validate(event)">			
</div>
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

