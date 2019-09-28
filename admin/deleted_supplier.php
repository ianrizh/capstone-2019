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
        <b>DELETED SUPPLIER</b>
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
			  <a href="suppliers.php"><button class='btn btn-primary btn-sm btn-flat'><i class="fa fa-arrow-left"></i> Back</button></a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
				  <th width="15"></th>
                  <th>CONTACT PERSON</th>
				  <th>CONTACT NUMBER</th>
                  <th>PRODUCT</th>
				  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM suppliers where deleted_date != '0000-00-00'");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <tr>
						  	<td><input type='checkbox'></td>
                            <td>".$row['contact_person']."</td>
							<td>".$row['contact_number']."</td>
							<td>".$row['product']."</td>
                            <td>
                              <button class='btn btn-primary btn-sm restore btn-flat' data-id='".$row['id_supplier']."'><i class='fa fa-recycle'></i> Restore</button>
                            </td>
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
    <?php include 'includes/suppliers_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){

  $(document).on('click', '.restore', function(e){
    e.preventDefault();
    $('#restore').modal('show');
    var id_supplier = $(this).data('id');
    getRow(id_supplier);
  });

});

function getRow(id_supplier){
  $.ajax({
    type: 'POST',
    url: 'suppliers_row.php',
    data: {id_supplier:id_supplier},
    dataType: 'json',
    success: function(response){
      $('.id_supplier').val(response.id_supplier);
      $('#edit_contact_person').val(response.contact_person);
	  $('.contact_person').val(response.contact_person);
	  $('.product').val(response.product);
	  $('#edit_contact_number').val(response.contact_number);
	  $('#edit_product').val(response.product);
      $('#catselected').val(response.product);
    }
  });
}
</script>
</body>
</html>
