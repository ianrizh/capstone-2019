<link rel="icon" href="STELLAS LOGO.jpg">
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>

<div class="content-wrapper">
<div class="container">

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-9">
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
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
<li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
</ol>
<div class="carousel-inner">
<div class="item active">
<img src="images/Wal & Joe Jewelry.png" alt="First slide">
</div>
<div class="item">
<img src="images/Wal & Joe Jewelry (1).png" alt="Second slide">
</div>
<div class="item">
<img src="images/Wal & Joe Jewelry (2).png" alt="Third slide">
</div>
<div class="item">
<img src="images/Wal & Joe Jewelry (3).png" alt="Fourth slide">
</div>
<div class="item">
<img src="images/stellasanimalclinic.ask@gmail.com.png" alt="Fifth slide">
</div>
</div>
<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
<span class="fa fa-angle-left"></span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
<span class="fa fa-angle-right"></span>
</a>
</div>
<h2 style="font-weight:bold">PRODUCTS</h2>
<?php
$conn = $pdo->open();

try{
$inc = 3;	
$stmt = $conn->prepare("SELECT * from products where deleted_date = '0000-00-00' order by rand() limit 12");
$stmt->execute();
foreach ($stmt as $row) {
$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
$inc = ($inc == 3) ? 1 : $inc + 1;
if($inc == 1) echo "<div class='row'>";
echo "
<div class='col-sm-4'>
<div class='box box-solid'>
<div class='box-body prod-body'>
<img src='".$image."' width='100%' height='230px' class='thumbnail'>
<b style='text-transform:uppercase; color:#36bbbe'>".$row['name']."</b>
</div>
<div class='box-footer'>
<b>&#8369; ".number_format($row['price'], 2)."</b>
</div>
</div>
</div>
";
if($inc == 3) echo "</div>";
}
if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
if($inc == 2) echo "<div class='col-sm-4'></div></div>";
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();
?> 
</div>
<div class="col-sm-3">
<?php include 'includes/sidebar.php'; ?>
</div>
</div>
</section>

</div>
</div>

<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>