<?php include 'includes/session.php'; ?>
<?php

$categ = $_GET['services'];

$conn = $pdo->open();

try{
$stmt = $conn->prepare("SELECT * FROM category WHERE category = :categ");
$stmt->execute(['categ' => $categ]);
$ser = $stmt->fetch();
$serid = $ser['id_category'];
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
<h1 class="page-header" style="text-transform:uppercase; font-weight:bold; color:#efb74e"><?php echo $ser['category']; ?></h1>
<?php

$conn = $pdo->open();

try{
$inc = 3;	
$stmt = $conn->prepare("SELECT * FROM services WHERE id_category = :serid and deleted_date = '0000-00-00'");
$stmt->execute(['serid' => $serid]);
foreach ($stmt as $row) {
$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
$inc = ($inc == 3) ? 1 : $inc + 1;
$id_services=$row['id_services'];
$name = $row['name'];
if($inc == 1) echo "<div class='row'>";
echo "
<div class='col-sm-4'>
<div class='box box-solid'>
<div class='box-body prod-body'>
<img src='".$image."' width='100%' height='200px' class='thumbnail'>
<b><a href='service.php?service=".$row['name']."' style='text-transform:uppercase; color:#36bbbe; font-size: 16px'>".$row['name']."</a></b><br>
<b>&#8369; ".number_format($row['price'], 2)."</b>";
echo"
</div>
<div class='box-footer'>";
?>
<?php
if(!isset($_SESSION['user'])){
echo "
<a href='#appointment' class='btn btn-success btn-md btn-flat' data-toggle='modal' style='width:100%'><i class='fa fa-calendar'></i> Make Appointment</a>";
}
else{
 
  $stmt=$conn->prepare("SELECT *,COUNT(*) as numrows from reservation where id_services = '$id_services' and status !='Decline'");
  $stmt->execute();
  $row1=$stmt->fetch();
  
    echo "
<a href='appointment.php?service=".$row['id_services']."' class='btn btn-success btn-md btn-flat' style='width:100%'><i class='fa fa-calendar'></i> Create Appointment</a>";
 

}
?>
<?php 
echo "
</div>
</div>
</div>
";
if($inc == 3) echo "</div>";
}
if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
if($inc == 2) echo "<div class='col-sm-4'></div></div>";
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?> 
</div>
<div class="col-sm-3">
<?php include 'includes/sidebar.php'; ?>
</div>
</div>
</section>

</div>
</div>

<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<?php include 'includes/appointment_modal.php'; ?>
</div>
<script>
$(function(){
  $(document).on('click', '.appointment', function(e){
    e.preventDefault();
    $('#appointment').modal('show');
    var id_services = $(this).data('id');
    getRow(id_services);
  });

});

function getRow(id_services){
  $.ajax({
    type: 'POST',
    url: 'appointment_row.php',
    data: {id_services:id_services},
    dataType: 'json',
    success: function(response){
      $('.id_services').val(response.id_services);
      $('#id_services').val(response.id_services);
	  $('#id_category').val(response.id_category);
	  $('#name').val(response.name);
    }
  });
}
</script>
</body>
</html>