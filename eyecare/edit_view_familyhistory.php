<?php include "includes/header.php"; 
$getdata=$_GET['Id'];

$get_qry="SELECT * FROM  familyhistory WHERE columnId ='".$getdata."'";
$get_famlyhis=$crud->getData($get_qry);

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
            <div class="card-header text-center "><h3>Family History</h3></div>
            <?php } ?>
             <?php if ($_REQUEST['type'] == 'view') { ?>
            <div class="card-header text-center "><h3>Family History</h3></div>
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
   <input type="text" name="FieldName" id="FieldName" class="form-control" value=" <?php echo $get_famlyhis[0]['fieldName'] ?>">

    </div>
    <div class="col-md-6">
        <label><b>Display Field Name</b></label>
   <input type="text" name="displayFieldName" id="displayFieldName" class="form-control" value=" <?php echo $get_famlyhis[0]['displayFieldName'] ?>">
    </div>
  
    <div class="col-md-6 mt-3">
      <label><b>Whom</b></label>
   <input type="text" name="whom" id="whom" class="form-control" value=" <?php echo $get_famlyhis[0]['whom'] ?>" >
    </div>
    <div class="col-md-6 mt-3">
      <label><b>Status:</b></label>
      <?php
       if ($get_famlyhis[0]['dispStatus']='1') {?>
      <input type="text" name="dispStatus" id="dispStatus" class="form-control" value="Yes">
      <?php }else { ?>
      <input type="text" name="dispStatus" id="dispStatus" class="form-control" value="No">
      <?php }?>     
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <input type="reset" name="cancel" id="cancel" class="btn btn-danger" value="Back"  onclick="window(location='manage_familyhistroy.php')" style="margin-left: 45%;">
    </div>
  </div>
  <?php } ?>
  <!-- ----------------------------------Edit-------------------------------   -->
  <?php if ($_REQUEST['type'] == 'edit') { ?>
    <div class="row">
    <div class="col-md-6">
      <label>Field Name</label>
      <input type="text" name="fieldName" id="fieldName" class="form-control" value=" <?php echo $get_famlyhis[0]['fieldName'] ?>">
    </div>
    <div class="col-md-6">
      <label>Display Field Name</label>
      <input type="text" name="displayFieldName" id="displayFieldName" class="form-control" value="<?php echo $get_famlyhis[0]['displayFieldName'] ?>">
    </div>
   <div id="tooltest0" class="tooltest0 multi-fields"> 
                  <div class="multi-field row align-items-center">
           <div class="col-md-6 mt-3" style="margin-left: 20px;" >
            <label>whom</label> 
       <input type="text" class="form-control" id="whom" name="whom[]" value="<?php echo $get_famlyhis[0]['whom'] ?>" title="whom"> 
          </div>
                   <button type="button" class="remove-field mx-3 mr-1 mt-3" style="width:40px;height: 25px;"><i class="fa fa-minus" aria-hidden="true"></i></button>   
                    <button type="button" class="add-field mt-3" style="width:40px;height: 25px;"><i class="fa fa-plus"></i></button> 
                </div> 
              </div> 
               <div id="tool-placeholder"></div>
    <div class="col-md-6 mt-3">
      <label>Status</label>
      <select class="form-control" name="dispStatus" id="dispStatus">
        <option value="">--Select--</option>
         <option value="1" <?php if($get_famlyhis[0]['dispStatus'] == '1'){echo "selected = 'selected'";} ?>>Yes</option>
         <option value="0" <?php if($get_famlyhis[0]['dispStatus'] == '0'){echo "selected = 'selected'";} ?>>No</option>
      </select>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-md-12">
      <input type="submit" name="update" value="Update" id="emp" class="btn btn-primary float-right">
      <input type="hidden" name="hid_id" value="<?php echo $get_famlyhis[0]['columnId'] ?>" id="hid_id">

      <input type="reset" name="cancel" id="cancel" class="btn btn-danger" value="Back"  onclick="window(location='manage_familyhistroy.php')">
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
 <script type="text/javascript" >
    
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

<script type="text/javascript"> 
$("#editform").validate({

    rules: {         
      fieldName     : "required",
displayFieldName    : "required",                    
      dispStatus    : "required",           
    },
    // Specify validation error messages
    messages: {         
    
      fieldName        : "Please Enter  Name",
  displayFieldName     : "Please Enter Filed Name",                     
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
          url: "save_family_health.php",
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
      