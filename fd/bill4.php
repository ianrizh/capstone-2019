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
<form class="form-horizontal" method="POST" action="billing1.php">
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
	<td><?= $row['service_name'] ?></td>
	<td><?= $row['pet_name'] ?></td>
	<td>&#8369; <?= $row['service_price'] ?></td>
</tr>
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
	function calc(obj) {
		var total = parseFloat(document.getElementById('total').value),
			amount = parseFloat(obj.value) || 0;
		if(total > amount) {
			document.getElementById('_change').value = '0.00'
			return false;
		}
		var change = (amount - total).toFixed(2);
		document.getElementById('_change').value = change;
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