<!-- Delete -->
<div class="modal fade" id="addnew">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>WASTAGE</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="wastage_add.php">
<input type="hidden" class="batch_number" name="batch_number">
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">PRODUCT</label>

<div class="col-sm-8">
<select class="form-control" id="product" name="product" autocomplete="off" onChange="onSelect(this.value)" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();

$stmt = $conn->prepare("SELECT * FROM products WHERE deleted_date = '0000-00-00'");
$stmt->execute();

foreach($stmt as $crow){
echo "
<option value='".$crow['id_products']."'>".$crow['name']."</option>
";
}

$pdo->close();
?>
</select>

</div>
</div>

<div id="details">
</div>
<script>
 function onSelect(id){
 	var str = $('#product option[value='+id+']').text();
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details").innerHTML=this.responseText;
	}
	a.open('GET', "details.php?name="+str,true);
	a.send();
 }
</script>

<script>
 function onSelect1(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details1").innerHTML=this.responseText;
	}
	a.open('GET', "details1.php?id_stocks_expired="+str,true);
	a.send();
 }
</script>

<!--
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">CATEGORY</label>

<div class="col-sm-8">
<input type="text" class="form-control category" name="category" readonly style="background-color:white; border:0px" >
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">PRICE</label>
<label for="edit_name" class="col-sm-1 control-label">&#8369;</label>
<div class="col-sm-7">
<input type="text" class="form-control price" name="price" readonly style="border:0px; background-color:white; margin-left:-20px;">
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">STOCKS</label>

<div class="col-sm-8">
<input type="text" class="form-control edit_stocks" name="stocks" readonly style="background-color:white; border:0px">
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">EXPIRATION DATE</label>

<div class="col-sm-8">
<input type="text" class="form-control date" readonly style="background-color:white; border:0px">
<input type="hidden" name="expired_date" class="edit_expired_date"readonly style="background-color:white; border:0px">
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">REASON</label>

<div class="col-sm-8">
<select class="form-control" name="reason" required>
<option value="" disabled selected required>---Select---</option>
<option value="Broken">Broken</option>
<option value="Product used in Grooming">Product used in Grooming</option>
</select>
</div>
</div>
-->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
</form>
</div>
</div>
</div>
</div>