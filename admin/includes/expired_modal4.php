<!-- Delete -->
<div class="modal fade" id="addnew">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"><b>INVENTORY ADJUSTMENT</b></h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="POST" action="adjustment_add.php">
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">PRODUCT</label>

<div class="col-sm-8">
<select class="form-control" id="product" name="product" autocomplete="off" onChange="onSelect(this.value)" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
$stmt = $conn->prepare("select distinct id_products from stocks_expired where expired_flag !='1'");
$stmt->execute();
foreach($stmt as $crow){
$id_products = $crow['id_products'];
$stmt = $conn->prepare("select * from products where id_products = '$id_products'");
$stmt->execute();
foreach($stmt as $row){
$id_p = $row['id_products'];
$name = $row['name'];
echo "
<option value='".$id_p."'>".$name."</option>
";
}
}
$pdo->close();
?>
</select>

</div>
</div>

<div id="adjustment1">
</div>
<script>
 function onSelect(id){
 	var str = $('#product option[value='+id+']').text();
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("adjustment1").innerHTML=this.responseText;
	}
	a.open('GET', "adjustment_details.php?name="+str,true);
	a.send();
 }
</script>

<script>
 function onSelect1(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("adjustment2").innerHTML=this.responseText;
	}
	a.open('GET', "adjustment_details1.php?id_stocks_expired="+str,true);
	a.send();
 }
</script>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
</form>
</div>
</div>
</div>
</div>