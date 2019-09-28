<script type="text/javascript">
function myFunction1() {
$.ajax({
url: "view_notification.php",
type: "POST",
processData:false,
success: function(data){					
$("#notification-latest1").show();$("#notification-latest1").html(data);
},
error: function(){}           
});
}
$(document).ready(function() {
$('body').click(function(e){
if ( e.target.id != 'notification-icon'){
$("#notification-latest1").hide();
}
});
});
</script>
<style>
#notification-count{		
	color: color;
	background-color:red;
	font-weight:bold;
	border-radius:50%;
	padding:5px 10px;
	border-radius:50%;
}
</style>
<header class="main-header">
<nav class="navbar navbar-static-top" style="background-image: linear-gradient(to right, rgb(54,187,190), rgb(239,183,78))">
<div class="container">
<div class="navbar-header">
<a href="index.php" class="navbar-brand"><img src="STELLAS LOGO.jpg" width="120" height="50" style="margin-top:-15px;" /></a>
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
<i class="fa fa-bars"></i>
</button>
</div>
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="about_us.php">ABOUT US</a></li>
<li><a href="contact_us.php">CONTACT US</a></li>
<?php
if(isset($_SESSION['user'])){
echo '
<li><a href="check_up.php">VETERINARY HEALTH CARE</a></li>';
}
else{
}
?>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">SERVICES <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<?php

$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT category FROM category WHERE category = 'Boarding' or category = 'Grooming' and deleted_date = '0000-00-00' ORDER BY category ASC");
$stmt->execute();
foreach($stmt as $row){
echo "
<li><a href='services.php?services=".$row['category']."'>".$row['category']."</a></li>
";              
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}

$pdo->close();

?>
</ul>
</li>
</ul>
</div>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<?php

if(isset($_SESSION['user'])){

$id_cust= $_SESSION['user'];

$stmt=$conn->prepare("select * from users where id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
$row1 = $stmt -> fetch();
$id_cust = $row1['id_cust'];
$stmt=$conn->prepare("select * from user_pets where id_cust = :id_cust");
$stmt->execute(['id_cust'=>$id_cust]);
$row2 = $stmt -> fetch();
$user_pets_id = $row2['user_pets_id'];
$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM reservation WHERE  user_pets_id=:user_pets_id and status !='Pending' and status!='Process Done' and status!='Paid'");
$stmt->execute(['user_pets_id'=>$user_pets_id]);
$row = $stmt -> fetch();
$count = $row['numrows'];


?>
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notification-icon" name="button" onClick="myFunction1()">
<i class="fa fa-bell"></i>
<span id="notification-count"><?php if($count> 0) { echo "$count"; } else { echo 0; } ?></span>
</a>
<ul class="dropdown-menu">
<li class="user-footer" style="background-color:#64748c;">
<div id="notification-latest1"></div>
</li>
</ul>
</li>
<?php 
echo '
<li class="dropdown messages-menu">
<!-- Menu toggle button -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-paw" style="font-size:20px"></i>
<span class="label label-success pet_count"></span>
</a>
<ul class="dropdown-menu">
<li class="header">
<a href="#addnew" data-toggle="modal"><i class="fa fa-plus"></i> NEW PET</a>';
if(isset($_SESSION['user'])){
$pet=0;
$stmt=$conn->prepare("SELECT *, COUNT(*) AS numrows FROM user_pets where id_cust=:id_cust");
$stmt->execute(['id_cust'=>$_SESSION['user']]);
$pet_row = $stmt -> fetch();
$pet = $pet_row['numrows'];
if($pet == 1){
echo '<a href="pet_profile.php"><i class="fa fa-eye"></i> PET PROFILE</a>';
}
else{
echo '<a href="#pet" data-toggle="modal"><i class="fa fa-eye"></i> PET PROFILE</a>';
}
}
echo '
</li>
<li>
</li>
</ul>
</li>';
}
?>
<?php
if(isset($_SESSION['user'])){
$image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
echo '
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height:50px;">
<img src="'.$image.'" class="user-image" alt="User Image" style="margin-top:0px;">
<span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
</a>
<ul class="dropdown-menu">
<!-- User image -->
<li class="user-header">
<img src="'.$image.'" class="img-circle" alt="User Image">
<p>
'.$user['firstname'].' '.$user['lastname'].'
</p>
</li>
<li class="user-footer">
<div class="pull-left">
<a href="profile.php" class="btn btn-default btn-flat">Profile</a>
</div>
<div class="pull-right">
<a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
</div>
</li>
</ul>
</li>
';
}
else{
echo '
<li><a href="login.php">LOGIN</a></li>
<li><a href="signup.php">SIGNUP</a></li>
';
}
?>
</ul>
</div>
</div>
</nav>
</header>
<?php include 'pet_profile.php'; ?>
<?php include 'pet_selection.php'; ?>
<?php
if(isset($_SESSION['user'])){
	$stmt = $conn->prepare("
		SELECT
			r.reservation_id,r.thedate,r.time_reservation,r.decline_remarks,p.pet_name
		FROM
			reservation r
		LEFT JOIN pets p
            ON r.user_pets_id = p.id_pet
		WHERE
			user_pets_id IN ( SELECT id_pet FROM pets WHERE id_cust=:id)
			AND status='Decline'
			AND flag_seen = 0
	");
	$stmt->execute(['id'=>$_SESSION['user']]);
	foreach($stmt as $row)
	{
		echo '
			<div class="modal fade declined_notif">
				<div class="modal-dialog" style="margin-top:200px;">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#7d0505;color:white;">
							<h3 class="modal-title"><i class="icon fa fa-warning"></i> NOTICE</h3>
						</div>
						<div class="modal-body" style="padding:10px 20px;">
							<h4>
								Your reservation request for your pet <strong>'.$row['pet_name'].', '.$row['thedate'].' '.$row['time_reservation'].'</strong> has been declined.<br><br>
								<strong>Reason:</strong> '.$row['decline_remarks'].'
							</h4>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal" style="float:left">
								<span class="fa fa-close"></span> CONFIRM
							</button>
						</div>
					</div>
				</div>
			</div>
		';
		$update = $conn->prepare("UPDATE reservation SET flag_seen=1 WHERE reservation_id = :id");
		$update->execute(['id'=>$row['reservation_id']]);
		/*
		echo "
			<br>
			<div class='alert alert-danger alert-dismissible'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			<h4><i class='icon fa fa-warning'></i> Notice!</h4>
			Your reservation request for your pet <strong>".$row['pet_name']."</strong> has been declined. Reason: <strong>".$row['decline_remarks']."</strong>
			</div>
		";
		*/
	}
}
?>