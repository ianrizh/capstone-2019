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
<img src="images/2.png" alt="First slide">
</div>
</div>
</div>
</div>
</section>  
About Us (Gitna)<br>
Our Purpose (Left) Picture (Right)<br>	
Schedule (Gitna)	  
</div>
</div>

<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>