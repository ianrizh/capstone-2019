<link rel="icon" href="STELLAS LOGO.jpg">
<?php include 'includes/session.php';

$name = $_GET['service'];

$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT *, services.name AS sername, category.category AS sername1, services.id_services AS serid FROM services LEFT JOIN category ON category.id_category=services.id_category WHERE services.name = :name");
$stmt->execute(['name' => $name]);
$service = $stmt->fetch();
$srvc = $service['name'];
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();


?>

<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>

<div class="content-wrapper">
<div class="container">

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-9">
<div class="callout" id="callout" style="display:none">
<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
<span class="message"></span>
</div>
<div class="row">
<div class="col-sm-6">
<input type="hidden" value="<?php echo $service['name']; ?>" name="name">
<img src="<?php echo (!empty($service['photo'])) ? 'images/'.$service['photo'] : 'images/noimage.jpg'; ?>" width="100%" class="zoom" data-magnify-src="images/large-<?php echo $service['photo']; ?>">
<br><br>
<form class="form-inline" id="productForm">
<div class="form-group">
<div class="input-group col-sm-5">
<input type="hidden" value="<?php echo $service['id']; ?>" name="id">
</div>
</div>
</div>
<div class="col-sm-6">
<h1 class="page-header"><b style="text-transform:uppercase"><?php echo $service['sername']; ?></b></h1>
<h3><b>&#8369; <?php echo number_format($service['price'], 2); ?></b></h3>
<p><b>Category: <?php echo $service['sername1']; ?></b></p>
<p><b>Description:</b></p>
<p><?php echo $service['details']; ?></p>
</div>
</div>
<br>
</div>
<div class="col-sm-3">
<?php include 'includes/sidebar.php'; ?>
</div>
</div>
</section>

</div>
</div>
<?php $pdo->close(); ?>
<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>