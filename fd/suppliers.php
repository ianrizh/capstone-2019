<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1 style="text-transform:uppercase; font-weight:bold">
PAYMENT
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
<th>DATE</th>
<th>CUSTOMER</th>
<th>STATUS</th>
<th>TOTAL</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php 
$conn = $pdo->open();
$stmt=$conn->prepare("select * from reservation where status = 'Process Done' or status = 'Paid'");
$stmt->execute();
foreach($stmt as $isa){
$upi = $isa['user_pets_id'];
$stmt=$conn->prepare("select * from user_pets where user_pets_id = '$upi'");
$stmt->execute();
foreach($stmt as $duwa){
$ic = $duwa['id_cust'];
}}
$stmt =$conn->prepare("select reservation_id, id_services, thedate, user_pets_id, time_reservation, status, total from reservation where status = 'Process Done' or status ='Paid' order by reservation_id asc");
$stmt->execute();
foreach($stmt as $row){
$reservation_id = $row['reservation_id'];
$thedate = $row['thedate'];
$time_reservation = $row['time_reservation'];
$user_pets_id = $row['user_pets_id'];
$status = $row['status'];
$total = $row['total'];
$stmt =$conn->prepare("select * from user_pets where user_pets_id = '$user_pets_id'");
$stmt->execute();
foreach($stmt as $row1){
$id_cust = $row1['id_cust'];
$stmt =$conn->prepare("select * from users where id_cust = '$id_cust'");
$stmt->execute();
foreach($stmt as $row2){
$fullname = $row2['firstname'] ." ". $row2['lastname'];
$count = 0;
$stmt1=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation where user_pets_id = '$user_pets_id' and status = 'Process Done'");
$stmt1->execute();
$a = $stmt1 -> fetch();
$count = $a['numrows'];
echo"
<tr>
<td>".date('M. d, Y', strtotime($thedate))."</td>
<td>".$fullname."</td>
<td>".$status."</td>
<td>&#8369; ".number_format($total,2)."</td>";
if($status == 'Paid'){
echo "<td><a href='bill1.php?copy=".$reservation_id."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-file'></i> Receipt</a></td>";
}
else{

echo "<td><a href='bill.php?bill=".$reservation_id."' class='btn btn-success btn-sm btn-flat'><i class='fa fa-money'></i> Bill</a></td>";

/*else{
echo "<td><a href='view.php?view=".$user_pets_id."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i> View</a></td>";
}*/
}
echo "
</tr>
";
}
}
}
?>
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
