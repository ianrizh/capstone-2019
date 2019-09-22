<div class="modal fade" id="receipt1">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<img src="../images/STELLAS LOGO.jpg" width="30%"><br>
<h3 style="float:left"><b>OFFICIAL RECEIPT</b></h3><br>
<?php
date_default_timezone_set('Asia/Manila');
$today=date('Y-m-d');
?>
<h4 style="float:right">Date: <?php echo date('M. d, Y', strtotime($today)); ?></h4>
</div>
<div class="modal-body">
<form class="form-horizontal">
<div class="form-group">
<label for="name" class="col-sm-1 control-label"><i class="fa fa-user"></i></label>
<div class="col-sm-6">
<input type="text" class="form-control fullname" style="background-color:white; border-color:white; font-size:16px" readonly>
</div>
<label for="name" class="col-sm-1 control-label"><i class="fa fa-phone"></i></label>
<div class="col-sm-4">
<input type="text" class="form-control contact" style="background-color:white; border-color:white; font-size:16px" readonly>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-1 control-label"><i class="fa fa-home"></i></label>
<div class="col-sm-11">
<input type="text" class="form-control home" style="background-color:white; border-color:white; font-size:16px" readonly>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<table id="example1" class="table table-bordered">
<thead>
<th>TRANSACTION NO.</th>
<th>PET NAME</th>
<th>SERVICE NAME</th>
<th>DATE AND TIME</th>
<th>TOTAL</th>
</thead>
<tbody>
<?php
$conn = $pdo->open();

try{
$stmt = $conn->prepare("select * from online_reservation1 where reservation_id = :reservation_id");
$stmt->execute(['reservation_id'=>$reservation_id]);
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
<td>GRMMNG_0".$reservation_id."</td>
<td>".$pet_name."</td>
<td>".$name."</td>
<td>".date('M. d, Y', strtotime($date))." <br>".$time."</td>
<td>&#8369; ".number_format($row['total'],2)."</td>
</tr> ";
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
<label for="name" class="col-sm-9 control-label" style="font-size:18px">SUBTOTAL:</label>
<label for="name" class="col-sm-1 control-label" style="font-size:18px">&#8369;</label>
<div class="col-sm-2">
<input type="text" class="form-control total1" name="total" autocomplete="off" style="background-color:white; border-color:white; font-size:18px; color:#009900; font-weight:bold; margin-top:2px;" readonly>
</div>
<label for="name" class="col-sm-9 control-label" style="font-size:18px">AMOUNT PAID:</label>
<label for="name" class="col-sm-1 control-label" style="font-size:18px">&#8369;</label>
<div class="col-sm-2">
<input type="text" class="form-control cash" name="amount_paid" autocomplete="off" style="background-color:white; border-color:white; font-size:18px; color:#009900; font-weight:bold; margin-top:2px;" readonly><hr />
</div>
<label for="name" class="col-sm-9 control-label" style="font-size:18px">CHANGE:</label>
<label for="name" class="col-sm-1 control-label" style="font-size:18px">&#8369;</label>
<div class="col-sm-2">
<input type="text" class="form-control _change" name="sukli" autocomplete="off" style="background-color:white; border-color:white; font-size:18px; color:#009900; font-weight:bold; margin-top:2px;" readonly>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
<form method="post" action="pdf.php">
<button type="submit" class="btn btn-success btn-flat" name="print"><i class="fa fa-file-pdf-o"></i> View as PDF</button>
</form>
<button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-print"></i> Print</button>
</div>
</form>
</div>
</div>
</div>