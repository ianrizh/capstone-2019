<?php include 'includes/session.php';
$bill = $_GET['bill'];

$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT * FROM reservation WHERE user_pets_id = :bill");
$stmt->execute(['bill' => $bill]);
$rcpt = $stmt->fetch();
$pymnt = $rcpt['user_pets_id'];
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
<form class="form-horizontal" method="POST" action="billing1.php">
<?php
$stmt=$conn->prepare("select * from reservation where user_pets_id=:user_pets_id and status = 'Process Done'");
$stmt->execute(['user_pets_id' => $bill]);
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
}
}
}
}
}
?>
<div class="form-group">
<label for="name" class="col-sm-1 control-label"><i class="fa fa-user"></i></label>
<div class="col-sm-6">
<input type="hidden" class="user_pets_id" name="user_pets_id" value="<?php echo $user_pets_id ?>" />
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
	$stmt = $conn->prepare("
		SELECT
			r.reservation_id,
			r.type_id,
			r.thedate,
			r.time_reservation,
			IF(r.id_services=0, 'Veterinary Health Care', s.name) as service_name,
			p.pet_name as pet_name,
			r.s_price as service_price
		FROM
			reservation r
		LEFT JOIN user_pets up
			ON r.user_pets_id = up.user_pets_id
		LEFT JOIN pets p
			ON up.id_pet = p.id_pet
		LEFT JOIN services s
			ON r.id_services = s.id_services
		WHERE
			status = 'Process Done'
			AND reservation_id = :bill
	");
	$stmt->execute(['bill' => $bill]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if($row['type_id'] == 1) //Boarding
		$transaction_number = 'BRDNG_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);
	else if($row['type_id'] == 2) //Check-up
		$transaction_number = 'VHC_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);
	else if($row['type_id'] == 3) //Grooming
		$transaction_number = 'GRMMNG_' . str_pad($row['reservation_id'], 3, '0', STR_PAD_LEFT);
?>
<tr>
	<td><?= $transaction_number ?></td>
	<td><?= $row['pet_name'] ?></td>
	<td><?= $row['service_name'] ?></td>
	<td>
		<?= date('M. d, Y',strtotime($row['thedate'])) ?><br>
		<?= $row['time_reservation'] ?>
	</td>
	<td>&#8369; <?= $row['service_price'] ?></td>
</tr>
</tbody>
</table>
<div class="form-group">
<label for="name" class="col-sm-6 control-label">Product Used:</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="name" autocomplete="off" style="background-color:white; border-color:white" value="<?php if($id_services >= "0") {echo $pname; } else { echo "None"; } ?>" readonly>
</div>
<label for="name" class="col-sm-1 control-label">x</label>
<div class="col-sm-1">
<input type="text" class="form-control" name="qty" autocomplete="off" style="background-color:white; border-color:white" value="<?php if($id_services >= "0") {echo $qty; } else {echo "0";} ?>" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-6 control-label">Product Price:</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="prod_price" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" value="<?php if($id_services >= "0") {echo "&#8369; ".number_format($prod_price,2)."" ;} else { echo "0.00";} ?>" readonly><hr />
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-6 control-label">TOTAL AMOUNT:</label>
<div class="col-sm-6">
<?php
$stmt=$conn->prepare("select sum(total) as amount from reservation where user_pets_id =:user_pets_id and status ='Process Done'");
$stmt->execute(['user_pets_id' => $bill]);
foreach($stmt as $row4){
$amount = $row4['amount'];
}
?>
<input type="text" class="form-control" value="<?php echo $amount ?>" id="total" name="total" style="background-color:white; border-color:white; color:#009900; font-weight:bold; text-align:right" onKeyUp="calc(this)" readonly>
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
