<link rel="icon" href="STELLAS LOGO.jpg">
<?php include 'includes/session1.php'; ?>
<?php include 'includes/header1.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<body class="hold-transition login-page">
<div class="wrapper" style="background-color:#ececf9;">

	<?php include 'includes/navbar1.php'; ?>
	
<div class="login-box" style="background-color:#ececf9;">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['error']."
            </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              ".$_SESSION['success']."
            </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body" style="padding:26px;">
    	<p class="login-box-msg" style="font-size:21px; font-weight:bold;">WELCOME TO <br>STELLA'S ANIMAL CLINIC</p>
    	<form action="verify1.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email Address" maxlength="50" min="15" autofocus required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" maxlength="12" min="6" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
			<p>
    			<div class="col-xs-4" style="width:100%">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" style="width:100%; background-image: linear-gradient(to right, rgb(54,187,190), rgb(239,183,78)); border:none;" name="login1"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
      <br><br><br><br><br>
      <a href="password_forgot.php">I forgot my password</a><br>
  	</div>
</div>
<footer class="main-footer" style="background-image: linear-gradient(to right, rgb(54,187,190), rgb(239,183,78)); color:white">
    <div class="container">
      <div class="pull-right hidden-xs">
    
      </div>
      &copy; 2019 Stella's Animal Clinic. All Rights Reserved
    </div>
</footer>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</body>
</html>