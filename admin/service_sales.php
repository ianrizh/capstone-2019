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
<h1><div align="right">
<a class = "btn btn-success btn-print" href = "#" onclick = "printContent('details')"><i class ="glyphicon glyphicon-print"></i> Print</a></div>

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
<!--<div class="box-header with-border">
<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" id="addproduct"><i class="fa fa-plus"></i> New Product</a>
</div>-->
<div class="box-body"><br>
<script>
function printContent(el)
{
var restorepage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorepage;
window.location.href='service_sales.php';
}
</script><?php include 'includes/scripts.php'; ?>
</head>

<body>
<?php
ini_set('display_errors',0);
	error_reporting(E_ALL & ~E_NOTICE);
		
	

	
	$todays=date("Y-m-d");
if(!isset($_POST['display']))
{
?>

<div class="column middle container" align="right">
	  <div class="box box-primary angel" >
		<font color="black">
				  <form method="post">
					<div class="form-group" >


						<div class="input-group">
						  <div class="input-group-addon" >
													<label>Date range:</label><i class="fa fa-calendar ""></i>
								<input type="date" name="date" id="reservation" max="<?php echo "$todays" ?>" required> 
						To <input type="date" name="date2" id="reservation" max="<?php echo "$todays" ?>" required>&nbsp;   
					<input type="submit" class="btn1 btn-primary" name="display" value="View Reports"> 
					
						  </div>
						  	
					</div>
                <!-- /.input group -->
					</div>
              <!-- /.form group --><br>
						
				</form>
				</font>
</div></div>
<?php }
else if(isset($_POST['display']))
{
$today=date('Y-m-d  H:i:s');
if($_POST['date']>$today || $_POST['date2']>$today)
{echo '<script> alert("Invalid Date");

</script>';
}
else{
$start1=$_POST['date'];
$end1=$_POST['date2'];
$start=date("Y/m/d",strtotime($start1));
$end=date("Y/m/d",strtotime($end1));
?>
<div class="column middle container table-wrapper-scroll-y" id="details">	<div align="center">
<font color="black"><img src="../images/STELLAS LOGO.jpg" style="height:70px; width:170px;" /><br />
<br
 <p class="w3-small"><font size="4">			<strong>STELLA ANIMAL CLINIC</strong></p>
  
  <h5><b> <font size="3">Date Issued: <?php date_default_timezone_set('Asia/Manila');
	 echo date("M d, Y h:i a");?></b></h5>
 <h5><b> <strong>SERVICE SALES REPORT AS OF </strong><?php echo date("M d, Y",strtotime($start))." to ".date("M d, Y",strtotime($end));?></b></h5>
			
  <table width="100%"  border="2" cellpadding="-1" cellspacing="0" style="color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:10px;"  >
  
   <tr>
          
</tr><p>&nbsp;</p><tr align="center"><td bgcolor="bluegreen"><font color="black"><font size="-1">Transaction Code </font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Customer Name</font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Service Name</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Category</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Date</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Price</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Product Used</font></td>
		   <td bgcolor="bluegreen"><font color="black"><font size="-1">Total</font></td>
		   	   <td bgcolor="bluegreen"><font color="black"><font size="-1">Date Issued</font></td>
		   <td bgcolor="bluegreen"><font color="black"><font size="-1">Action</font></td></tr>		
</div></div></div>
<?php } }?>