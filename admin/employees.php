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
        <b>EMPLOYEES</b>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Empployee</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>PHOTO</th>
                  <th>NAME</th>
                  <th>POSITION</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM employee WHERE id_position != 0");
                      $stmt->execute();
                      foreach($stmt as $row){
					  	$id_position = $row['id_position'];
                        $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/profile.jpg';
						$stmt = $conn->prepare("SELECT * FROM position WHERE id_position = '$id_position'");
                     		 $stmt->execute();
                     		 foreach($stmt as $rows){
                        echo "
                          <tr>
                            <td>
                              <img src='".$image."' height='50px' width='50px'>
                            </td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
							<td>".$rows['position']."</td>
                            <td>
                              <button class='btn btn-default btn-sm edit btn-flat' data-id='".$row['id_emp']."'><i class='fa fa-eye'></i> View Details</button>
                              <a href='cart.php?user=".$row['id_emp']."' class='btn btn-primary btn-sm btn-flat'><i class='fa fa-shopping-cart'></i> Cart</a>
                            </td>
                          </tr>
                        ";
						}
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
    <?php include 'includes/employees_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id_emp = $(this).data('id');
    getRow(id_emp);
  });

  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id_emp = $(this).data('id');
    getRow(id_emp);
  });

});

function getRow(id_emp){
  $.ajax({
    type: 'POST',
    url: 'employees_row.php',
    data: {id_emp:id_emp},
    dataType: 'json',
    success: function(response){
      $('.id_emp').val(response.id_emp);
      $('#edit_email').val(response.email);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
	  $('#edit_home').val(response.home);
	  $('#edit_id_position').val(response.id_position);
      $('#catselected').val(response.id_position).html(response.position);
      $('#edit_contact').val(response.contact);
	  $('#edit_fullname').val(response.firstname+' '+response.lastname);
      $('.fullname').html(response.firstname+' '+response.lastname);
	  getCategory();
    }
  });
}
function getCategory(){
  $.ajax({
    type: 'POST',
    url: 'position_fetch.php',
    dataType: 'json',
    success:function(response){
      $('#position').append(response);
      $('#edit_position').append(response);
    }
  });
}
</script>
</body>
</html>
