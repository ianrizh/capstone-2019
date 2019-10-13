<?php include 'includes/session.php';
$bill = $_GET['copy'];

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
<div>
<a class = "btn btn-success btn-print btn-flat" href = "#" onclick = "printContent('details')"><i class ="glyphicon glyphicon-print"></i> Print</a>
</div>
<br>
<div class="row">
<div class="col-xs-12">
<div class="box">
<script>
function printContent(el)
{
var restorepage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorepage;
window.location.href='suppliers.php';
}
</script>
<div class="box-body" align="center" id="details">
<img src="../images/STELLAS LOGO.jpg" width="30%" style="margin-bottom:15px;"><br />
<h4 class="modal-title"><b>OFFICIAL RECEIPT</b></h4>
<h5 style="margin-top:5px;">Unit 25 Emeral Complex, P. Tuazon Blvd, Project 4, Quezon City, Metro Manila</h5>
<h5 style="margin-top:-5px;">09166437127 / (123) 456 7890</h5>
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
?>
<h5 style="margin-top:-5px;"><b><?php echo "".date('M. d, Y', strtotime($date)).""; ?></b></h5>
<hr>
<form class="form-horizontal" method="POST" action="billing.php">
<input type="hidden" value="<?php echo $pymnt; ?>" name="reservation_id">
<table class="table table-bordered">
<thead>
<th width="30%">TRANSACTION NO.</th>
<th width="25%">SERVICE NAME</th>
<th>PET NAME</th>
<th width="20%">SERVICE PRICE</th>
</thead>
<tbody>
<?php
	$stmt = $conn->prepare("
		SELECT
			r.reservation_id,
			r.type_id,
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
			status = 'Paid'
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
	<td><?= $row['service_name'] ?></td>
	<td><?= $row['pet_name'] ?></td>
	<td>&#8369; <?= $row['service_price'] ?></td>
</tr>
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
$stmt = $conn->prepare("select * from reservation where status = 'Paid' and reservation_id = :bill");
$stmt->execute(['bill' => $bill]);
foreach($stmt as $p){
$reservation_id = $p['reservation_id'];
$total = $p['total'];
$amount_paid = $p['amount_paid'];
$_change = $p['_change'];
// $stmt = $conn->prepare("select * from findings_prescription where reservation_id = '$reservation_id'");
// $stmt->execute();
// foreach($stmt as $l){
// $fp_id = $l['fp_id'];
$stmt = $conn->prepare("select * from products_used where reservation_id = '$reservation_id'");
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
// }
}
?>
</tbody>
</table>

<table>
<tr>
<td align="right" width="80%"><b style="color:#009900; font-size:16px;">TOTAL AMOUNT:</b></td>
<td>
<input type="text" class="form-control" value="<?php echo "&#8369; ".number_format($total,2).""; ?>" id="total" name="total" style="background-color:white; border-color:white; color:#009900; font-weight:bold; font-size:16px; text-align:right" readonly>
</td>
</tr>
<tr>
<td align="right" width="80%"><b style="color:#009900; font-size:16px;">AMOUNT PAID:</b></td>
<td>
<input type="text" class="form-control" value="<?php echo "&#8369; ".number_format($amount_paid,2).""; ?>" id="amount_paid" name="amount_paid" style="background-color:white; border-color:white; color:#009900; font-weight:bold; font-size:16px; text-align:right" readonly>
</td>
</tr>
<tr>
<td align="right" width="80%"><b style="color:#009900; font-size:16px;">CHANGE:</b></td>
<td>
<input type="text" class="form-control" id="_change" name="_change" value="<?php echo "&#8369; ".number_format($_change,2).""; ?>" style="background-color:white; border-color:white; color:#009900; font-weight:bold; font-size:16px; text-align:right" autocomplete="off" readonly>
</td>
</tr>
</table>
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
