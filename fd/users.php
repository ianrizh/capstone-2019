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
        <b>CUSTOMERS</b>
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
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>PHOTO</th>
                  <th>NAME</th>
                  <th>EMAIL ADDRESS</th>
				          <th>STATUS</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM users WHERE type=:type");
                      $stmt->execute(['type'=>0]);
                      foreach($stmt as $row){
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
						$status = ($row['status']) ? '<span class="label label-success">Activated</span>' : '<span class="label label-danger">Not Verified</span>';
                        $active = (!$row['status']) ? '<span class="pull-right"><a href="#activate" class="status activate" data-toggle="modal" data-id="'.$row['id_cust'].'"><i class="fa fa-check-square-o"></i></a></span>' : '';
                        echo "
                          <tr>
                            <td width='50'>
                              <img src='".$image."' height='50px' width='50px'>
                            </td>
                            <td width='400'>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>".$row['email']."</td>
							<td>
                              ".$status."
                              ".$active."
                              
                            </td>
                            <td><a href='history1.php?user=".$row['id_cust']."' class='btn btn-info btn-sm btn-flat'><i class='fa fa-eye'></i> History</a></td>
                          </tr>
                        ";
                      }
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
    <?php include 'includes/users_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.activate', function(e){
    e.preventDefault();
    $('#activate').modal('show');
    var id_cust = $(this).data('id');
    getRow(id_cust);
  });

});

function getRow(id_cust){
  $.ajax({
    type: 'POST',
    url: 'users_row2.php',
    data: {id_cust:id_cust},
    dataType: 'json',
    success: function(response){
      $('.id_cust').val(response.id_cust);
	  $('#edit_fullname').val(response.firstname+' '+response.lastname);
      $('.fullname').html(response.firstname+' '+response.lastname);
    }
  });
}
</script>
</body>
</html>
