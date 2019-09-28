<style>
	#notification-count{		
		color: white;
		background-color:red;
		font-weight:bold;
		border-radius:50%;
		padding:5px 10px;
		float:right;
		margin-top:-5px;
	}
</style>
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
<div class="user-panel">
<div class="pull-left image">
<img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
</div>
<div class="pull-left info">
<p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
<a><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
<li class="header">REPORTS</li>
<li><a href="home.php"><i class="fa fa-dashboard"></i> <span> Dashboard</span></a></li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-files-o"></i>
		<span>Inventory</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
		<li><a href="products.php"><i class="fa fa-circle-o"></i> Products</a></li>
		<li><a href="expired_products.php"><i class="fa fa-circle-o"></i> Stocks</a></li>
	</ul>
</li>
<li class="treeview">
	<a href="#">
		<i class="fa fa-line-chart"></i>
		<span>Reports</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li class="treeview"><a href="#"><i class="fa fa-circle-o"></i><span> Inventory</span>
				<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="inventory_reports.php"><i class="fa fa-circle-o"></i> Per Batch</a></li>
		<li><a href="inventory_reportsall.php"><i class="fa fa-circle-o"></i> All Products</a></li>
	</ul>	

		</li>
		<li class="treeview">
	<a href="#">
		<i class="fa fa-circle-o"></i>
		<span>Sales</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><a href="product_sales.php"><i class="fa fa-circle-o"></i> Products</a></li>
		<li><a href="service_sales.php"><i class="fa fa-circle-o"></i> Services</a></li>
	</ul>
</li>
		<li><a href="stocks.php"><i class="fa fa-circle-o"></i> <span> Expired Products</span></a></li>
		<li><a href="wastage.php"><i class="fa fa-circle-o"></i> <span> Wastage</span></a></li>
	</ul>
</li>

<li class="header">MANAGE</li>
<?php
$count = 0;
$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE type = '0' and status = '0'");
$stmt->execute();
$row = $stmt -> fetch();
$count = $row['numrows'];
?>
<li><a href="users.php"><i class="fa fa-users"></i> Customers <span id="notification-count"><?php if($count>0) { echo $count; } else { echo 0; } ?></span></a></li>
<li><a href="suppliers.php"><i class="fa fa-phone"></i> <span> Suppliers</span></a></li>
<li><a href="schedule.php"><i class="fa fa-clock-o"></i> <span> Schedule</span></a></li>
<li><a href="services.php"><i class="fa fa-paw"></i> Services</a></li>
<li class="header">TRANSACTIONS</li>
<li><a href="reservations.php"><i class="fa fa-calendar"></i> Reservations</a></li>
</ul>
</section>
<!-- /.sidebar -->
</aside>