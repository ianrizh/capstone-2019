<div class="modal fade" id="edit1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">Confirmation</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="confirmation1.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
<select name="status" class="form-control" style="width:100%;" required>
<option value="" disabled selected required>---Select Confirmation---</option>
<option value="Confirm">Confirm Reservation</option>
<option value="Decline">Decline Reservation</option>
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

<div class="modal fade" id="edit4">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b style="text-transform:uppercase">EDIT STATUS</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="cnf.php">
<input type="hidden" class="reservation_id" name="reservation_id" />
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