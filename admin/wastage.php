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
        <b>WASTAGE</b>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Wastage</a>
              <div class="pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <a class = "btn btn-success btn-print btn-sm btn-flat" href = "#" onclick = "printContent('details')"><i class ="glyphicon glyphicon-print"></i> Print</a>
                  </div>
                </form>
              </div>
              </div>
            <div class="box-body" id="details">
<script>
function printContent(el)
{
var restorepage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorepage;
window.location.href='wastage.php';
}
</script>
              <table class="table table-bordered">
                <thead>
                  <th>PRODUCT NAME</th>
          <th>CATEGORY</th>
          <th>PRICE</th>
          <th>BATCH NUMBER</th>
          <th>EXPIRATION DATE</th>
          <th>QUANTITY</th>
          <th>REASON</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT * FROM wastage w LEFT JOIN products p ON w.id_products=p.id_products");
                      $stmt->execute();
                      foreach($stmt as $row){
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
              <td>".$row['category']."</td>
              <td>&#8369; ".number_format($row['price'],2)."</td>
              <td>".$row['batch_number']."</td>
              <td>".date('M. d, Y', strtotime($row['expired_date']))."</td>
              <td>".$row['qty']."</td>
              <td>".$row['reason']."</td>
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
    <?php include 'includes/expired_modal3.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>


</script>
</body>
</html>
