<?php include "includes/header.php"; 
 
$codeval = $_GET['codeval'];

$pid = $_GET['patientID'];


 //----------Personal Information---------

  $sel_per = "select pi.id, pi.patient_Id, pi.toWhom, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId, rd.id from personal_information pi LEFT JOIN relations_details rd on pi.toWhom = rd.id where codeval = '".$codeval."' and patient_Id = '".$pid."' ";
$res_per = $crud->getData($sel_per);
//veiw personal information--
$view_sel_per = "SELECT pi.id,rd.towhom, pi.patient_Id, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId FROM `personal_information` pi left join relations_details rd on pi.toWhom = rd.id WHERE codeval = '".$codeval."' and patient_Id = '".$pid."' ";
$view_res_per = $crud->getData($view_sel_per);

 //Patient Medical History

 $sel_genhealth="SELECT gh.columnId,gh.genHealthStatus, gh.displayFieldName,gh.typevalues,gh.type,ph.typevalue,ph.genHealthStatus,ph.genHealth_Id, ph.physicianName,ph.checkUplDate,ph.physicianCity,ph.currentMed,ph.allergyMedication,ph.allergyMedicationText,ph.anySurgeries,ph.asecigarettes, ph.randomId FROM `generalhealth` AS gh LEFT JOIN patient_medical_history AS ph ON gh.columnId=ph.genHealth_Id WHERE gh.columnId=ph.genHealth_Id AND ph.codeval='".$codeval."' and patient_Id = '".$pid."'";
// exit;
 $res_med =$crud->getData($sel_genhealth);

 //Patient Eye History

// $sel_pateye = "SELECT peh.*, oc.* FROM `patient_eye_history` peh left JOIN ocularsymptoms oc on peh.ocularsymptoms = oc.columnId where codeval = '".$codeval."'";
//Patient Eye History
$sel_pateye ="SELECT oc.columnId,peh.id,oc.displayFieldName,oc.priority,oc.dispStatus,oc.type,oc.typevalues,peh.ocularsymptoms,peh.dateOfLastEyeExam,peh.doYouCurrentlyWearGlasses,peh.doYouCurrentlyWearContacts,peh.whatKind,peh.solutionUsed,peh.satisfied_vision,peh.wouldYouPreferClear,peh.doyouUseTheComputer,peh.appr_hrs_day,peh.ocupation,peh.codeval,peh.randomId FROM `ocularsymptoms` AS oc LEFT JOIN patient_eye_history AS peh ON oc.columnId=peh.ocularsymptoms WHERE oc.columnId=peh.ocularsymptoms AND peh.codeval='".$codeval."' and peh.patient_Id = '".$pid."' ";
 
 $res_pateye = $crud->getData($sel_pateye);

// Family Eye History

$sel_family="SELECT fh.columnId,fh.familyMedStatus,fh.displayFieldName,feh.familyMedStatus,fh.whom as whome,feh.whom, feh.randomId FROM familyhistory AS fh LEFT JOIN family_eye_history AS feh ON fh.columnId=feh.familyMed_Id WHERE fh.columnId=feh.familyMed_Id AND  feh.codeval='".$codeval."' and feh.patient_Id = '".$pid."' ";

 $res_family =$crud->getData($sel_family);

 //OFFICE DETAILS

  $sel_offc = "select * from office_details where  patient_Id = '".$pid."' ";
 //exit;
 $res_offc = $crud->getData($sel_offc);

 // print_r($res_offc);
 // exit;

 // --------------mastertable-----------------
 $mas_qry = "select * from patient_master_table where codeval='".$codeval."'";
 $res_mast = $crud->getData($mas_qry);

    $qryGeneralHealth = "select * from generalhealth where dispStatus=1 order by priority";
    $resGeneralHealth=$crud->getData($qryGeneralHealth);

    $qryGeneralHealth2 = "select * from ocularsymptoms where dispStatus=1 order by priority";
    $resGeneralHealth2=$crud->getData($qryGeneralHealth2);

    $qryFamilyHistory= "select * from familyhistory where dispStatus=1 order by priority"; 
    $resFamilyHistory=$crud->getData($qryFamilyHistory); 
 // print_r($resGeneralHealth); 

    $cities= "select * from cities order by id asc"; 
    $cities_data=$crud->getData($cities); 
  //print_r($cities_data); 


   $states= "select * from states order by id asc"; 
  $states_data=$crud->getData($states); 
  //print_r($cities_data);

  $sel_data= "SELECT  * FROM relations_details ORDER BY id ASC"; 
  $relations_data =$crud->getData($sel_data); 

?>


    <style type="text/css">
         .error{
      color: red;
    }

      .template_faq {
    background: #edf3fe none repeat scroll 0 0;
}
.panel-group {
    background: #fff none repeat scroll 0 0;
    border-radius: 3px;
    box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.04);
    margin-bottom: 0;
    padding: 50px;
}
#accordion .panel {
    border: medium none;
    border-radius: 0;
    box-shadow: none;
    margin: 0 0 15px 10px;
}
#accordion .panel-heading {
    border-radius: 30px;
    padding: 0;
}
#accordion .panel-title a {
    /*background: #ffb900 none repeat scroll 0 0;*/
    background: #0BA1C2 none repeat scroll 0 0;
    border: 1px solid transparent;
    border-radius: 30px;
    color: #fff;
    display: block;
    font-size: 18px;
    font-weight: 600;
    padding: 12px 20px 12px 50px;
    position: relative;
    transition: all 0.3s ease 0s;
}
#accordion .panel-title a.collapsed {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ddd;
    color: #333;
}
#accordion .panel-title a::after, #accordion .panel-title a.collapsed::after {
    background: #0BA1C2 none repeat scroll 0 0;
    border: 1px solid transparent;
    border-radius: 50%;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.58);
    color: #fff;
    content: "";
    font-family: fontawesome;
    font-size: 25px;
    height: 55px;
    left: -20px;
    line-height: 55px;
    position: absolute;
    text-align: center;
    top: -5px;
    transition: all 0.3s ease 0s;
    width: 55px;
}
#accordion .panel-title a.collapsed::after {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ddd;
    box-shadow: none;
    color: #333;
    content: "";
}
#accordion .panel-body {
    background: transparent none repeat scroll 0 0;
    border-top: medium none;
    padding: 20px 25px 10px 9px;
    position: relative;
}
#accordion .panel-body p {
    /*border-left: 1px dashed #8c8c8c;*/
    padding-left: 25px;
}
.bg_clr {
  background-color: #0ba1c2;
  border-radius: 19px;
}
</style> 
<body>  

  <?php include "includes/navbar.php"; ?>

  
<?php include "includes/sidebar.php"; 
include "includes/modals.php";?>
  <div class="mobile-menu-overlay"></div>

  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">

       <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center wow zoomIn">
            <img src="../Brookwood.png" width="100" height="100">
            <span></span>
        
          </div>
        </div>
      </div>
    <div class="row">       
        <div class="col-md-12 mt-3">
          <div class="row"> 
           <div class="col-3">
            <h5 >Name : <?php echo $res_per[0]['patientFname'] ?><?php echo $res_per[0]['plasLtname']?></h5>
          </div>
                <div class="col-6 mb-3" style="float:left;">
            <input type="reset" name="cancel" value="Report Data" class="btn btn-info" onclick="window(location='ReportData.php?patientID=<?php echo $pid; ?>')" style="margin-right: 5px;" > &nbsp;&nbsp;
             <input type="reset" name="cancel" value="Back" class="btn btn-danger" onclick="history.back()" >
          </div>
        </div>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <!-- <div class="row"> -->
                  <!-- <div class="col-md-6"> -->
                    <h4 class="panel-title">
    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">      
                  View Patient Details          
                  </a> 
                  </h4>                  
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body" id="patient_detailsId">
                  <div class="card-body">
              <div class="row">
                <div class="col-md-4 mt-4">
                      <label ><strong>To Whom:</strong></label>
                      <span><?php echo $view_res_per[0]['towhom']; ?></span>
                   <input type="text" class="form-control" id="towhom" placeholder="" name="towhom" readonly value="<?php echo $view_res_per[0]['towhom']; ?>">    
                      </div>
                      <div class="col-md-4 mt-4">
                          <label><strong>Insurance Subscribers :&nbsp;</strong><?php echo $res_per[0]['insSubscribers'] ?></label>
                         <!--  <input type="text" class="form-control" id="insSubscribers" placeholder="" name="insSubscribers" readonly value="<?php echo $res_per[0]['insSubscribers'] ?>"> -->

                        <input type="text" id="codeval" name="codeval" class="form-control col-md-8 pt-4" readonly value="<?php echo $res_per[0]['codeval'] ?>">                      
                      </div>                       

                    <div class="col-md-4 mt-4">
                    
                      <label ><strong>First Name:</strong></label>
                      <input type="text" class="form-control" id="patientFname" placeholder="" name="patientFname" title="enter First name" readonly value="<?php echo $res_per[0]['patientFname'] ?>">
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="col-md-4 mt-4">
                      <label ><strong>Last Name:</strong></label>
                      <input type="text" class="form-control" id="plastLname" placeholder="" name="plasLtname" title="enter Last Name" readonly value="<?php echo $res_per[0]['plasLtname'] ?>">
                      </div>
                      <div class="col-md-4 mt-4">
                      <label ><strong>Gender:</strong></label><br>
              <input type="text" class="form-control" id="gender" placeholder="" name="gender" title="enter Last Name" readonly value="<?php echo $res_per[0]['gender'] ?>">          
                    <br/>              
                      </div>
                       <div class="col-md-4 mt-4">
                         <label ><strong>DOB:</strong></label><br>
                        <input type="text" class="form-control" id="patDob"name="patDob" placeholder="" title="Enter the Date Of Brith" readonly value="<?php echo $res_per[0]['patDob'] ?>">
                      </div>
                    </div><br>
             <div class="row mb-4">
              <div class="col-md-4">
                      <label><strong>Home Phone:</strong></label>
               <input type="text" class="form-control" id="homeph"name="homeph"  readonly value="<?php echo $res_per[0]['homeph'] ?>">        
                      </div>
                       <div class="col-md-4">
                          <label><strong>Work:</strong></label>
                          <input type="text" class="form-control" id="workNo"name="workNo"  readonly value="<?php echo $res_per[0]['workNo'] ?>">
                        
                      </div>
                       <div class="col-md-4">
                          <label><strong>Mobile No:</strong></label>
                     <input type="text" class="form-control" id="cell"name="cell"  readonly value="<?php echo $res_per[0]['cell'] ?>">     
                      </div>

                      </div><br>
                         <div class="row mb-4">   
                      <div class="col-md-4 mt-4">
                          <label><strong>Email</strong>(Please print each alphabet seperate & legibly):</label>                     
                          <input type="email" name="email" id="email" class="form-control" value="<?php echo $res_per[0]['email'] ?>" readonly>
                      </div> 
                      <div class="col-md-4 mt-4">
                      <label ><strong>Address:</strong></label>
                       <textarea class="form-control" class="address" id="address" name="address" placeholder="" readonly rows="1"><?php echo $res_per[0]['address'] ?></textarea>
                      </div> 
                      <div class="col-md-4 mt-4">
                         <label><strong>City:</strong></label>
                          <input type="text" name="city" id="city" class="form-control" value="<?php echo $res_per[0]['city'] ?>" readonly>
                      </div>

                    </div><br>
                    <div class="row">
                      <div class="col-md-4 mt-4">
                      <label><strong>State:</strong></label>
            <input type="text" name="state" id="state" class="form-control" value="<?php echo $res_per[0]['state'] ?>" readonly>          
                     </div> 
                      <div class="col-md-4 mt-4">
                          <label><strong>Zip Code:</strong></label>
              <input type="text" name="zipCode" id="zipCode" class="form-control" value="<?php echo $res_per[0]['zipCode'] ?>" readonly>
                      </div>  
                       <div class="col-md-4 mt-4">
                      <label ><strong>Insurance Subscribers First Name:</strong></label>
                      <input type="text" class="form-control" id="insFname" name="insFname" readonly value="<?php echo $res_per[0]['insFname'] ?>">
                      </div> 
                    </div><br>
                    <div class="row">
                     <div class="col-md-4 mt-4">
                      <label ><strong>Insurance Subscribers Last Name:</strong></label>
                      <input type="text" class="form-control" id="insLname"  name="insLname" readonly value="<?php echo $res_per[0]['insLname'] ?>">
                      </div>           
                        <div class="col-md-4 mt-4">
                        <label ><strong>Insurance Subscribers DOB:</strong></label><br>
                        <input type="text" class="form-control" id="dob"name="dob" readonly value="<?php echo $res_per[0]['dob'] ?>">
                      </div>
                        <div class="col-md-4 mt-4">                         
                          <label ><strong>Groupon # or Self Pay :&nbsp;</strong><?php echo $res_per[0]['payment'] ?></label>
                         <!--  <input type="text" class="form-control" id="payment"name="payment" readonly value="<?php echo $res_per[0]['payment'] ?>"><br> -->
                           <input type="text" name="grouponcode" id="grouponcode" class="form-control col-md-8 pt-4" readonly value="<?php echo $res_per[0]['grouponcode'] ?>">
                          </div>
                        </div><br>
                          <div class="row">
                           <div class="col-md-4 mt-4">
                          <label ><strong>Vision Insurance :</strong></label>
                          <input type="text" name="insurance" id="insurance" readonly class="form-control"  value="<?php echo $res_per[0]['insurance'] ?>">
                      </div>                    
                         <div class="col-md-4 mt-4">
                     <label ><strong>How you found our Office:</strong></label>
                      <input type="text" class="form-control" id="office" name="office" readonly value="<?php echo $res_per[0]['office'] ?>">
                      </div> 
                    </div><br>                 
               <div class="row">
            <div class="col-md-12 mt-4">
                        <p><strong>Insurance Authorization:</strong> I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</p>
                      </div>
                      <div class="col-md-6 mt-4">
                        <label><strong>Signature:</strong></label>
                        <!-- <input type="text" name="sign" id="sign" class="form-control" value="<?php echo $res_per[0]['sign'];?>"readonly> -->
                        <img src="../<?php echo $res_per[0]['sign'];?>" width="100px;" height="100px;">

                      </div> 
                        

                       <div class="col-md-6 mt-4">
                        <label><strong>Date:</strong></label>
                      <input type="date" name="date" id="date" class="form-control" value="<?php echo $res_per[0]['date'] ?>"readonly>
                        </div><br>
                        <div class="col-md-12 mt-4"><br>
                          <p><b><u>HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</u></b></p>     
                        </div>
                        <div class="col-md-12 mt-4">
                        <p>I, <input type="text" name="represent_name" id="represent_name" style="border:none; border-bottom: 1px dashed;" value="<?php echo $res_per[0]['represent_name'];?>" readonly> (Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.</p>                        
                        </div>
                        <?php $agreement = $res_per[0]['pat_agree_tc'];
                          $pat_agree = explode(',', $agreement);
                          //print_r($pat_agree);
                            ?>
                        <div class="col-md-12 mt-4">
                          <p>Please check one: </p>                        
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc1" value="pat_agree_tc1"<?php if($pat_agree[0]=='pat_agree_tc1'){echo "checked";} ?>>&ensp;I hereby acknowledge reciept of the policy.<br>
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc2" value="pat_agree_tc2"<?php if($pat_agree[1]=='pat_agree_tc2'){echo "checked";} ?>>&ensp;I hereby REFUSE to acknwledge reciept of the policy.I understand that even though I refuse to sign this <b>ACKNOWLEDGEMENT</b>, the provider may still provide treatment to me.
                        </div>
                     
                        <div class="col-md-6 mt-4">
                          <label><strong>Signature:</strong></label>
                          <!-- <input type="text" name="signature" id="signature" class="form-control" value="<?php echo $res_per[0]['signature'];?>" readonly> -->

                          <img src="../<?php echo $res_per[0]['signature'];?>" width="100px;" height="100px;">
                        </div>
                        <div class="col-md-6 mt-4">
                          <label><strong>Date:</strong></label>
                          <input type="date" name="date_pre" id="date_pre" class="form-control" value="<?php echo $res_per[0]['datePre'];?>" readonly>
                        </div>
                      </div>    
                    </div>
                  </div>
                </div>
              </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  View Patient Medical History
                   
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
            <div class="row">
            <div class="col-md-4"> 
             <label>Name of Primary Care Physician</label>
             <input type="text" name="physicianName" id="physicianName" class="form-control" readonly value="<?php echo $res_med[0]['physicianName'] ?>">
           </div>

            <div class="col-md-4"> 
             <label>City </label>
             <input type="text" name="physicianCity" id="physicianCity" class="form-control" readonly value="<?php echo $res_med[0]['physicianCity'] ?>">
           </div>

            <div class="col-md-4"> 
             <label>Last Date of Check Up</label>
             <input type="text" name="checkUplDate"  id="checkUplDate" class="form-control" readonly value="<?php echo $res_med[0]['checkUplDate'] ?>">
           </div>
             </div>

          <div class="row">
            <div class="col-md-4" style="margin-top: 5px;"> 
             <label>Current Medications</label>
             <textarea name="currentMed"  id="currentMed" class="form-control" readonly><?php echo $res_med[0]['currentMed'] ?></textarea>
           </div>

            <div class="col-md-4" style="margin-top: 5px;"> 
             <label>Any Allergies to Medication? - <?php echo strtoupper($res_med[0]['allergyMedication']) ?></label>
             <input type="text" name="allergyMedicationText" id="allergyMedicationText" class="form-control" readonly value="<?php echo $res_med[0]['allergyMedicationText'] ?>">
           </div>


            <div class="col-md-4" style="margin-top: 5px;"> 
             <label>Have You Had Any Surgeries? - <?php echo strtoupper($res_med[0]['anySurgeries']) ?></label>  
           </div>

  </div>
  <div class="row">
      <div class="col-md-4" style="margin-top: 5px;">
        <label>Do you use cigarettes/tobacco,alcohol,<br> or other substances? - &nbsp;<?php echo strtoupper($res_med[0]['asecigarettes']) ?> </label><br>
   
           </div>
         </div>

        <!-- General Health -->
      <div class="row" style="margin-top: 30px"> 
    <strong><h4 style="text-align:center;">GENERAL HEALTH</h4></strong>    
        <table border="1" class="table table-bordered">
          <tr>
              <th>S.No</th>
              <th>Health Problem</th>
              <th>Status</th>
               <!-- <th>Type</th> -->
          </tr>
        <?php $i=1;foreach($res_med as $key=>$value){ 
          $j=1;
         
          ?>

            <tr>
              <td><?php echo $value['columnId'];?></td>
              <td><?php echo $value['displayFieldName'];?></td>
              <td>
          <?php  
              if ($value['genHealthStatus'] =='1') {?>
               <?php echo 'Yes'?>
               <?php  if ($value['genHealth_Id'] == '5'){?> 
                 <?php echo ucwords($value['typevalue']);
              } ?>
              <?php }else if ($value['genHealthStatus'] =='0') { ?>
                 <?php echo 'No'?>
                   <?php } ?></td>
            </tr>
       <?php } ?>
       <!--  <tr>
            <td colspan="3">
              <button type="button" 
              class="btn btn-danger">Cancel</button>

              <button type="submit" 
              class="btn btn-danger float-right">Step-4</button>
            </td>
        </tr> -->
        </table>
       </div>
                </div>
              </div>
            </div>
              <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    View Patient Eye History
                      <!-- <span style="float:right;">
                     <label for="yes">Yes</label>
                    <input type="radio" id="yes" name="yes" value="Yes">
                    <label for="no">No</label>
                    <input type="radio" id="no" name="no" value="No">
                  </span> -->
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                <!--  patient eye History -->

                <div class="row">
                <div class="col-md-4">
                  <label><b>Date Of Last Eye Exam:</b></label>  
                  <input type="date" name="dateOfLastEyeExam" id="dateOfLastEyeExam" class="form-control" readonly value="<?php echo $res_pateye[0]['dateOfLastEyeExam'] ?>" >
                </div>
                
              <div class="col-md-4">
                  <label><b>Do You Currently Wear Glasses:</b></label><br>
                  <input type="text" name="doYouCurrentlyWearGlasses" id="doYouCurrentlyWearGlasses" class="form-control" readonly value="<?php echo $res_pateye[0]['doYouCurrentlyWearGlasses'] ?>">
                </div>
                <div class="col-md-4">
                  <label><b>Do You Currently Wear Contacts:</b></label><br>
                  <input type="text" name="doYouCurrentlyWearContacts" id="doYouCurrentlyWearContacts" class="form-control" readonly value="<?php echo $res_pateye[0]['doYouCurrentlyWearContacts'] ?>">
                </div>
            </div>
       
            <div class="row pt-5">                
                <div class="col-md-4" style="margin-top: 5px;">
                  <label><b>What kind?</b></label>
                  <input type name="whatKind" id="whatKind" class="form-control"readonly value="<?php echo $res_pateye[0]['whatKind'] ?>">
                </div> 
                <div class="col-md-4" style="margin-top: 5px;">
                  <label><b>Solution Used?</b></label>
                  <input type name="solutionUsed" id="solutionUsed" class="form-control" readonly value="<?php echo $res_pateye[0]['solutionUsed'] ?>">
                </div>
                 <div class="col-md-4" style="margin-top: 5px;">
                  <label><b>Would You Prefer Clear, Or Colored Contacts?</b></label><br>
                  <input type name="wouldYouPreferClear" id="wouldYouPreferClear" class="form-control" readonly value="<?php echo $res_pateye[0]['wouldYouPreferClear'] ?>">
                </div> 
            </div>
            <div class="row pt-5">
                 <div class="col-md-4" style="margin-top: 5px;">
                  <label><b>Are You Satiesfied With The Vision , And Comfort Of Your Contact Lenses?</b></label>
           <input type name="satisfied_vision" id="satisfied_vision" class="form-control" readonly value="<?php echo $res_pateye[0]['satisfied_vision'] ?>">       
                </div>             
                <div class="col-md-4" style="margin-top: 24px;">
                  <label><b>Do You Use The Computer?</b></label><br>
           <input type name="doyouUseTheComputer" id="doyouUseTheComputer" class="form-control" readonly value="<?php echo $res_pateye[0]['doyouUseTheComputer'] ?>">
                </div>
                <div class="col-md-4" style="margin-top: 5px;">
                  <label><b>Approx.How Many Hours A Day Do You Use The Computer?</b></label>
          <input type="" name="appr_hrs_day" id="appr_hrs_day" class="form-control" readonly value="<?php echo $res_pateye[0]['appr_hrs_day'] ?>">          
                </div>
            </div>
               <div class="row pt-4"> 
            
                <div class="col-md-4">
                  <label><b>Occupation:</b></label>
                   <!-- <textarea name="ocupation" id="ocupation" class="form-control" readonly><?php echo $res_pateye[0]['ocupation'] ?></textarea> -->
                   <input type name="ocupation" id="ocupation" class="form-control" readonly value="<?php echo $res_pateye[0]['ocupation'] ?>">
                </div>
              </div>
              
               <div id="tool-placeholder"></div>
        
           <!--  form 2 -->
               <strong><h4 style="text-align:center;">OCULAR SYMPTOMS</h4></strong> 
           <table border="1" class="table table-bordered" style="margin-top: 30px;">
          <tr>
              <th>S.No</th>
              <th>Symptom Name</th>
              <th>Check</th>
          </tr>
        <?php $i=1;foreach($res_pateye as $key=>$value){ ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $value['displayFieldName'];?></td>
              <!-- <td><?php echo $value['ocularsymptoms'];?></td> -->
                  <td><?php 
              if ($value['ocularsymptoms']== $value['ocularsymptoms']) {?>
                     <i class="fa-solid fa-check" style="color:#0BA1C2;"></i>
                 <?php } ?>  
                 
              </td>
            </tr>
        <?php $i++;} ?>
        </table>
                </div>
              </div>
            </div>
             <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  View Family Eye /Medical History
                   <!--  <span style="float:right;" >
                     <label for="yes">Yes</label>
                    <input type="radio" id="yes" name="yes" value="Yes">
                    <label for="no">No</label>
                    <input type="radio" id="no" name="no" value="No">
                  </span> -->
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                  <div class="row" >
    <strong><h4 style="text-align:center;">FAMILY EYE/MEDICAL HISTORY</h4></strong>            
                     <table border="1" class="table table-bordered"> 
          <tr> 
              <th>S.No</th>  
              <th>Disease</th>  
              <th>Status</th> 
              <th>Whom</th> 
       
          </tr> 
        <?php $i=1;foreach($res_family as $key=>$value){  
          $j=1;?> 
            <tr>
             <td><?php echo $i;?></td>
             <td><?php echo $value['displayFieldName'];?></td>

                 <td> 
                <?php if($value['columnId']!=10){?>
               <?php 
                 
                 if ($value['familyMedStatus'] =='1') {?>
               <?php echo 'Yes'?> 
               <?php }else if ($value['familyMedStatus'] =='0') { ?>
                 <?php echo 'No'?> 
              <?php } ?>
              <?php } else {?>
              <?php echo $value['familyMedStatus']?>
                    <?php } ?>

              </td>
             <td>
                 <?php echo $value['whom'];?>
               </td>    

            </tr> 
        <?php $i++;$j++;} ?> 
      
        </table> 

                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFive">
                <h4 class="panel-title">
         <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                   View Office Policies 
                  </a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                <div class="pd-ltr-20">
      <!-- <div class="container mt-5"> -->
    <h3 align="center"><strong>BROOKWOOD EYE CARE</strong></h3> <br>
    <h4 align="center"><u>OFFICE POLICIES</u></h4>  <br>
    <p align="justify">We look forward to providing all your vision care needs, and will go  above and beyond  to  provi de excellent customer service. Please take a moment to review our policies. </p>
      <ol>
        <li>All contact Lens and Spectacle Gla·sses orders are to be picked up within <u>60 days</u> from the date of purchase. Orders not picked up within <u>60 days</u> will be returned to the lab and any payments/deposits may be forfeited</li>
        <br> 
        <li><strong>Refunds</strong>: Glasses are individually fabricated so we are unable to accept requests for refunds. Therefore, <strong>All Sales are Final.</strong> Merchandise may be returned within <u>30 days</u> for exchange or store credit.</li>
          <br>
        <li><strong>Patient's own frame</strong>: We take great care of patient's frames. However, in the process of fitting new lenses into a customer's old frame, making adjustments or minor repairs, we will not be responsible for breakages during these processes.<strong>Please knoe that these are done at your own risk.</strong></li><br>
        <li>There are <strong>no warranties on sale/ clearance frames</strong> unless purchased in addition. </li><br>
        <li>Contact Lens prescriptions are <strong>valid for 1 year </strong>per FDA regulations. Evaluations are required annually.</li><br>
        <li>All Contact Lens Exams also include a prescription for glasses.</li><br>
        <li>All fittings for Contact Lens examinations are to be completed within <u>60 days </u>to prevent any additional fitting fees. </li><br>
        <li>Doctor's prescription changes are done one time at no charge within <u>60 days </u> of initial order date. </li><br>
        <li>All frames placed on hold will be returned back to the display case for sale after <u>two weeks</u>.</li><br>
      </ol>
          <p align="center"><strong>Insurance Authorization</strong></p><br>
          
          <?php 
            $agree = explode(",",$res_offc[0]['agree_tc']); ?>
         
          
          <input type="checkbox" name="agree_tc[]" id ="agree_tc1" value="agree_tc1"<?php if($agree[0] == "agree_tc1"){echo "checked";} ?> >&ensp; I authorize and request my insurance company to pay to the eye doctor benefits otherwise payable to 
            me. I understand that my insurance carrier may pay lgss than the act1.1al bill for service. I agree to be responsible for the payment of all services rendered on my behalf or my dependants.<br><br>
          <input type="checkbox" name="agree_tc[]" id="agree_tc2" value="agree_tc2"<?php if($agree[1] == "agree_tc2"){echo "checked";} ?> >&ensp; I agree to all of the policies and services above. 
          <br><br>
          <div class="col-md-12 mb-4">
          <div class="row">
            <div class="col-md-6">          
              <label><strong>Signature:</strong> </label>
              <img src="../<?php echo $res_offc[0]['sign'];?>" width="100px;" height="100px;">
              
            </div> 
            <div class="col-md-4">
            <label><strong>Date:</strong></label>
            <input type="date" name="date" id="date" value="<?php echo $res_offc[0]['date'] ?>" class="form-control" readonly>
            </div>
          </div>
          </div><br><br>    
          <h6 style="margin-top:8%;padding:5px;"><b>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</b></h6>
          <div class="col-md-6">
            <label><strong>Patient's Signature:</strong></label>
           <img src="../<?php echo $res_offc[0]['patient_sign'];?>" width="100px;" height="100px;">
          </div>&ensp;
         
        </div>
                </div>
              </div>
            </div>
          </div>
        </div><!--- END COL -->   
      </div><!--- END ROW -->     
    </div>
  <div class="mt-5">
    <?php include "includes/footer.php"; ?>
  </div>

    </div>

  </div>
   </body> 


 
  

  