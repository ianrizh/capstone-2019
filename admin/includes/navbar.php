<style>
	#notification-count{		
		color: color;
		background-color:red;
		font-weight:bold;
		border-radius:50%;
		padding:5px 10px;
		border-radius:50%;
	}

	/* STYLING FOR SCROLLBARS */
	/* width */
	::-webkit-scrollbar {
	  width: 10px;
	}

	/* Track */
	::-webkit-scrollbar-track {
	  background: #f1f1f1;
	}

	/* Handle */
	::-webkit-scrollbar-thumb {
	  background: #888;
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
	  background: #555;
	}
	/* STYLING FOR SCROLLBARS - END */
</style>
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
			<?php
				$count = 0;
				$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services = 0 and status = 'Pending'");
				$stmt->execute();
				$row = $stmt -> fetch();
				$count = $row['numrows'];
			?>
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notification-icon" name="button" onClick="myFunction1()">
					<i class="fa fa-bell"></i>
					<span id="notification-count"><?php if($count>0) { echo $count; } else { echo 0; } ?></span>
				</a>
				<ul class="dropdown-menu" style="max-height:500px;overflow-y:auto">
					<li class="user-footer" style="background-color:#64748c;">
						<div id="notification-latest1"></div>
					</li>
				</ul>
			</li>
			<?php
				$count = 0;
				$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM stocks_expired WHERE stocks <= '10'");
				$stmt->execute();
				$row = $stmt -> fetch();
				$count = $row['numrows'];
			?>
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notification-icon" name="button" onClick="myFunction()">
					<i class="fa fa-cubes"></i>
					<span id="notification-count"><?php if($count>0) { echo $count; } else { echo 0; } ?></span>
				</a>
				<ul class="dropdown-menu" style="max-height:500px;overflow-y:auto">
					<li class="user-footer" style="background-color:#64748c;">
						<div id="notification-latest"></div>
					</li>
				</ul>
			</li>
			<?php
				$count = 0;
				$stmt=$conn->prepare("SELECT COUNT(*) AS numrows FROM stocks_expired where expired_date > CURRENT_DATE() and expired_date < (NOW() + INTERVAL 7 DAY)");
				$stmt->execute();
				$row = $stmt -> fetch();
				$count = $row['numrows'];
			?>
			<li class="dropdown user user-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notification-icon" name="button" onClick="myFunction2()">
					<i class="fa fa-clock-o"></i>
					<span id="notification-count"><?php if($count>0) { echo $count; } else { echo 0; } ?></span>
				</a>
				<ul class="dropdown-menu" style="max-height:500px;overflow-y:auto">
					<li class="user-footer" style="background-color:#64748c;">
						<div id="notification-latest2"></div>
					</li>
				</ul>
			</li>
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
