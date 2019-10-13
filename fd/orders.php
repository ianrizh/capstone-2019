<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- STYLING FOR TAB CONTAINER -->
<style>
/* Style the tab */
.tab {
overflow: hidden;
border: 1px solid #ccc;
background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
background-color: inherit;
float: left;
border: none;
outline: none;
cursor: pointer;
padding: 14px 16px;
transition: 0.3s;
font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
border-bottom: none;
}

.tabcontent {
animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
from {opacity: 0;}
to {opacity: 1;}
}
</style>

<script>
function printContent(el)
{
var restorepage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorepage;
window.location.href='orders.php';
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="tab">
<button class="tablinks" onClick="openTab(event, 'tab_orders')" id="defaultOpen">ORDERS</button>
<button class="tablinks" onClick="openTab(event, 'tab_services')">SERVICES</button>
</div>

<div class="content">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger alert-dismissible' style='width:80% margin-top:10px;'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Ooops!</h4>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible' style='width:80% margin-top:10px;'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-check'></i> Success!</h4>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>


<div id="insufficiientproducts_container"></div>

<!-- ORDERS -->
<div id="tab_orders" class="tabcontent">
<div class="box">
<div class="box-body">	
<table class="table" id="tbl_orders">
<thead>
<tr>
<th style="text-align:center">PRODUCT</th>
<th style="text-align:center">QUANTITY</th>
<th style="text-align:center">PRICE</th>
<th style="text-align:center">AMOUNT</th>
<th style="text-align:center"></th>
</tr>
</thead>
<tbody>
<tr>
<td>
<div class="form-group">
<select class="form-control order_product">
<option value="" disabled selected required>---Select---</option>
<?php
$conn = $pdo->open();

try {
$stmt = $conn->prepare("SELECT * FROM products where deleted_date = '0000-00-00'");
$stmt->execute();
?>
<?php foreach($stmt as $row): ?>
<option value="<?= $row['id_products'] ?>" data-price="<?= $row['price'] ?>"><?= $row['name'] ?></option>
<?php endforeach; ?>
<?php
}
catch(PDOException $e){
echo $e->getMessage();
}

$pdo->close();
?>
</select>
</div>
</td>
<td>
<div class="form-group">
<input type="text" class="form-control text-right order_quantity" />
</div>
</td>
<td>
<div class="form-group">
<input type="text" class="form-control text-right order_price" readonly/>
</div>
</td>
<td>
<div class="form-group">
<input type="text" class="form-control text-right order_amount" readonly/>
</div>
</td>
<td>
<button class="btn btn-danger btn_deleterow">X</button>
</td>
</tr>
</tbody>
</table>
<button class="btn btn-primary btn-sm btn-flat" id="btn_addorder" style="margin-left:8px"><i class="fa fa-plus"></i> ADD ORDER</button>
<div class="row">
<div class="col-sm-6"></div>
<div class="col-sm-3" style="text-align:right">
<label>CASH</label>
</div>
<div class="col-sm-3">
<div class="form-group">
<input type="text" class="form-control text-right" id="order_cash" />
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6"></div>
<div class="col-sm-3" class="col-sm-3" style="text-align:right">
<label>TOTAL AMOUNT</label>
</div>
<div class="col-sm-3">
<div class="form-group">
<input type="text" class="form-control text-right" id="order_total" readonly/>
</div>
</div>
</div>
<div class="row" style="text-align:right;margin:20px 1px 0px 0px;">
<button type="button" id="btn_viewsummary" class="btn btn-success btn-flat"><i class="fa fa-check"></i> CHECK OUT</button>
</div>
</div>
</div>
</div>
<!-- ORDERS -->

<!-- SERVICES (START) -->
<div id="tab_services" class="tabcontent">
<div class="box">
<div class="box-body">
<form method="post"action="walk-in_una.php">
<div class='box-header'>
<h3 class='box-title' style='color:#36bbbe;'><b><i class='fa fa-user'></i> NEW CUSTOMER DETAILS</b></h3>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label" style="text-align:right">FIRST NAME</label>
<div class="col-sm-8" style="margin-bottom:15px;">
<input type="text" class="form-control" name="firstname" id="firstname" autofocus required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label" style="text-align:right">LAST NAME</label>
<div class="col-sm-8" style="margin-bottom:15px;">
<input type="text" class="form-control" name="lastname" id="lastname" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label" style="text-align:right">CONTACT NUMBER</label>
<div class="col-sm-8" style="margin-bottom:15px;">
<input type="text" class="form-control" name="contact" id="contact" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label" style="text-align:right">EMAIL ADDRESS</label>
<div class="col-sm-8" style="margin-bottom:30px;">
<input type="email" class="form-control" name="email" id="email" required>
</div>
</div>
<button type="submit" class="btn btn-success btn-sm btn-flat" name="next" style="width: 100%;"><i class="fa fa-arrow-right"></i> Next</button>
</form>
</div>
</div>

<div class="box">
<div class="box-body">
<form method="post">
<div class='box-header'>
<h3 class='box-title' style='color:#36bbbe;'><b><i class='fa fa-user'></i> OLD CUSTOMER DETAILS</b></h3>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label" style="text-align: right">EMAIL ADDRESS</label>
<div class="col-sm-8">
<select class="form-control select2" onChange="onSelect(this.value)" style="width: 100%" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM users where type = '0'");
$stmt->execute();
foreach($stmt as $crows){
$id_cust = $crows['id_cust'];
$email = $crows['email'] ;
echo "
<option value='$id_cust'>".$email."</option>
";
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select>
</div>
</div>
<div id="details">
</div>
<script>
 function onSelect(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details").innerHTML=this.responseText;
	}
	a.open('GET', "details.php?id_cust="+str,true);
	a.send();
 }
</script>
</form>
</div>
</div>
</div>
</div>
</div>

<!-- SCRIPT FOR TAB CONTAINER -->
<script type="text/javascript">
function openTab(evt, tab_id) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}
document.getElementById(tab_id).style.display = "block";
evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/orders_modal.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(window).on('load',function(){
$('#mdl_addorder').modal('show');
});
$(function(){
$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var id_emp = $(this).data('id');
getRow(id_emp);
});

$(document).on('click', '.photo', function(e){
e.preventDefault();
var id_emp = $(this).data('id');
getRow(id_emp);
});

});

function getRow(id_emp){
$.ajax({
type: 'POST',
url: 'employees_row.php',
data: {id_emp:id_emp},
dataType: 'json',
success: function(response){
$('.id_emp').val(response.id_emp);
$('#edit_email').val(response.email);
$('#edit_firstname').val(response.firstname);
$('#edit_lastname').val(response.lastname);
$('#edit_home').val(response.home);
$('#edit_id_position').val(response.id_position);
$('#catselected').val(response.id_position).html(response.position);
$('#edit_contact').val(response.contact);
$('#edit_fullname').val(response.firstname+' '+response.lastname);
$('.fullname').html(response.firstname+' '+response.lastname);
getCategory();
}
});

}
</script>
</body>
</html>
