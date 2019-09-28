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
<div class="box-body" align="center">
<img src="../images/STELLAS LOGO.jpg" width="30%" style="margin-bottom:15px;"><br />
<h4 class="modal-title"><b>RECEIPT PREVIEW</b></h4>
<h5 style="margin-top:5px;">Unit 25 Emeral Complex, P. Tuazon Blvd, Project 4, Quezon City, Metro Manila</h5>
<h5 style="margin-top:-5px;">09166437127 / (123) 456 7890</h5>
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
?>
<h5 style="margin-top:-5px;"><b><?php echo "".date('M. d, Y', strtotime($date)).""; ?></b></h5>
<hr>
<form class="form-horizontal" method="POST" action="billing.php">
<input type="hidden" value="<?php echo $pymnt; ?>" name="reservation_id" id="reservation_id">
<table class="table table-bordered">
<thead>
<th width="30%">TRANSACTION NO.</th>
<th width="25%">SERVICE NAME</th>
<th>PET NAME</th>
<th width="20%">SERVICE PRICE</th>
</thead>
<tbody>
<?php
$stmt = $conn->prepare("select * from reservation where status = 'Process Done' and reservation_id = :bill");
$stmt->execute(['bill' => $bill]);
foreach($stmt as $r){
$reservation_id = $r['reservation_id'];
$user_pets_id = $r['user_pets_id'];
$id_services = $r['id_services'];
$s_price = $r['s_price'];
$stmt = $conn->prepare("select * from user_pets where user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $q){
$id_pet = $q['id_pet'];
$stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
$stmt->execute();
foreach($stmt as $w){
$pet_name = $w['pet_name'];
$stmt = $conn->prepare("select * from services where id_services = '$id_services'");
$stmt ->execute();
foreach($stmt as $e){
$service = $e['name'];
}
echo "
<tr>
<td>";
if($id_services == "0"){
echo "VHC_0".$reservation_id;
}
else{
echo "GMMNG_0".$reservation_id;
}
echo "</td><td>";
if($id_services == "0"){
echo "Veterinary Health Care";
}
else{
echo $service;
}
echo "</td>
<td>".$pet_name."</td>
<td>&#8369; ".number_format($s_price,2)."</td>
</tr> ";
}
}
}
?>
</tbody>
</table>

<table class="table table-bordered">
<thead>
<th width="30%">PRODUCT USED</th>
<th width="25%">PRODUCT PRICE</th>
<th>QUANTITY</th>
<th width="20%">TOTAL</th>
</thead>
<tbody>
<?php
$stmt = $conn->prepare("select * from reservation where status = 'Process Done' and reservation_id = :bill");
$stmt->execute(['bill' => $bill]);
foreach($stmt as $p){
$reservation_id = $p['reservation_id'];
$total = $p['total'];
$stmt = $conn->prepare("select * from findings_prescription where reservation_id = '$reservation_id'");
$stmt->execute();
foreach($stmt as $l){
$fp_id = $l['fp_id'];
$stmt = $conn->prepare("select * from products_used where fp_id = '$fp_id'");
$stmt->execute();
foreach($stmt as $w){
$pu_id = $w['pu_id'];
$product = $w['product'];
$price = $w['price'];
$qty = $w['qty'];
$amount = $w['amount'];
echo "
<tr>
<td>".$product."</td>
<td>&#8369; ".number_format($price,2)."</td>
<td>".$qty."</td>
<td>&#8369; ".number_format($amount,2)."</td>
</tr> ";
}
}
}
?>
</tbody>
</table>

<table>
<tr>
<td align="right" width="75%"><b style="color:#009900; font-size:16px;">TOTAL AMOUNT:</b></td>
<td align="right" width="5%"><b style="color:#009900; font-size:16px;">&#8369;</b></td>
<td align="left">
<input type="text" class="form-control" value="<?php echo $total ?>" id="total" name="total" style="background-color:white; border-color:white; color:#009900; font-weight:bold; font-size:16px; float:right" onKeyUp="calc(this)" readonly>
</td>
</tr>
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
<tr>
<td align="right" width="75%"><b style="color:#009900; font-size:16px;">AMOUNT PAID:</b></td>
<td align="right" width="5%"><b style="color:#009900; font-size:16px;">&#8369;</b></td>
<td align="left">
<input type="number" class="form-control" id="amount_paid" name="amount_paid" autofocus autcomplete="off" style="text-align:right; font-size:16px;" onKeyUp="calc(this)" required>
</td>
</tr>
<tr>
<td align="right" width="75%"><b style="color:#009900; font-size:16px;">CHANGE:</b></td>
<td align="right" width="5%"><b style="color:#009900; font-size:16px;">&#8369;</b></td>
<td align="left">
<input type="text" class="form-control" id="_change" name="_change" style="background-color:white; border-color:white; color:#009900; font-weight:bold; font-size:16px; float:right" value="0.00" autocomplete="off" readonly>
</td>
</tr>
</table>

<div class="modal-footer">
<button type="button" class="btn btn-success btn-flat" id="paybill" style="margin-bottom:-10px;"><i class="fa fa-check"></i> Confirm</button>
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
