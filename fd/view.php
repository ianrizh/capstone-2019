<?php include 'includes/session.php';
$view = $_GET['view'];

$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT * FROM reservation WHERE user_pets_id = :view");
$stmt->execute(['view' => $view]);
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
<section class="content-header">
<h1 style="text-transform:uppercase; font-weight:bold">
TRANSACTIONS
</h1>
</section>

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
<table id="example1" class="table table-bordered">
<thead>
<th>TRANSACTION NO.</th>
<th>PET NAME</th>
<th>SERVICE NAME</th>
<th>DATE AND TIME</th>
<th>TOTAL</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php 
$conn = $pdo->open();
$stmt=$conn->prepare("select * from reservation where user_pets_id =:user_pets_id and status = 'Process Done'");
$stmt->execute(['user_pets_id' => $view]);
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
$stmt=$conn->prepare("select * from user_pets where user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $row1){
$id_cust=$row1['id_cust'];
$id_pet=$row1['id_pet'];
$stmt=$conn->prepare("select * from pets where id_pet = '$id_pet'");
$stmt->execute();
foreach($stmt as $row2){
$pet_name = $row2['pet_name'];
$stmt = $conn->prepare("select * from services where id_services='$id_services'");
$stmt->execute();
foreach($stmt as $row3){
}
if($id_services == "0"){
$name = ' Veterinary Health Care';
$price = ' 250.00';
}
else{
$name = $row3['name'];
$price = $row3['price'];
}
echo "
<tr>
<td>";
if($id_services == "0"){
echo "VHC_0".$reservation_id;
}
elseif($id_services <= "Boarding"){
echo "BRDNG_0".$reservation_id;
}
else{
echo "GRMMNG_0".$reservation_id;
}
echo "</td>
<td>".$pet_name."</td>
<td>".$name."</td>
<td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
<td>&#8369; ".number_format($total,2)."</td>";
echo "<td><a href='bill.php?bill=".$reservation_id."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-dollar'></i> Bill</a></td>";
echo"
</tr> ";
}
}
}
$pdo->close();
?>
<tr>
<?php
$stmt=$conn->prepare("select sum(total) as amount from reservation where user_pets_id =:user_pets_id and status = 'Process Done'");
$stmt->execute(['user_pets_id' => $view]);
foreach($stmt as $row4){
$amount = $row4['amount'];
}
?>
<td colspan="4" align="right" style="font-weight:bold">SUBTOTAL</td>
<td style="font-weight:bold"><?php echo "&#8369; ".number_format($amount,2).""; ?></td>
<?php echo "<td><a href='bill2.php?bill=".$user_pets_id."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-dollar'></i> Bill</a></td>"; ?>
</tr>
</tbody>
</table>
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
