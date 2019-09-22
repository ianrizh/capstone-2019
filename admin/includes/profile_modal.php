<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title"><b>ADMIN PROFILE</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
				  <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $admin['firstname']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $admin['lastname']; ?>">
                  	</div>
                </div>
				   <div class="form-group">
                  	<label for="home" class="col-sm-3 control-label">Home Address</label>

                  	<div class="col-sm-9">
                    	<textarea class="form-control" id="home" name="home"><?php echo $admin['home']; ?></textarea>
                  	</div>
                </div>
          		  <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Email Address</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>">
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="contact" class="col-sm-3 control-label">Contact Number</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $admin['contact']; ?>">
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo"><?php echo $admin['photo']; ?>
                    </div>
                </div>
				<hr>
				<div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Password:</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Input current password to save changes" required>
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