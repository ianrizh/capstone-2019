<?php include 'includes/session.php';
$conn = $pdo->open();
if(isset($_GET['id_stocks_expired'])){
$id_stocks_expired = $_GET['id_stocks_expired'];
$stmt = $conn->prepare("select * from stocks_expired where id_stocks_expired = '$id_stocks_expired'");
$stmt->execute();
foreach($stmt as $row){
$id_products = $row['id_products'];
$stocks = $row['stocks'];
$expired_date = $row['expired_date'];
$batch_number = $row['batch_number'];
$stmt = $conn->prepare("select * from products where id_products = '$id_products'");
$stmt->execute();
foreach($stmt as  $row1){
$id_category = $row1['id_category'];
$price = $row1['price'];
$stmt = $conn->prepare("select * from category where id_category = '$id_category'");
$stmt->execute();
foreach($stmt as $row2){
$category = $row2['category'];
echo '
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">CATEGORY</label>

<div class="col-sm-8">
<input type="text" hidden  name="batch_number1" value="'.$batch_number.'">
<input type="text" class="form-control category" name="category" value="'.$category.'" readonly style="background-color:white; border:0px" >
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">PRICE</label>
<label for="edit_name" class="col-sm-1 control-label">&#8369;</label>
<div class="col-sm-7">
<input type="text" class="form-control price" name="price" value="'.number_format($price,2).'" readonly style="border:0px; background-color:white; margin-left:-20px;">
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">STOCKS</label>

<div class="col-sm-8">
<input type="text" class="form-control edit_stocks" name="stocks" value="'.$stocks.'" readonly style="background-color:white; border:0px">
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">EXPIRATION DATE</label>

<div class="col-sm-8">
<input type="hidden" class="form-control edit_stocks" name="expired_date" value="'.$expired_date.'" readonly style="background-color:white; border:0px">
<input type="text" class="form-control" readonly style="background-color:white; border:0px" value="'.date('M. d, Y', strtotime($expired_date)).'">
</div>
</div>

<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">QUANTITY</label>

<div class="col-sm-8">
<input type="text" class="form-control" name="qty" required>
</div>
</div>

<div class="form-group">
<label for="edit_name" class="col-sm-4 control-label">REASON</label>

<div class="col-sm-8">
<textarea class="form-control" name="reason"></textarea>
</div>
</div>
';
}
}
}
}
?>