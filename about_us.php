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
<style>
.container {
  position:relative;
  font-family: Arial;
}

.text-block {
  position: absolute; height: 70px;
  bottom: 10%;
  right: 10%;
  background-color: black;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}
</style>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="item active">
<img src="images/2.png" alt="First slide">
</div>
</div>
</div>
</div><br>
<br>
<div class='col-sm-12'>
<div class='box box-solid' style="height:250px">
<div class='box-body prod-body'>
<h2 align="center" style="color:#36bbbe"><b>STELLA'S ANIMAL CLINIC</b></h2>
<div class='box-footer' style="font-size:16px;" align="center">
Right now, your furbaby may be sick. But what your furbaby’s illness doesn’t know is—YOU HAVE US. ❤
<br><br>
Your Stella’s Animal Clinic Family - nope, it’s not the owner’s nor the doctor’s name. It’s actually named after Stella Artois, the doctor’s pet turned clinic cat and part-owner. Visit her here and let your furbabies experience Stella’s favorite routine check up (not really her favorite) or just learn about our products and services that your furbabies need. Surely our staff would love to accommodate you.
</div>
</div>
</div>

<div class="container">
  <img src="images/s1.jpg" alt="Nature" style="width:96%">
  <div class="text-block">
   <a href="index.php"> <h4>Visit Our Clinic</h4>    <p>Stella</p></a>
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