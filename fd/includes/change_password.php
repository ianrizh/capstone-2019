<!-- Add -->
<div class="modal fade" id="password">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title"><b>CHANGE PASSWORD</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="change_pass.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
				  <div class="form-group">
                  	<label for="firstname" class="col-sm-4 control-label">Current Password</label>

                  	<div class="col-sm-8">
                    	<input type="password" class="form-control" id="password" name="curr_password" min="6" maxlength="12" autocomplete="off" autofocus required>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-4 control-label">New Password</label>

                  	<div class="col-sm-8">
                    	<input type="password" class="form-control" id="password" name="password" min="6" maxlength="12" autocomplete="off" required>
                  	</div>
                </div>
				   <div class="form-group">
                  	<label for="home" class="col-sm-4 control-label">Confirm Password</label>

                  	<div class="col-sm-8">
                    	<input type="password" class="form-control" id="password" name="repassword" min="6" maxlength="12" autocomplete="off" required>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>