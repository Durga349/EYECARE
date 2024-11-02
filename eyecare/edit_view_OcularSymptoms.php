<?php include "includes/header.php"; 
$getdata=$_GET['Id'];

$get_qry="SELECT * FROM ocularsymptoms WHERE columnId ='".$getdata."'";
$get_GEN_HEL=$crud->getData($get_qry);

?>
	<?php include "includes/navbar.php";?>
	<!-- Sidebar -->
	<?php include "includes/sidebar.php";?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container h-100 ">
   <form name="editform" id="editform" method="post" autocomplete="off" enctype="multipart/form-data">
		<div class="row justify-content-center mt-5">
			<div class="col-md-9">
			<div class="card">
				   <?php if ($_REQUEST['type'] == 'edit') { ?>
            <div class="card-header text-center "><h3>Ocular Symptoms</h3></div>
            <?php } ?>
             <?php if ($_REQUEST['type'] == 'view') { ?>
            <div class="card-header text-center "><h3>Ocular Symptoms</h3></div>
            <?php } ?>
				
					<div class="card-body">
	 <?php if ($_REQUEST['type'] == 'view') { ?>
	 	<style>
		input.form-control{
				border: none;
				border-bottom: 1px dashed;
			}

			 input.text{
				border: none;
				border-bottom: 1px solid;
			}
	</style>				
	<div class="row">
		<div class="col-md-6">
			<label><b>Field Name</b></label>
	 <input type="text" name="FieldName" id="FieldName" class="form-control" value=" <?php echo $get_GEN_HEL[0]['fieldName'] ?>">

		</div>
		<div class="col-md-6">
				<label><b>Display Field Name</b></label>
	 <input type="text" name="displayFieldName" id="displayFieldName" class="form-control" value=" <?php echo $get_GEN_HEL[0]['displayFieldName'] ?>">
		</div>
		<div class="col-md-6 mt-3">
			<label><b>Type</b></label>
	 <input type="text" name="type" id="type" class="form-control" value=" <?php echo $get_GEN_HEL[0]['type'] ?>">
		</div>
		<div class="col-md-6 mt-3">
			<label><b>Type Values</b></label>
	 <input type="text" name="typevalues" id="typevalues" class="form-control" value=" <?php echo $get_GEN_HEL[0]['typevalues'] ?>" >
		</div>
		<div class="col-md-6 mt-3">
			<label><b>Status:</b></label>
			<?php
			 if ($get_GEN_HEL[0]['dispStatus']='1') {?>
			<input type="text" name="dispStatus" id="dispStatus" class="form-control" value="Yes">
			<?php }else { ?>
			<input type="text" name="dispStatus" id="dispStatus" class="form-control" value="No">
			<?php }?>			
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-12">
			<input type="reset" name="cancel" id="cancel" class="btn btn-danger" value="Back"  onclick="window(location='manage_ocularSymptoms.php')" style="margin-left: 45%;">
		</div>
	</div>
	<?php } ?>
	<!-- ----------------------------------Edit-------------------------------	 -->
	<?php if ($_REQUEST['type'] == 'edit') { ?>
		<div class="row">
		<div class="col-md-6">
			<label>Field Name</label>
			<input type="text" name="Name" id="Name" class="form-control" value=" <?php echo $get_GEN_HEL[0]['fieldName'] ?>">
		</div>
		<div class="col-md-6">
			<label>Display Field Name</label>
			<input type="text" name="FieldName" id="FieldName" class="form-control" value=" <?php echo $get_GEN_HEL[0]['displayFieldName'] ?>">
		</div>
		<div class="col-md-6 mt-3">
			<label>Type</label>
			<input type="text" name="type1" id="type1" class="form-control" value=" <?php echo $get_GEN_HEL[0]['type'] ?>">
		</div>
		<div class="col-md-6 mt-3">
			<label>Type Values</label>
			<input type="text" name="typevalue" id="typevalue" class="form-control" value="<?php echo $get_GEN_HEL[0]['typevalues'] ?>">
		</div>
		<div class="col-md-6 mt-3">
			<label>Status</label>
			<select class="form-control" name="dispStatus" id="dispStatus">
				<option value="">--Select--</option>
				 <option value="1" <?php if($get_GEN_HEL[0]['dispStatus'] == '1'){echo "selected = 'selected'";} ?>>Yes</option>
				 <option value="0" <?php if($get_GEN_HEL[0]['dispStatus'] == '0'){echo "selected = 'selected'";} ?>>No</option>
			</select>
		</div>


	</div>
	<div class="row mt-3">
		<div class="col-md-12">
			<input type="submit" name="update" value="Update" id="emp" class="btn btn-primary float-right">
			<input type="hidden" name="hid" value="<?php echo $get_GEN_HEL[0]['columnId'] ?>" id="hid">

			<input type="reset" name="cancel" id="cancel" class="btn btn-danger" value="Back"  onclick="window(location='manage_ocularSymptoms.php')">
		</div>
	</div>

   <?php } ?>
</div>
				
			</div>
			</div>
		</div>
</form>
	</div>
	<!-- js -->
	<!-- Footer -->
<?php include "includes/footer.php"; ?> 
<script type="text/javascript">	
$("#editform").validate({

    rules: {         
       Name     : "required",
   FieldName    : "required",           
            type1    : "required",           
      // typevalues    : "required",           
      dispStatus    : "required",           
    },
    // Specify validation error messages
    messages: {         
    
       Name        : "Please Enter  Name",
     FieldName     : "Please Enter Filed Name",             
         type1     : "Please Enter Type",             
      // typevalues       : "Please Enter Type Value",             
      dispStatus       : "Please Enter Status",             
    },
        
        submitHandler: function(form) {
     //alert("hii");
      
        let formdata = new FormData();
        let x = $('#editform').serializeArray();
       
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
       formdata.append('action' , 'update');

        $.ajax({
          type: "POST",
          url: "saveOcularSymptoms.php",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              $('#emp').attr('disabled',true);
              toastr.success('Update successfully...!');
              setTimeout(function (){
                location.href = "manage_ocularSymptoms.php";
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
			