<?php include 'includes/session.php';

$past = $_GET['user'];

$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT * FROM reservation WHERE user_pets_id = :past");
$stmt->execute(['past' => $past]);
$rcpt = $stmt->fetch();
$trnsctns = $rcpt['user_pets_id'];
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
<!-- Content Header (Page header) -->
<section class="content-header">
<h1 style="text-transform:uppercase; font-weight:bold">
Past Transactions
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
<a href='reservations.php' class='btn btn-primary btn-sm btn-flat'><i class='fa fa-arrow-left'></i> Back</a>
<br><br>
<table id="example1" class="table table-bordered">
<thead>
<th>TRANSACTION NO.</th>
<th>NAME</th>
<th>PET NAME</th>
<th>SERVICE NAME</th>
<th>DATE AND TIME</th>
<th>STATUS</th>
<th>TOOLS</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();

try{
$now = date('Y-m-d');
$stmt = $conn->prepare("SELECT * FROM reservation where user_pets_id = :user_pets_id and status = 'Paid'");
$stmt->execute(['user_pets_id'=>$trnsctns]);
foreach($stmt as $row){
$reservation_id = $row['reservation_id'];
$date = $row['thedate'];
$time = $row['time_reservation'];
$s_id = $row['id_services'];
$user_pets_id = $row['user_pets_id'];
		$stmt = $conn->prepare("SELECT * FROM user_pets where user_pets_id = '$user_pets_id'");
		$stmt->execute();
		foreach($stmt as $row1){
		$id_cust = $row1['id_cust'];
		$id_pet = $row1['id_pet'];
			$stmt = $conn->prepare("select * from pets where id_pet = '$id_pet'");
			$stmt->execute();
			foreach($stmt as $pet){
			$pet_name = $pet['pet_name'];
				$stmt = $conn->prepare("SELECT * FROM users where id_cust = '$id_cust'");
				$stmt->execute();
				foreach($stmt as $rowss){
				$fullname = $rowss['firstname']. ' ' .$rowss['lastname'];
					$stmt = $conn->prepare("SELECT * FROM services where deleted_date = '0000-00-00' and id_services = '$s_id'");
					$stmt->execute();
					foreach($stmt as $row2){
					}
					if($s_id == "0"){
						$name = ' Veterinary Health Care';
					}
					else{
						$name = $row2['name'];
					}
echo "
<tr>
<td>VHC_0".$reservation_id."</td>
<td>".$fullname."</td>
<td>".$pet_name."</td>
<td>".$name."</td>
<td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
<td>".$row['status']."</td>
<td> ";?>
<?php
if($row['status'] != 'Decline' && $row['status'] != 'Confirm'){
echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-edit'></i> Edit</button> ";
}
else{
echo "<button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['reservation_id']."' disabled><i class='fa fa-edit'></i> Edit</button> ";
}
?>
<?php 
if($row['status'] == 'Confirm'){
echo "<button class='btn btn-primary btn-sm findings btn-flat' data-id='".$row['reservation_id']."'><i class='fa fa-clipboard'></i> Findings</button> ";
}
else {
echo "<button class='btn btn-primary btn-sm findings btn-flat' data-id='".$row['reservation_id']."' disabled><i class='fa fa-clipboard'></i> Findings</button> "; }?>
<?php echo "<a href='history1.php?user=".$row['reservation_id']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i> History</a>
</td>
</tr>
";
}
}
}
}
}
catch(PDOException $e){
echo $e->getMessage();
}

$pdo->close();
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
<?php include 'includes/reservations_new.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

</body>
</html>
