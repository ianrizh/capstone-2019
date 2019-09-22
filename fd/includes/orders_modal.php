<div class="modal fade" id="order_summary" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>RECEIPT PREVIEW </b></h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<img src="../images/STELLAS LOGO.jpg" width="30%"><br>
					<table class="table" id="tbl_ordersummary" style="margin-top:20px">
						<thead>
							<tr>
								<th width="40%">PRODUCT</th>
								<th>QUANTITY</th>
								<th>PRICE</th>
								<th>AMOUNT</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<div id="pay_summary" style="margin-top:30px">
						
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="btn_hidesummary" class="btn btn-default pull-left">CANCEL</button>
				<button type="submit" class="btn btn-success btn-flat" id="btn_confirmorder">CONFIRM</button>
			</div>
		</div>
	</div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>EMPLOYEE DETAILS</b></h4>
			</div>
			<form class="form-horizontal">
				<div class="modal-body">
					<input type="hidden" class="id_emp" name="id_emp" />
					<div class="form-group">
						<div class="col-sm-11">
							<img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" width="200" height="200" style="margin-left:175px;" alt="User Image">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-11">
							<p><b>NAME</b></p>
							<input type="text" style="border:0; background:white;" class="form-control" id="edit_fullname" name="fullname" readonly>
						</div>
					</div>
					<!--div class="form-group">
						<div class="col-sm-11">
							<p><b>POSITION</b></p>
							<?php
							// $stmt = $conn->prepare("SELECT * FROM employee WHERE id_position != 0");
							// $stmt->execute();
							// foreach($stmt as $row){
							// $id_position = $row['id_position'];
							// $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
							// $stmt = $conn->prepare("SELECT * FROM position WHERE id_position = '$id_position'");
							// $stmt->execute();
							// foreach($stmt as $rows){
							?>
							<input type="text" style="border:0; background:white;" class="form-control" value="<?php echo $rows['position']; ?>" readonly>
							<?php
							// }
							// }
							?>
						</div>
					</div-->
					<div class="form-group">
						<div class="col-sm-11">
							<p><b>HOME ADDRESS</b></p>
							<input type="text" style="border:0; background:white;" class="form-control" id="edit_home" name="home" readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-11">
							<p><b>CONTACT NUMBER</b></p>
							<input type="text" style="border:0; background:white;" class="form-control" id="edit_contact" name="contact" readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-11">
							<p><b>EMAIL ADDRESS</b></p>
							<input type="text" style="border:0; background:white;" class="form-control" id="edit_email" name="email" readonly>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b>Deleting...</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="users_delete.php">
<input type="hidden" class="userid" name="id">
<div class="text-center">
<p>DELETE USER</p>
<h2 class="bold fullname"></h2>
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

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b><span class="fullname"></span></b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="users_photo.php" enctype="multipart/form-data">
<input type="hidden" class="userid" name="id">
<div class="form-group">
<label for="photo" class="col-sm-3 control-label">Photo</label>

<div class="col-sm-9">
<input type="file" id="photo" name="photo" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
</form>
</div>
</div>
</div>
</div> 


<!-- Activate -->
<div class="modal fade" id="activate">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><b>Activating...</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="users_activate.php">
<input type="hidden" class="userid" name="id">
<div class="text-center">
<p>ACTIVATE USER</p>
<h2 class="bold fullname"></h2>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activate</button>
</form>
</div>
</div>
</div>
</div>