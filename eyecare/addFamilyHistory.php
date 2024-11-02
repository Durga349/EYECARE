<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php";?>
	<!-- Sidebar -->
	<?php include "includes/sidebar.php";?>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container h-100">
		<div class="row justify-center">
			<div class="col-md-8 mt-4" style="margin-left:55px;">
			<div class="card">
			<div class="card-header"><h4>Family/Medical History</h4></div>
			<div class="card-body">
	<form name="addform" id="addform" method="post" autocomplete="off" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<label>FieldName</label>
						<input type="text" name="fieldName" id="fieldName" class="form-control">
					</div>
					<div class="col-md-6" >
						<label>Status</label><br>
			<input type="radio" name="dispStatus" id="dispStatus" class="form-group" value="1">Yes&nbsp;
			<input type="radio" name="dispStatus" id="dispStatus" class="form-group" value="0">NO
					</div>
					<div id="tooltest0" class="tooltest0 multi-fields"> 
                  <div class="multi-field row align-items-center">
				   <div class="col-md-6 mt-3" style="margin-left: 20px;" >
						<label>whom</label> 
			 <input type="text" class="form-control" id="whom" name="whom[]" title="whom"> 
					</div>
                   <button type="button" class="remove-field mx-3 mr-1 mt-3" style="width:40px;height: 25px;"><i class="fa fa-minus" aria-hidden="true"></i></button>   
                    <button type="button" class="add-field mt-3" style="width:40px;height: 25px;"><i class="fa fa-plus"></i></button> 
                </div> 
              </div> 
               <div id="tool-placeholder"></div>
				</div>
				<div class="col-md-12 mt-3" >
					<input type="reset" name="cancel" id="cancel" class="btn btn-danger" value="Back"  onclick="window(location='manage_familyhistroy.php')">
			<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save" style="    float: right;">
					</div>
				</form>
			</div>
			</div>
		</div>
		</div>
	</div>
	<!-- js -->
	<!-- Footer -->
			<?php include "includes/footer.php"; ?> 
<script type="text/javascript">	
$("#addform").validate({

    rules: {         
      fieldName     : "required",
      // dispStatus    : "required",           
    },
    // Specify validation error messages
    messages: {         
    
      fieldName        : "Please Enter  Name",
      // dispStatus     : "Please Enter Status",             
    },
        
        submitHandler: function(form) {
     //alert("hii");
      
        let formdata = new FormData();
        let x = $('#addform').serializeArray();
       
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
       formdata.append('action' , 'Save');

        $.ajax({
          type: "POST",
          url: "save_family_health.php",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              $('#emp').attr('disabled',true);
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manage_familyhistroy.php";
              },1000);
            }
            else{
              $('#emp').attr('disabled',false);
              toastr.error(data);
            }
          }
        });
      
      
      }

    });
</script>
 <!-- ===================================================== -->
<script>		
		$(".add-field").click(function(e) { 
				// alert("hai");   
        var noOfDivs = $('.tooltest0').length; 
        var clonedDiv = $('.tooltest0').first().clone(true); 
        clonedDiv.insertBefore("#tool-placeholder"); 
        let id = 'tooltest' + noOfDivs; 
        clonedDiv.attr('id', id);         
        $('#'+id).find('input').val('');        
    }); 
 
    $('.remove-field').click(function() { 
        $(this).closest('.tooltest0').remove(); 
    });
			</script>