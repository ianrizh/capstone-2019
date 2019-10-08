<div class="modal fade" id="edit">
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
<select name="status" id="dropdown_confirmation" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select---</option>
<option value="Confirm">Confirm Reservation</option>
<option value="Decline">Decline Reservation</option>
</select>
<br>
<div id="declinecontainer" style="display:none">
	<label>Reason: </label>
	<textarea class="form-control" id="editor1" name="decline_remarks" required></textarea>
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

<div class="modal fade" id="edit5">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">EDIT STATUS</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="cnf1.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<input type="hidden" class="price" name="s_price" />
<input type="hidden" class="price" name="total" />
<select name="status" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select Status---</option>
<option value="On Process">On Process</option>
<option value="Process Done">Process Done</option>
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