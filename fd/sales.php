<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <b>SALES</b>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <div class="pull-right">
                <!--form method="POST" class="form-inline" action="sales_print.php"-->
							<!--div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
							</div-->
							<button type="button" class="btn btn-primary btn-sm btn-flat float-right" name="print" data-toggle="modal" data-target="#modal_reportpreview">
								<span class="glyphicon glyphicon-print"></span> Print Preview
							</button>
						<!--/form-->
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
				  <th>DATE</th>
                  <th>SERVICE NAME</th>
                  <th>CATEGORY</th>
                  <th>PRICE</th>
                  <th>NO. OF SERVICE</th>
                  <th>TOTAL AMOUNT</th>
                </thead>
                <tbody>
							<?php
								$conn = $pdo->open();

								try{
									$stmt=$conn->prepare("
										SELECT
											r.thedate,
											r.id_services,
											s.name,
											s.price,
											s.id_category,
											c.id_category,
											c.category
										FROM
											reservation r
										LEFT JOIN services s
											ON r.id_services = s.id_services
										LEFT JOIN category c
											ON s.id_category = c.id_category
										WHERE
											r.thedate = DATE_FORMAT(CURRENT_DATE(),'%Y-%m-%d')
										GROUP BY
											r.id_services
									");

									$stmt->execute();
							?>
							<?php foreach($stmt as $row): ?>
								<tr>
									
									<td><?php echo date('M. d, Y', strtotime($row['thedate'])); ?></td>
									<td><?php if($row['id_services'] == '0') {echo 'Veterinary Health Care';} else { echo $row['name']; } ?></td>
									<td><?php if($row['id_services'] == '0') {echo 'Check Up';} else { echo $row['category']; } ?></td>
									<td><?php if($row['id_services'] == '0') {echo '&#8369; 250.00';} else { echo "&#8369; ".number_format($price,2).""; } ?></td>
									<?php
									$stmt=$conn->prepare("select sum(total) as amount, user_pets_id from reservation where status = 'Paid' group by id_services");
									$stmt->execute();
									foreach($stmt as $row1){
									$amount = $row1['amount'];
									$user_pets_id = $row1['user_pets_id'];
									$stmt=$conn->prepare("select * from user_pets where user_pets_id = '$user_pets_id'");
									$stmt->execute();
									foreach($stmt as $row2){
									$id_cust = $row2['id_cust'];
									}
									}
									$count = 0;
									$stmt1=$conn->prepare("SELECT  user_pets_id, COUNT(user_pets_id) AS numrows FROM reservation where status = 'Paid' ");
									$stmt1->execute();
									$a = $stmt1 -> fetch();
									$count = $a['numrows'];
									?>
									<td><?= $count ?></td>
									<td><?php echo  "&#8369; ".number_format($amount,2).""; ?></td>
								</tr>
							<?php endforeach; ?>
							<?php
								}
								catch(PDOException $e){
									echo $e->getMessage();
								}

								$pdo->close();
							?>
						</tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include '../includes/profile_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
</body>
</html>
