<div class="modal fade" id="edit">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><h4 class="modal-title"><b>BILLING</b></h4></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="billing.php">
<input type="text" class="reservation_id" name="reservation_id" />
<input type="text" class="status" name="status" />
<input type="text" class="name" name="name" />
<input type="text" class="total" name="total" />
<!--<div class="form-group">
<label for="name" class="col-sm-4 control-label">Service Name:</label>
<div class="col-sm-6">
<input type="text" class="form-control" value="Veterinary Health Care" style="background-color:white; border-color:white" autocomplete="off" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">Service Price:</label>
<div class="col-sm-8">
<input type="text" class="form-control" value="250.00" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" autocomplete="off" readonly>
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
<input type="text" class="form-control total" id="total" name="total" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" autocomplete="off" readonly>
</div>
</div>
<script>
var a = 0;
var b = 0;
var c = 0;
function calcu(obj) {
var e = obj.id.toString();
if (e == '') {
a = Number(obj.value);	
b = Number(document.getElementById('amount_paid').value);
} else {
a = Number(document.getElementById('total').value);
b = Number(obj.value);
}
c = b - a;
document.getElementById('sukli').value = c;
}
</script>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">CASH:</label>
<div class="col-sm-8">
<input type="number" class="form-control" id="amount_paid" name="amount_paid" autofocus autcomplete="off" style="text-align:right;" onkeyup="calcu(this)" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-4 control-label">CHANGE:</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="sukli" name="sukli" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" value="0.00" autocomplete="off" readonly>
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