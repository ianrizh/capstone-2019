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


<h1><div class="container" align="right">

<?php
$s=fill_brand($conn);
		echo '';
  echo '<font size="3"><label class="btn-print">Category</label>';
    			
                echo "<select name='product' id='product' class='btn-print'><option value=''>All Product</option>$s";
              echo '</select>';echo ''; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class = "btn btn-success btn-print" href = "#" onclick = "printContent('details')"><i class ="glyphicon glyphicon-print"></i> Print</a></div>
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
window.location.href='inventory_reports.php';
}
</script>

<?php
	ini_set('display_errors',0);
	error_reporting(E_ALL & ~E_NOTICE);
	$conn = $pdo->open();

	        function fill_brand($conn)
        {
            $output = '';

		try{
			$stmt = $conn->prepare("SELECT * FROM category");
			$stmt->execute();
			foreach($stmt as $categ)
			{
			$output .= '<option value="'.$categ["id_category"].'">'.$categ["category"].'</option>';
			}
			return $output;
		}	
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>         
<div class="column middle container table-wrapper-scroll-y" id="details">	<div align="center">
<font color="black"><img src="../images/STELLAS LOGO.jpg" style="height:70px; width:170px;" /><br />
<br>
 <p class="w3-small"><font size="4">			<strong>STELLA ANIMAL CLINIC</strong></p>
  <h5><b> <font size="3">PRODUCT INVENTORY as of <?php date_default_timezone_set('Asia/Manila');
	 echo date("M d, Y h:i a");?></b></h5>


			<div id="show_product">
  <table width="100%"  border="3" cellpadding="0" cellspacing="0" style="color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:10px;"  >
  
  <tr align="center"><td bgcolor="bluegreen"><font color="black"><font size="-1">Product ID </font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Product Name</font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1">Category</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Expiration Date</font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1">Stock Left</font></td></tr>
		  	<?php
		  	$conn = $pdo->open();
		  	$stmt=$conn->prepare("select * from products where deleted_date= '0000-00-00'");
		  	$stmt->execute();
		  	foreach($stmt as $row){ ?>
		  	<tr align="center">
		  <td><font color="black"><font size="-1"><?php $productid=$row['id_products']; echo "$productid"?> </font></td>
          <td><font color="black"><font size="-1"><?php echo $row['name']; $categ=$row['id_category'];?></font></td>
          <?php $stmt=$conn->prepare("select * from category where id_category = :categ");
          $stmt->execute(['categ'=>$categ]);
          foreach($stmt as $categ)
         {

      ?>
		  <td><font color="black"><font size="-1"><?php echo $categ['category']; ?></font></td>
		  <td><font color="black"><font size="-1"></font></td>
		  
		  <td><font color="black"><font size="-1"><?php  echo  $row['total_stocks']	; ?></font></td>
		</tr>
		  <?php $stmt=$conn->prepare("select * from stocks_expired where id_products = :productid and expired_date >= CURRENT_DATE() or id_products = :productid and expired_date = 0000-00-00");
          $stmt->execute(['productid'=>$productid]);
          foreach($stmt as $exp)
          {

          	?>
		  	<tr align="center">
		  <td><font color="black"><font size="-1"> </font></td>
          <td><font color="black"><font size="-1"></font></td>
		  <td><font color="black"><font size="-1"><?php echo $categ['category']; ?></font></td>
		  
		  <td><font color="black"><font size="-1"><?php echo $exp['expired_date'] ?></font></td>
		 
		  <td><font color="black"><font size="-1"><?php echo  $exp['stocks']; ?></font></td>
          <?php } }
          ?>
          	<?php }
		  	 ?>
		  </tr>	
</div></div></div>
</div></div></section>
<?php include 'includes/scripts.php'; ?>
<script>
  $(document).ready(function(){
    $("#product").change(function(){
      var category= $(this).val();
      $.ajax({
        url:"categories.php",
        method:"POST",
        data:{category:category},
        success:function(data){
          $("#show_product").html(data);
        }
      });
    });

  });

</script>

</div></body></html >
