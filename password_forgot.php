<link rel="icon" href="STELLAS LOGO.jpg">
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
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
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body">
    	<p class="login-box-msg" style="font-size:20px; font-weight:bold; text-transform: uppercase;">Enter email address associated with account</p>

    	<form action="reset.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email Address" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
      		<div class="row">
    			<div class="col-xs-4" style="width: 100%">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" style="background-image: linear-gradient(to right, rgb(54,187,190), rgb(239,183,78)); border:none;" name="reset"><i class="fa fa-send"></i> Send</button>
        		</div>
      		</div>
    	</form>
      <br><br><br><br><br><br><br><br>
      <a href="login.php">I remembered my password</a><br>
  	</div>
</div>
<?php include 'includes/footer.php' ?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</body>
</html>