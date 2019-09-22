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
        <b>DELETED CATEGORY</b>
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
			  <a href="category.php"><button class='btn btn-primary btn-sm btn-flat'><i class="fa fa-arrow-left"></i> Back</button></a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
				  <th width="15"></th>
                  <th>NAME</th>
                  <th>TOOLS</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM category where deleted_date != '0000-00-00' order by category asc");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <tr>
						  	<td><input type='checkbox'></td>
                            <td>".$row['category']."</td>
                            <td>
                              <button class='btn btn-primary btn-sm restore btn-flat' data-id='".$row['id_category']."'><i class='fa fa-recycle'></i> Restore</button>
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
    <?php include 'includes/category_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id_category = $(this).data('id');
    getRow(id_category);
  });

  $(document).on('click', '.restore', function(e){
    e.preventDefault();
    $('#restore').modal('show');
    var id_category = $(this).data('id');
    getRow(id_category);
  });

});

function getRow(id_category){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id_category:id_category},
    dataType: 'json',
    success: function(response){
      $('.id_category').val(response.id_category);
      $('#edit_category').val(response.category);
	  $('#edit_type').val(response.type);
	  $('#edit_visible').val(response.visible);
      $('.category').html(response.category);
    }
  });
}
</script>
</body>
</html>
