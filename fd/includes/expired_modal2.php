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
<form class="form-horizontal" method="POST" action="products_delete.php">
<input type="hidden" class="prodid" name="id">
<div class="text-center">
<p>DELETE PRODUCT</p>
<h2 class="bold name"></h2>
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

<!-- Edit -->
<div class="modal fade" id="edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>EDIT STOCK</b></h4>
			</div>
			<form class="form-horizontal" method="POST" action="stocks_edit.php" enctype="multipart/form-data" name="theForm">
				<div class="modal-body">
					<input type="hidden" class="id_stocks_expired" name="id_stocks_expired">
					<div class="form-group">
						<label for="price" class="col-sm-3 control-label">Expiration Date</label>
						<div class="col-sm-9">
							<input type="date" class="form-control edit_expired_date" name="expired_date" id="expdate"/><br>
							<label><input type="checkbox" class="edit_expired_date" onClick="toggleTB(this)" id="expdate1" name="expired_date" value="No Expiration Date" <?php if(isset($_POST['expired_date'])) echo 'checked="No Expiration Date"'; ?>>No Expiration Date</label>
						</div>
					</div>
					<div class="form-group">
						<label for="edit_name" class="col-sm-3 control-label">Current Stock(s)</label>
						<div class="col-sm-9">
							<input type="text" class="form-control edit_stocks" autocomplete="off" min="1" maxlength="3" pattern="^[1-9][0-9]*$" onKeyPress="validate(event)" readonly>			
						</div>
					</div>
					<div class="form-group">
						<label for="edit_name" class="col-sm-3 control-label">Add Stock(s)</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="stocks" autofocus autocomplete="off" min="1" maxlength="3" pattern="^[1-9][0-9]*$" onKeyPress="validate(event)">			
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">
						<i class="fa fa-close"></i> Close
					</button>
					<button type="submit" class="btn btn-success btn-flat" name="edit">
						<i class="fa fa-check-square-o"></i> Update
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- View -->
<div class="modal fade" id="view">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>VIEW PRODUCT BATCH</b></h4>
			</div>
			<div class="modal-body">
				<table id="product_batch" class="table table-bordered">
					<thead>
						<tr>
							<th>BATCH NUMBER</th>
							<th>STOCKS</th>
							<th>EXPIRATION</th>
						</tr>
					</thead>
					<tbody id="product_batch_tbody"></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" style="float:left">
					<span class="fa fa-close"></span> CLOSE
				</button>
			</div>
		</div>
	</div>
</div>

<!--script type="text/javascript">
	function toggleTB(what)
	{
		if(what.checked)
			document.theForm.expdate.disabled=1;
		else
			document.theForm.expdate.disabled=0;
	}
</script-->