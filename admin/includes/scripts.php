<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Moment JS -->
<script src="../bower_components/moment/moment.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="../bower_components/chart.js/Chart.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->

<!-- bootstrap time picker -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>
<!-- Active Script -->
<script>
$(function(){
	/** add active class and stay opened when selected */
	var url = window.location;
  
	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //CK Editor
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });
</script>
<script type="text/javascript">
function myFunction() {
$.ajax({
url: "view_notification2.php",
type: "POST",
processData:false,
success: function(data){          
$("#notification-latest").show();$("#notification-latest").html(data);
},
error: function(){}           
});
}
$(document).ready(function() {
$('body').click(function(e){
if ( e.target.id != 'notification-icon'){
$("#notification-latest").hide();
}
});
});
</script>
<script type="text/javascript">
  function myFunction1() {
    $.ajax({
      url: "view_notification.php",
      type: "POST",
      processData:false,
      success: function(data){          
        $("#notification-latest1").show();
        $("#notification-latest1").html(data);
      }           
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
<script type="text/javascript">
  function myFunction2() {
    $.ajax({
      url: "view_notification3.php",
      type: "POST",
      processData:false,
      success: function(data){          
        $("#notification-latest2").show();
        $("#notification-latest2").css('overflow-y','auto');
        $("#notification-latest2").css('max-height','70vh');
        $("#notification-latest2").html(data);
      },
      error: function(){}           
    });
  }

  $(document).ready(function() {
  $('body').click(function(e){
  if ( e.target.id != 'notification-icon'){
  $("#notification-latest2").hide();
  }
  });
  });

  $('#addnew').on('change','#expdate',function(){
    if($(this).val() != "")
      $('#expdate1').attr('disabled','true');
    else
      $('#expdate1').removeAttr('disabled');
  });

  $('#addnew').on('click','#addstock',function(){
    var arr_product = $('.stock_product'),
        arr_quantity = $('.stock_quantity'),
        expired_date = $('#expdate');

    var a_product = [],
        a_quantity = [];

    for(var i=0; i < arr_product.length; i++)
    { 
      if($(arr_product[i]).val() == 0)
      {
        alert("Please specify product");
        return false;
      }
      a_product.push($(arr_product[i]).val());
      
      if($(arr_quantity[i]).val() == "" || $(arr_quantity[i]).val() == 0)
      {
        alert("Please specify quantity");
        return false;
      }
      a_quantity.push($(arr_quantity[i]).val());
    }

    if(!(expired_date.prop('disabled')) && expired_date.val() == '')
    {
      alert('Please set an expiration date.');
    }
    else
    {
      $.ajax({
        url : 'expired_add.php',
        type : 'POST',
        data : {
                a_product : a_product,
                a_quantity : a_quantity,
                expired_date : expired_date.val()
              },
        success: function(response){
                $('#addnew').modal('hide');
                $('#alert_container').html("\
                    <div class='alert alert-success alert-dismissible'>\
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\
                      <h4><i class='icon fa fa-check'></i> Success!</h4>"
                      +response+
                      "</div>\
                  ");
              },
        error: function(response){
                $('#addnew').modal('hide');
                $('#alert_container').html("\
                  <div class='alert alert-danger alert-dismissible'>\
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\
                    <h4><i class='icon fa fa-warning'></i> Error!</h4>"
                    +response+
                  "</div>\
                ");
              }
      })
    }
  });

  $('#btn_addproduct').click(function(){
    var row = $('#tbl_stock > tbody > tr').last();
    var newrow = row.clone(row);
    var tbody = row.closest('tbody');
    tbody.append(newrow);
    $('input',newrow).val('');
  });

  $('.btn_deleterow').click(function(){
    var row = $(this).closest('tr');
    var tbody = $('#tbl_stock > tbody');
    if($('tr',tbody).length > 1)
      row.remove();
    else
    {
      $('input',row).val('');
    }
  });

</script>