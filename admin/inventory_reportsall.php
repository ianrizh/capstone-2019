<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

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
<div class="box-header with-border">
<a class = "btn btn-success btn-print btn-flat" href = "#" onclick = "printContent('details')"><i class ="glyphicon glyphicon-print"></i> Print</a>
<div class="pull-right">
<form class="form-inline">
<div class="form-group">
<?php
$s=fill_brand($conn);
  echo '<label>Category: </label>';
  echo "<select name='product' id='product' class='form-control input-sm btn-print' style='margin-left:5px;'>
  <option value=''>All Product</option>$s";
  echo '</select>';?>
  
</div>
</form>
</div>
</div>
<div class="box-body">
<script>
function printContent(el)
{
var restorepage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorepage;
window.location.href='inventory_reportsall.php';
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
<div class="box-body table-wrapper-scroll-y" id="details">	<div align="center">
<font color="black"><img src="../images/STELLAS LOGO.jpg" style="height:70px; width:170px;" />
<br>
 <p class="w3-small"><font size="4">			<strong>STELLA ANIMAL CLINIC</strong></p>
  <h5><b> <font size="3">PRODUCT INVENTORY of <?php date_default_timezone_set('Asia/Manila');
	 echo date("Y");?></b></h5>


			<div id="show_product">
  <table class="table table-bordered" >
  
  <tr align="center"><td bgcolor="bluegreen"><font color="black"><font size="-1"><b>PRODUCT ID</b></font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1"><b>PRODUCT NAME</b></font></td>
          <td bgcolor="bluegreen"><font color="black"><font size="-1"><b>CATEGORY</b></font></td>
		  <td bgcolor="bluegreen"><font color="black"><font size="-1"><b>STOCK LEFT</b></font></td></tr>
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
          {?>
		  <td><font color="black"><font size="-1"><?php echo $categ['category']; ?></font></td>
		  <td><font color="black"><font size="-1"><?php echo  $row['total_stocks']; ?></font></td>
		</tr>
		  
          <?php  
       			$total=0;
			 $total+=$row['total_stocks'];
			 $grand+=$total;}
          ?>
          	<?php }

		  	 ?>
		  </tr>	
		  <tr align="center">
                        <th colspan="3" style="text-align: right"><font size="-1">TOTAL</font></th>
                        
						
						<th><div align="center"><font size="-1"><?php $s=number_format($grand); echo "$s"; ?></div></font></th>
						
                      
                      </tr>
</div></div></div>
</div></div></section>


<?php include 'includes/scripts.php'; ?>

<script>
  $(document).ready(function(){
    $("#product").change(function(){
      var category= $(this).val();
      $.ajax({
        url:"categories2.php",
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
