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
<div class="col-sm-12">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger'>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="item active">
<img src="images/1.png" alt="First slide">
</div>
</div>
</div>
<br>
<div class='col-sm-6'>
<div class='box box-solid' style="height:200px">
<div class='box-body prod-body'>
<h2 align="center" style="color:#36bbbe"><b>CONTACT & EMAIL</b></h2>
<div class='box-footer' style="font-size:16px;" align="center">
Cell: (0916) 643712<br>
Cell: (0917) 8612362<br>
Tel: (02) 738 7344<br>
Email: stellas.animal.clinic.custcare@gmail.com
</div>
</div>
</div>
</div>	
<div class='col-sm-6'>
<div class='box box-solid' style="height:200px">
<div class='box-body prod-body'>
<h2 align="center" style="color:#36bbbe"><b>LOCATION</b></h2>
<div class='box-footer' style="font-size:16px;" align="center">
<br>
Unit 25 Emerald Complex, P. Tuazon Blvd, Project 4, Quezon City, Metro Manila<br>
</div>
</div>
</div>
</div>	
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