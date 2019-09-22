<?php include 'includes/session.php';
$bill = $_GET['bill'];

$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT * FROM reservation WHERE reservation_id = :bill");
$stmt->execute(['bill' => $bill]);
$rcpt = $stmt->fetch();
$pymnt = $rcpt['reservation_id'];
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Main content -->
<section class="content">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Error!</h4>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-check'></i> Success!</h4>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-body">
<img src="../images/STELLAS LOGO.jpg" width="30%"><br>
<h3 style="float:left"><b>OFFICIAL RECEIPT</b></h3><br>
<?php
date_default_timezone_set('Asia/Manila');
$today=date('Y-m-d');
?>
<h4 style="float:right">Date: <?php echo date('M. d, Y', strtotime($today)); ?></h4>
<br><br>
<form class="form-horizontal" method="POST" action="billing.php">
<?php
$stmt=$conn->prepare("select * from reservation where reservation_id=:reservation_id");
$stmt->execute(['reservation_id' => $bill]);
foreach($stmt as $row){
$user_pets_id = $row['user_pets_id'];
$products_used = $row['products_used'];
$qty = $row['qty'];
$prod_price = $row['prod_price'];
$reservation_id = $row['reservation_id'];
$id_services = $row['id_services'];
$date = $row['thedate'];
$time = $row['time_reservation'];
$total = $row['total'];
$stmt=$conn->prepare("select * from user_pets where user_pets_id='$user_pets_id'");
$stmt->execute();
foreach($stmt as $row2){
$id_cust = $row2['id_cust'];
$id_pet = $row2['id_pet'];
$stmt=$conn->prepare("select * from users where id_cust='$id_cust'");
$stmt->execute();
foreach($stmt as $row3){
$fullname = $row3['firstname'] ." ". $row3['lastname'];
$home = $row3['home'];
$contact = $row3['contact'];
$stmt=$conn->prepare("select * from pets where id_pet='$id_pet'");
$stmt->execute();
foreach($stmt as $row4){
$pet_name = $row4['pet_name'];
$stmt = $conn->prepare("select * from services where id_services='$id_services'");
$stmt->execute();
foreach($stmt as $row5){
}
if($id_services == "0"){
$name = ' Veterinary Health Care';
$price = ' 250.00';
}
else{
$name = $row5['name'];
$price = $row5['price'];
}
$stmt=$conn->prepare("select * from products where id_products = '$products_used'");
$stmt->execute();
foreach($stmt as $row6){
$pname = $row6['name'];
$pprice = $row6['price'];
}
}
}
}
}
?>
<div class="form-group">
<label for="name" class="col-sm-1 control-label"><i class="fa fa-user"></i></label>
<div class="col-sm-6">
<input type="hidden" class="reservation_id" name="reservation_id" value="<?php echo $reservation_id ?>" />
<input type="text" class="form-control" style="background-color:white; border-color:white; font-size:16px" value="<?php echo $fullname ?>" readonly>
</div>
<label for="name" class="col-sm-1 control-label"><i class="fa fa-phone"></i></label>
<div class="col-sm-4">
<input type="text" class="form-control" style="background-color:white; border-color:white; font-size:16px" value="<?php echo $contact ?>" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-1 control-label"><i class="fa fa-home"></i></label>
<div class="col-sm-11">
<input type="text" class="form-control" style="background-color:white; border-color:white; font-size:16px" value="<?php echo $home ?>" readonly>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<table class="table table-bordered">
<thead>
<th>TRANSACTION NO.</th>
<th>PET NAME</th>
<th>SERVICE NAME</th>
<th>DATE AND TIME</th>
<th>SERVICE PRICE</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();
echo "
<tr>
<td>";
if($id_services == "0"){
echo "VHC_0".$reservation_id;
}
else{
echo "GMMNG_0".$reservation_id;
}
echo "</td>
<td>".$pet_name."</td>
<td>".$name."</td>
<td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
<td>&#8369; ".number_format($price,2)."</td>
</tr> ";

$pdo->close();
?>
</tbody>
</table>
<div class="form-group">
<label for="name" class="col-sm-6 control-label">Product Used:</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="name" autocomplete="off" style="background-color:white; border-color:white" value="<?php if($id_services == "0") {echo "$pname (&#8369; ".number_format($pprice,2).")"; } else { echo "None";} ?>" readonly>
</div>
<label for="name" class="col-sm-1 control-label">x</label>
<div class="col-sm-1">
<input type="text" class="form-control" name="qty" autocomplete="off" style="background-color:white; border-color:white" value="<?php echo $qty ?>" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-6 control-label">Product Price:</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="prod_price" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" value="<?php echo "&#8369; ".number_format($prod_price,2).""; ?>" readonly><hr />
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-6 control-label">TOTAL AMOUNT:</label>
<div class="col-sm-6">
<input type="text" class="form-control" value="<?php echo $total ?>" id="total" name="total" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" onKeyUp="calc(this)" readonly>
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
y = Number(document.getElementById('amount_paid').value);
} else {
x = Number(document.getElementById('total').value);
y = Number(obj.value);
}
z = y - x;
document.getElementById('_change').value = z;
}
</script>

<div class="form-group">
<label for="name" class="col-sm-6 control-label">CASH:</label>
<div class="col-sm-6">
<input type="number" class="form-control" id="amount_paid" name="amount_paid" autofocus autcomplete="off" style="text-align:right;" onKeyUp="calc(this)" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-6 control-label">CHANGE:</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="_change" name="_change" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" value="0.00" autocomplete="off" readonly>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-check"></i> Done</button>
</form>
</div>
</div>
</div>
</div>
</section>

</div>
<?php include 'includes/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
</body>
</html>
