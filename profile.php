<?php include 'includes/session.php'; ?>
<?php
if(!isset($_SESSION['user'])){
header('location: index.php');
}
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
<?php
if(isset($_SESSION['error'])){
echo "
<div class='callout callout-danger'>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
echo "
<div class='callout callout-success'>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>
<div class="box box-solid">
<div class="box-body">
<div class="col-sm-3">
<img src="<?php echo (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%">
</div>
<div class="col-sm-9">
<div class="row">
<div class="col-sm-3">
<h4>Name:</h4>
<h4>Home Address:</h4>
<h4>Email Address:</h4>
<h4>Contact No:</h4>
</div>
<div class="col-sm-9">
<h4><?php echo $user['firstname'].' '.$user['lastname']; ?>
<span class="pull-right">
<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
</span>
</h4>
<h4><?php echo (!empty($user['home'])) ? $user['home'] : 'N/A'; ?></h4>
<h4><?php echo $user['email']; ?></h4>
<h4><?php echo (!empty($user['contact'])) ? $user['contact'] : 'N/A'; ?></h4>
</div>
</div>
</div>
</div>
</div>

<div class="box box-solid">
<div class="box-header with-border">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-lock"></i> CHANGE PASSWORD</b></h3>
<div class="box-body">
<form class="form-horizontal" method="POST" action="change_pass.php" enctype="multipart/form-data">
<div class="form-group">
<br>
<label for="password" class="col-sm-3 control-label">Current Password</label>
<div class="col-sm-9">
<input type="password" class="form-control" id="password" name="curr_password" value="<?php echo $user['password']; ?>" readonly>
</div>
</div>
<div class="form-group">
<label for="password" class="col-sm-3 control-label">New Password</label>
<div class="col-sm-9">
<input type="password" class="form-control" id="password" name="password" min="6" maxlength="12" autocomplete="off" autofocus required>
</div>
</div>
<div class="form-group">
<label for="password" class="col-sm-3 control-label">Confirm Password</label>
<div class="col-sm-9">
<input type="password" class="form-control" id="password" name="repassword" min="6" maxlength="12" autocomplete="off" required>
</div>
</div>
</div>
<button type="submit" class="btn btn-success btn-flat" name="update" style="width:100%"><i class="fa fa-check-square-o"></i> Update</button>
</form>
</div>
</div>
</div>
<div class="col-sm-3">
<?php include 'includes/sidebar.php'; ?>
</div>
</div>
</section>

</div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/profile_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
$(document).on('click', '.transact', function(e){
e.preventDefault();
$('#transaction').modal('show');
var id = $(this).data('id');
$.ajax({
type: 'POST',
url: 'transaction.php',
data: {id:id},
dataType: 'json',
success:function(response){
$('#date').html(response.date);
$('#transid').html(response.transaction);
$('#detail').prepend(response.list);
$('#total').html(response.total);
}
});
});

$("#transaction").on("hidden.bs.modal", function () {
$('.prepend_items').remove();
});
});
</script>
</body>
</html>