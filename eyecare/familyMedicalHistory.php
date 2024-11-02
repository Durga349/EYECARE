<?php  
  include "includes/header.php";  
  include "includes/navbar.php"; 
  include "includes/sidebar.php"; 
   $qryFamilyHistory= 
  "select * from familyhistory where dispStatus=1   
   order by priority"; 
    
  $resFamilyHistory=$crud->getData($qryFamilyHistory); 
  //print_r($resGeneralHealth); 
?> 
 
  <!-- Sidebar --> 
   
 
  <div class="mobile-menu-overlay"></div> 
 
  <div class="main-container h-100"> 
    <div class="pd-ltr-20"> 
      <div class="card-box pd-20 height-200-p mb-30"> 
        <table border="1" class="table table-bordered"> 
          <tr> 
              <th>S.No</th> 
              <th>Disease</th> 
              <th>Status</th> 
               <th>Whom</th> 
          </tr> 
        <?php $i=1;foreach($resFamilyHistory as $key=>$value){  
          $j=1;?> 
            <tr> 
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>"><?php echo $i;?></td> 
              <td> 
        <?php echo $value['displayFieldName'];?></td> 
              <td> 
                <?php if($value['columnId']!=10){?>
<input type="radio" id="familyMedStatus<?php echo $i."_".$j;?>" name="familyMedStatus<?php echo $i;?>" value="1"  
class="form-check-inline">Yes &ensp; 
<input type="radio" id="familyMedStatus<?php echo $i."_".($j+1);?>" name="familyMedStatus<?php echo $i;?>" value="0"  
class="form-check-inline">No 
<?php } ?>
<?php if($value['columnId']==10){?>
  <input type="text" class="form-control" 
  name="familyMedStatus<?php echo $i;?>">
  <?php } ?>

              </td> 
              <td>
           <?php 
               $typevalues = explode(",",$value['whom']);
            ?>
            <select id="whomvalue<?php echo $i;?>" name="whomvalue<?php echo $i;?>" class="form-control">
            <option value="">--Select--</option>
            <?php foreach ($typevalues as $key => $value): ?>
      <option value="<?php echo $value;?>">
        <?php echo ucwords($value);?></option>
            <?php endforeach ?>
         </select>
         
              </td>
            </tr> 
        <?php $i++;$j++;} ?> 
        <tr> 
            <td colspan="3"> 
              <button type="button"  
              class="btn btn-danger">Cancel</button> 
 
              <button type="submit"  
              class="btn btn-primary float-right">Step-4</button> 
            </td> 
        </tr> 
        </table> 
 
      </div> 
       
       
       
    </div> 
  </div> 
  <!-- js --> 
  <!-- Footer --> 
      <?php //include "includes/footer.php"; ?>