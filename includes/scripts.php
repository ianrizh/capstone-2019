<!-- jQuery 3 -->
<!-- <script src="bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Datatable
    $('#example1').DataTable()
    //CK Editor
    CKEDITOR.replace('editor1')
  });
</script>
<!--Magnify -->
<script src="magnify/magnify.min.js"></script>
<script>
$(function(){
	$('.zoom').magnify();
});
</script>
<!-- Custom Scripts -->

<script>
$(function(){
  $('body').click(function(e){
    if ( e.target.id != 'notification-icon'){
      $("#notification-latest1").hide();
    }
  });
  
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

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

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}

$('.declined_notif').modal('show'); // show notifications for declined reservation
</script>