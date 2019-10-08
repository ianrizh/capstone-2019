<link rel="icon" href="STELLAS LOGO.jpg">
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
  if(!isset($_GET['code']) OR !isset($_GET['user'])){
    header('location: index.php');
    exit(); 
  }
?>
<body class="hold-transition skin-blue layout-top-nav">
<body class="hold-transition login-page">
<div class="wrapper" style="background-color:#ececf9;">
<?php include 'includes/navbar.php'; ?>
<div class="login-box" style="margin-bottom:110px; margin-top:100px; padding:10px;">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
    ?>
  	<div class="login-box-body" style="margin-bottom: 138px;">
    	<p class="login-box-msg" style="font-size:20px; font-weight:bold; text-transform: uppercase;">Enter new password</p>

    	<form action="password_new.php?code=<?php echo $_GET['code']; ?>&user=<?php echo $_GET['user']; ?>" method="POST">
      		<div class="form-group has-feedback">
        		<input type="password" class="form-control" name="password" placeholder="New password" required>
        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Re-type password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <br>
      		<div class="row">
    			<div class="col-xs-4" style="width: 100%">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" style="background-image: linear-gradient(to right, rgb(54,187,190), rgb(239,183,78)); border:none;" name="reset"><i class="fa fa-check-square-o"></i> Reset</button>
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