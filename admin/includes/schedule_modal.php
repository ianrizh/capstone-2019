<div class="modal fade" id="edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>CHANGE STATUS</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="schedule_edit.php">
<input type="hidden" class="doctor_id" name="doctor_id">
<div class="text-center">
<p>Are you sure to change the status of this schedule?</p>
<input type="text" style="border:0; background-color:white; text-align:center; font-size:18px; font-weight:bold" class="form-control time_reservation" readonly>
<input type="text" style="border:0; background-color:white; text-align:center; font-size:18px; font-weight:bold" class="form-control date" readonly>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check"></i> Activate</button>
</form>
</div>
</div>
</div>
</div> 
