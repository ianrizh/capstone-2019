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
  $('.order_product').change(function(){
      var dropdown = $(this);
      var thisrow = dropdown.closest('tr');
      var value = dropdown.val();
      var price = $('option[value="'+value+'"]',dropdown).data('price');
      $('.order_price',thisrow).val(price);
      dropdown.data('productid',$('option[value="'+value+'"]',dropdown).data('productid'))
      //compute_amount(thisrow);
      //compute_total();
      // compute_change();
    });
$('#findings').on('click','#btn_confirmorder',function(){
    var a_product = [],
        a_productid = [],
        a_quantity = [],
        a_price = [];

    var findings = $('#f').val(),
        prescription = $('#p').val();
		    s_price = $('#s_price').val();
    		reservation_id = $('.reservation_id').val();
    		status = $('.reservation_id').val();
    		price = $('.reservation_id').val();

    $('tbody tr',$('#tbl_stock')).each(function(){
      a_product.push($('.order_product',$(this)).val());
      a_productid.push($('.order_product',$(this)).data('productid'));
      a_quantity.push($('.order_qty',$(this)).val());
      a_price.push($('.order_price',$(this)).val());
    });
    
    $.ajax({
      url       : 'orders_validate_qty.php',
      data      : {
        a_product : a_productid,
        a_quantity : a_quantity
      },
      dataType  : 'JSON',
      method    : 'POST',
      beforeSend: function(){
        $('#btn_confirmorder').prop('disabled',true).html('Validating...');
      },
      success   : function(response){
        var list = '<ul>';
        if(response.length > 0)
        {
          $(response).each(function(idx,val){
            list += '<li>'+val+'</li>';
          });
          list += '</ul>';
          $('#insufficiientproducts_container').html("\
            <div class='alert alert-danger alert-dismissible'>\
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\
              <h4><i class='icon fa fa-warning'></i> Error!</h4>\
              The following products have insufficient stock:"
              +list+
              "</div>\
          ");
        }
        else
        {
          $.ajax({
            url       : 'fap.php',
            data      : {
              a_product : a_product,
              a_productid: a_productid,
              a_quantity : a_quantity,
              a_price : a_price,
              findings : findings,
              prescription : prescription,
              s_price : s_price,
              reservation_id :reservation_id,
              status : status,
              price : price
            },
            method    : 'POST',
            beforeSend: function(){
              $('#btn_confirmorder').prop('disabled',true).text('Saving...');
            },
            success   : function(){
              alert('Process Done.');
              window.location.href = "reservations.php";
            },
            error   : function(){
              alert('An error has occured.');
            },
            complete: function(){
            $('#findings').modal('hide');
              $('#btn_confirmorder').prop('disabled',false).text('CONFIRM');
              //window.location = '../admin/reservations.php';
            }
          });
        }
      },
      error     : function(){
        alert('An error has occured.');
      },
      complete  : function(){
        $('#btn_confirmorder').prop('disabled','').html('<i class="fa fa-check"></i> CHECK OUT');
      }
    });
  });

  $('#edit').on('change','#dropdown_confirmation',function(){
    if($(this).val() == 'Confirm')
    {
      $('#declinecontainer').attr('style','display:none');
      $('#declinecontainer textarea').attr('disabled','true');
    }
    else
    {
      $('#declinecontainer').attr('style','display:block');
      $('#declinecontainer textarea').removeAttr('disabled');
    }
  });
</script>