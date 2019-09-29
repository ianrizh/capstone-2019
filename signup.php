<link rel="icon" href="STELLAS LOGO.jpg">
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
if(isset($_SESSION['user'])){
header('location: index.php');
}

if(isset($_SESSION['captcha'])){
$now = time();
if($now >= $_SESSION['captcha']){
unset($_SESSION['captcha']);
}
}

?>
<body class="hold-transition skin-blue layout-top-nav">
<body class="hold-transition login-page">
<div class="wrapper" style="background-color:#ececf9;">
<?php include 'includes/navbar.php'; ?>
<div class="register-box" style="margin-bottom:110px; margin-top:100px; padding:10px;">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='callout callout-danger text-center'>
<p>".$_SESSION['error']."</p> 
</div>
";
unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
echo "
<div class='callout callout-success text-center'>
<p>".$_SESSION['success']."</p>  
</div>
";
unset($_SESSION['success']);
}
?>
<div class="register-box-body">
<p class="login-box-msg" style="font-size:20px; font-weight:bold;">REGISTER TO <br>STELLA'S ANIMAL CLINIC</p>
<form action="register.php" method="POST">
<div class="form-group has-feedback">
<input type="text" class="form-control" name="firstname" placeholder="First Name" autofocus autocomplete="off" maxlength="50" min="2" required>
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="text" class="form-control" name="lastname" placeholder="Last Name" autocomplete="off" maxlength="50" min="2" required>
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="email" class="form-control" name="email" placeholder="Email Address" autocomplete="off" maxlength="50" required>
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" maxlength="12" min="6" required>
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" name="repassword" placeholder="Confirm password" autocomplete="off" maxlength="12" min="6" required>
<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
</div>
<?php
if(!isset($_SESSION['captcha'])){
echo '
<di class="form-group" style="width:100%;">
<div class="g-recaptcha" data-sitekey="6LdZ3boUAAAAANx0YCiEIWbI1j3lCMTnh2Js8ZH_"></div>
</di>
';
}
?>
<hr>
<div class="row">
<div class="col-xs-4" style="width:100%">
<button type="submit" class="btn btn-primary btn-block btn-flat" style="width:100%; background-image: linear-gradient(to right, rgb(54,187,190), rgb(239,183,78)); border:none;" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
</div>
</div>
</form>
</div>
</div>
<?php include 'includes/footer.php' ?>
</div>
<?php include 'includes/scripts.php' ?>
</body>
</body>
</html>