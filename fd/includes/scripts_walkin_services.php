<script>
	$(function() {

    $('#services_customertype').change(function(){
    	var type = $(this).val();

    	if (type == 'Old') {
    		$('.container_oldcustomer').attr('style','display:block');
    		$('.container_newcustomer').attr('style','display:none');
    	}
    	else if (type == 'New') {
    		$('.container_oldcustomer').attr('style','display:none');
    		$('.container_newcustomer').attr('style','display:block');
    	}
    });

    $('#old_customername').change(function(){
    	var id = $(this).val();

    	$.ajax({
    		url : 'details.php',
    		type : 'POST',
    		dataType : 'JSON',
    		data : { id_cust : id },
    		success : function(response) {
    			$('#group_contactinfo').attr('style','display:block');
    			$('#box_petdetails').attr('style','display:block');

    			$('#old_contactnumber').val(response.contactnumber).attr('readonly',true);
    			$('#old_emailaddress').val(response.emailaddress).attr('readonly',true);

    			for(var x in response.option_pets) {
    				$('#old_pets').append('<option value="'+response.option_pets[x]['id_pet']+'">'+response.option_pets[x]['pet_name']+'</option>');
    			}
    		}
    	});
    });

    $('#old_pets').change(function(){
    	var id = $(this).val();

    	$.ajax({
    		url : 'details1.php',
    		type : 'POST',
    		dataType : 'JSON',
    		data : { id_pet : id },
    		success : function(response) {
    			$('#group_petinfo').attr('style','display:block');
    			$('#box_transactiondetails').attr('style','display:block')

    			$('#old_pettype').val(response.pettype).attr('readonly',true);
    			$('#old_petbreed').val(response.petbreed).attr('readonly',true);
    			$('#old_petgender').val(response.petgender).attr('readonly',true);
    			$('#old_transactiondate').val(response.currentdate).attr('readonly',true);
    		}
    	});
    });

	});
</script>