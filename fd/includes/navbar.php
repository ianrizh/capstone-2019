<header class="main-header">
<!-- Logo -->
<a class="logo" href="./home.php">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini">SAC</span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg">Stella's Animal Clinic</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" style="background-image: linear-gradient(to right, rgb(54,187,190), rgb(239,183,78)); color:white">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<!-- User Account: style can be found in dropdown.less -->
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account</a>
				<ul class="dropdown-menu">
					<!-- User image -->
					<li class="user-header">
						<img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
						<p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
					</li>
					<li class="user-footer">
						<div class="pull-left">
							<a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Profile</a>
						</div>
						<div>
							<a href="#password" data-toggle="modal" class="btn btn-default btn-flat" style="margin-left:15px" id="admin_password">Password</a>
							<div class="pull-right">
								<a href="../logout1.php" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>


</header>
<?php include 'includes/profile_modal.php'; ?>
<?php include 'includes/change_password.php'; ?>
