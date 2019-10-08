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
window.location.href='users.php';
}
</script>
<div class="box-body" align="center" id="details">
<img src="../images/STELLAS LOGO.jpg" width="30%" style="margin-bottom:15px;"><br />
<h4 class="modal-title"><b>Findings</b></h4>
<h5 style="margin-top:5px;">Unit 25 Emeral Complex, P. Tuazon Blvd, Project 4, Quezon City, Metro Manila</h5>
<h5 style="margin-top:-5px;">09166437127 / (123) 456 7890</h5>
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
?>
<h5 style="margin-top:-5px;"><b><?php echo "".date('M. d, Y', strtotime($date)).""; ?></b></h5>
<hr>
<form class="form-horizontal" method="POST">
<input type="hidden" value="<?php echo $pymnt; ?>" name="reservation_id">
<table class="table table-bordered">
<thead>
<th width="30%">TRANSACTION NO.</th>
<th width="25%">SERVICE NAME</th>
<th>PET NAME</th>
<th width="20%">Findings</th>
</thead>
<tbody>
<?php
$stmt = $conn->prepare("select * from reservation where status = 'Paid' and reservation_id = :bill");
$stmt->execute(['bill' => $bill]);
foreach($stmt as $r){		
$reservation_id = $r['reservation_id'];
$user_pets_id = $r['user_pets_id'];
$id_services = $r['id_services'];
$s_price = $r['s_price'];
$total = $r['total'];
$amount_paid = $r['amount_paid'];
$_change = $r['_change'];
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
$stmt=$conn->prepare("SELECT * FROM findings_prescription WHERE reservation_id = '$reservation_id' ORDER BY fp_id DESC");
$stmt->execute();

foreach ($stmt as $find);
$findings=$find['findings'];
$fp_id=$find['fp_id'];

echo "
<tr>
<td>";
if($id_services == "0"){
echo "VHC_0".$reservation_id;
}
else{
echo "BRDNG_0".$reservation_id;
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
<td>".$findings."</td>
</tr> ";
$stmt=$conn->prepare("SELECT * FROM findings_prescription WHERE reservation_id='$reservation_id' and fp_id != '$fp_id' order by fp_id ASC");
$stmt->execute();

foreach ($stmt as $find){
$findings=$find['findings'];
$prescription=$find['prescription'];
echo "<tr>
<td></td>
<td></td>
<td></td>
<td>".$findings."</td>
</tr> ";
}
}
}
}
?>
</tbody>
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
