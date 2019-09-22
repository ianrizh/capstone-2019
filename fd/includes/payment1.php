<div class="modal fade" id="edit1">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><h4 class="modal-title"><b>BILLING</b></h4></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="billing1.php">
<input type="text" class="reservation_id" name="reservation_id" />
<input type="text" class="id_services" name="id_services" />
<input type="text" class="status" name="status" />
<input type="text" class="name" name="name" />
<input type="text" class="total" name="total" />
<!--<div class="form-group">
<label for="name" class="col-sm-4 control-label">Service Name:</label>
<div class="col-sm-6">
<input type="text" class="form-control name" style="background-color:white; border-color:white" autocomplete="off" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">Service Price:</label>
<div class="col-sm-8">
<input type="text" class="form-control price" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" autocomplete="off" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">Product Used:</label>
<div class="col-sm-5">
<input type="text" class="form-control sname" name="name" autocomplete="off" style="background-color:white; border-color:white" readonly>
</div>
<label for="name" class="col-sm-1 control-label">x</label>
<div class="col-sm-2">
<input type="text" class="form-control qty" name="qty" autocomplete="off" style="background-color:white; border-color:white" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">Product Price:</label>
<div class="col-sm-8">
<input type="text" class="form-control prod_price" name="prod_price" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" autocomplete="off" readonly><hr />
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">TOTAL AMOUNT:</label>
<div class="col-sm-8">
<input type="text" class="form-control total1" id="total1" name="total" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" autocomplete="off" readonly>
</div>
</div>
<script>
var x = 0;
var y = 0;
var z = 0;
function calc(obj) {
var d = obj.id.toString();
if (d == '') {
x = Number(obj.value);
y = Number(document.getElementById('cash').value);
} else {
x = Number(document.getElementById('total1').value);
y = Number(obj.value);
}
z = y - x;
document.getElementById('_change').value = z;
}
</script>

<div class="form-group">
<label for="name" class="col-sm-4 control-label">CASH:</label>
<div class="col-sm-8">
<input type="number" class="form-control" id="cash" name="cash" autofocus autcomplete="off" style="text-align:right;" onkeyup="calc(this)" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">CHANGE:</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="_change" name="_change" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" value="0.00" autocomplete="off" readonly>
</div>
</div>-->
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-check"></i> Done</button>
</form>
</div>
</div>
</div>
</div>