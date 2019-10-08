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
<li><a href="expired_products.php"><i class="fa fa-cubes"></i> <span> Stocks</span></a></li>
<li><a href="stocks.php"><i class="fa fa-clock-o"></i> <span> Expired Products</span></a></li>
</li>
<li class="header">MANAGE</li>
<?php
$count = 0;
$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE type = '0' and status = '0'");
$stmt->execute();
$row = $stmt -> fetch();
$count = $row['numrows'];
?>
<li><a href="users.php"><i class="fa fa-users"></i> <span> Customers <span id="notification-count"><?php if($count>0) { echo $count; } else { echo 0; } ?></span></span></a></li>
<li><a href="products.php"><i class="fa fa-product-hunt"></i> <span> Products</span></a></li>

<li class="header">TRANSACTIONS</li>
<?php
$count = 0;
$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE id_services != 0 and status = 'Pending'");
$stmt->execute();
$row = $stmt -> fetch();
$count = $row['numrows'];
?>
<li><a href="reservations.php"><i class="fa fa-calendar"></i> <span> Confirmation <span id="notification-count"><?php if($count>0) { echo $count; } else { echo 0; } ?></span></span></a></li>
<li><a href="orders.php"><i class="fa fa-male"></i> <span> Walk In</span></a></li>
<?php
$count = 0;
$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE status = 'Process Done'");
$stmt->execute();
$row = $stmt -> fetch();
$count = $row['numrows'];
?>
<li><a href="suppliers.php"><i class="fa fa-money"></i> <span> Payment <span id="notification-count"><?php if($count>0) { echo $count; } else { echo 0; } ?></span></span></a></li>
</ul>
</section>
<!-- /.sidebar -->
</aside>