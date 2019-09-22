<!-- Add -->
<div class="modal fade" id="addnew3">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>NEW SCHEDULE</b></h4>
</div>
<form class="form-horizontal" method="POST" action="schedule_add.php">
<br />
<div class="form-group" style="padding-right:15px">
<label for="name" class="col-sm-3 control-label">Name</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="schedule_name" name="schedule_name" autocomplete="off" autofocus required>
</div>
</div>
<div class="d">
<table width="100%" border="1">
<tr>
<td align="center"><label class="mtf" id="text">DAYS</label></td>
<td align="center"><label class="mtf" id="text">START TIME</label></td>
<td align="center"><label class="mtf" id="text">END TIME</label></td>
</tr>
<tr>
<td align="center"><label class="mtf" id="text">MONDAY</label></td>
<input type="hidden" class="form-control" name="day[]" value="Monday" readonly>
<td><input type="time" class="form-control" name="start_time[]" autocomplete="off" required/></td>
<td><input type="time" class="form-control" name="end_time[]" autocomplete="off" required/></td>
</tr>
<tr>
<td align="center"><label class="mtf" id="text">TUESDAY</label></td>
<input type="hidden" class="form-control" name="day[]" value="Tuesday" readonly>
<td><input type="time" class="form-control" name="start_time[]" autocomplete="off" required/></td>
<td><input type="time" class="form-control" name="end_time[]" autocomplete="off" required/></td>
</tr>
<tr>
<td align="center"><label class="mtf" id="text">WEDNESDAY</label></td>
<input type="hidden" class="form-control" name="day[]" value="Wednesday" readonly>
<td><input type="time" class="form-control" name="start_time[]" autocomplete="off"/></td>
<td><input type="time" class="form-control" name="end_time[]" autocomplete="off"/></td>
</tr>
<tr>
<td align="center"><label class="mtf" id="text">THURSDAY</label></td>
<input type="hidden" class="form-control" name="day[]" value="Thursday" readonly>
<td><input type="time" class="form-control" name="start_time[]" autocomplete="off"/></td>
<td><input type="time" class="form-control" name="end_time[]" autocomplete="off"/></td>
</tr>
<tr>
<td align="center"><label class="mtf" id="text">FRIDAY</label></td>
<input type="hidden" class="form-control" name="day[]" value="Friday" readonly>
<td><input type="time" class="form-control" name="start_time[]" autocomplete="off"/></td>
<td><input type="time" class="form-control" name="end_time[]" autocomplete="off"/></td>
</tr>
<tr>
<td align="center"><label class="mtf" id="text">SATURDAY</label></td>
<input type="hidden" class="form-control" name="day[]" value="Saturday" readonly>
<td><input type="time" class="form-control" name="start_time[]" autocomplete="off"/></td>
<td><input type="time" class="form-control" name="end_time[]" autocomplete="off"/></td>
</tr>
<tr>
<td align="center"><label class="mtf" id="text">SUNDAY</label></td>
<input type="hidden" class="form-control" name="day[]" value="Sunday" readonly>
<td><input type="time" class="form-control" name="start_time[]" autocomplete="off"/></td>
<td><input type="time" class="form-control" name="end_time[]" autocomplete="off"/></td>
</tr>
</table>
</div>  
<br />
<div class="form-group" style="padding-right:15px">
<label for="name" class="col-sm-3 control-label">Status</label>
<div class="col-sm-9">
<select class="form-control" id="status" name="status" autocomplete="off" required>
<option value="" disabled selected required>---Select---</option>
<option value="Display">Display</option>
<option value="Do Not Display">Do Not Display</option>
</select>
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