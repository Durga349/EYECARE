<?php include "includes/header.php";

?> 
 
 
 <?php include "includes/navbar.php"; 
 
$sel_qry="select * from generalhealth "; 
 
 $result=$crud->getData($sel_qry); 
 
 ?> 
 
  
 
 <!-- Sidebar --> 
 <?php include "includes/sidebar.php";?> 
 
 <div class="mobile-menu-overlay"></div> 
 
 <div class="main-container h-100"> 
  <div class="pd-ltr-20"> 

   <div class="card-box pd-20 height-100-p mb-30"> 
     <h3>General Health Details</h3>
    <table class="table table-borded mt-3"> 
      <a class="btn btn-primary float-right" 
          href="Addgeneralhealth.php" style="margin-bottom: 10px;"><i class="fa-sharp fa-solid fa-plus"></i></a>
     <tr> 
      <th>S.No</th> 
      <!-- <th>Fieldname</th>  -->
      <th>Label Name</th> 
      <th>Type</th> 
      <th>Type Values</th> 
      <!-- <th>Status</th> --> 
      <th>Actions</th> 
     </tr> 
     <?php $i=1; 
     foreach ($result as $key => $value) {?> 
      <tr> 
       <td><?php echo $i ?></td> 
       <!-- <td><?php echo $value['fieldName']; ?></td>  -->
       <td><?php echo  $value['displayFieldName'] ;?></td> 
       <td><?php echo $value['type']; ?></td> 
       <td><?php echo $value['typevalues']; ?></td> 
       <!-- <td><?php echo $value['dispStatus']; ?></td>  -->
       <td style="padding: 1px"><a href="general_healthview.php?vid=<?php echo $value['columnId'];?>" ><i class="fa-solid fa-eye"></i></a> 
       <a href="general_healthEdit.php?Eid=<?php echo $value['columnId'];?>" ><i class="fa-solid fa-pen-to-square"></i></a> 
      <a href="general_healthdelete.php?del=<?php echo $value['columnId'];?>" ><i class="fa-sharp fa-solid fa-trash"></i></a></td> 
      </tr> 
     <?php  $i++;} ?> 
    </table> 
 
   </div> 
    
    
    
  </div> 
 </div> 
 <!-- js --> 
 <!-- Footer --> 
   <!-- <?php include "includes/footer.php"; ?> -->
   <!-- ================================Familyhistory==================================== -->

  <!-- Modal -->
<div class="modal fade" id="family_health" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Family History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
    <div class="col-md-6">
            <label>FieldName</label>
            <input type="text" name="field" id="field" class="form-control">
          </div>
        <!--   <div class="col-md-6" >
            <label>Status</label><br>
      <input type="radio" name="dispStatus" id="dispStatus" class="form-group" value="1">Yes&nbsp;
      <input type="radio" name="dispStatus" id="dispStatus" class="form-group" value="0">NO
          </div> -->
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right:66%;">Close</button>
        <button type="button" class="btn btn-primary" onclick="history()">Save</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   function history() {
// alert('HAI'); 
let field        = $('#field').val();
let whom             = $('#whom').val();

let formData         = new FormData();
      formData.append('field', $('#field').val());
      formData.append('whom', $('#whom').val());


      formData.append('action','save');
 
 $.ajax({
        url : 'save_family_health.php',
        type : 'POST',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
         success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
               $('#family_health').modal('hide');
               location.reload();
              },1000);
              setTimeout(function() {
                 $('#family_health').removeAttr('disabled');
            }, 2000);
            }
            else{
              toastr.error(data);
            }
          }
    });

}
</script>