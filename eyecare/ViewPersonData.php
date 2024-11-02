<?php include "includes/header.php"; 
 
$patient_no = $_GET['patient_no'];

// $pid = $_GET['patientID'];


 //----------Personal Information---------

  $sel_per = "select pi.id, pi.patient_Id, pi.toWhom, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId, rd.id from personal_information pi LEFT JOIN relations_details rd on pi.toWhom = rd.id where patient_number = '".$patient_no."'";
$res_per = $crud->getData($sel_per);
//veiw personal information--
$view_sel_per = "SELECT pi.id,rd.towhom, pi.patient_Id, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId FROM `personal_information` pi left join relations_details rd on pi.toWhom = rd.id WHERE patient_number = '".$patient_no."' ";
$view_res_per = $crud->getData($view_sel_per);

 //Patient Medical History

 $sel_genhealth="SELECT gh.columnId,gh.genHealthStatus, gh.displayFieldName,gh.typevalues,gh.type,ph.typevalue,ph.genHealthStatus,ph.genHealth_Id, ph.physicianName,ph.checkUplDate,ph.physicianCity,ph.currentMed,ph.allergyMedication,ph.allergyMedicationText,ph.anySurgeries,ph.asecigarettes, ph.randomId FROM `generalhealth` AS gh LEFT JOIN patient_medical_history AS ph ON gh.columnId=ph.genHealth_Id WHERE gh.columnId=ph.genHealth_Id AND ph.patient_number = '".$patient_no."'";
// exit;
 $res_med =$crud->getData($sel_genhealth);

 //Patient Eye History

// $sel_pateye = "SELECT peh.*, oc.* FROM `patient_eye_history` peh left JOIN ocularsymptoms oc on peh.ocularsymptoms = oc.columnId where codeval = '".$codeval."'";
//Patient Eye History
$sel_pateye ="SELECT oc.columnId,peh.id,oc.displayFieldName,oc.priority,oc.dispStatus,oc.type,oc.typevalues,peh.ocularsymptoms,peh.dateOfLastEyeExam,peh.doYouCurrentlyWearGlasses,peh.doYouCurrentlyWearContacts,peh.whatKind,peh.solutionUsed,peh.satisfied_vision,peh.wouldYouPreferClear,peh.doyouUseTheComputer,peh.appr_hrs_day,peh.ocupation,peh.codeval,peh.randomId FROM `ocularsymptoms` AS oc LEFT JOIN patient_eye_history AS peh ON oc.columnId=peh.ocularsymptoms WHERE oc.columnId=peh.ocularsymptoms AND peh.patient_number = '".$patient_no."'";
 
 $res_pateye = $crud->getData($sel_pateye);

// Family Eye History

$sel_family="SELECT fh.columnId,fh.familyMedStatus,fh.displayFieldName,feh.familyMedStatus,fh.whom as whome,feh.whom, feh.randomId FROM familyhistory AS fh LEFT JOIN family_eye_history AS feh ON fh.columnId=feh.familyMed_Id WHERE fh.columnId=feh.familyMed_Id AND  feh.codeval='".$codeval."' and feh.patient_number = '".$patient_no."' ";

 $res_family =$crud->getData($sel_family);

 //OFFICE DETAILS

  $sel_offc = "select * from office_details where  patient_number = '".$patient_no."' ";
 //exit;
 $res_offc = $crud->getData($sel_offc);

 // print_r($res_offc);
 // exit;

 // --------------mastertable-----------------
 $mas_qry = "select * from patient_master_table where patient_number = '".$patient_no."'";
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
      <br>
    <div class="row">       
        <div class="col-md-12 mt-3">
          <div class="row"> 
            <div class="col-md-6">
              <h5 >Name : <?php echo $res_per[0]['patientFname'] ?><?php echo $res_per[0]['plasLtname']?></h5>
            </div>
            <div class="col-md-6 mb-3" style="float:left;">
            <input type="reset" name="cancel" value="Report Data" class="btn btn-info" onclick="window(location='ReportData.php?patient_no=<?php echo $patient_no; ?>')" style="margin-right: 5px;" > &nbsp;&nbsp;
             <input type="reset" name="cancel" value="Back" class="btn btn-danger" onclick="history.back()" >
          </div>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title text-center">   View Patient Details  </h4>                  
            </div>
            <div class="panel-body" id="patient_detailsId">
            <div class="card-body">
              <div class="row">
                    <!-- <div class="col-md-3 mt-4">
                      <label ><strong>To Whom:</strong></label><br>
                    </div>
                    <div class="col-md-3 mt-4">
                    <span><?php echo $view_res_per[0]['towhom']; ?></span>
                    </div> -->
                    <div class="col-md-3 mt-4">
                      <label><strong>Insurance Subscribers :</strong><?php echo $res_per[0]['insSubscribers'] ?></label>
                    </div>
                    <div class="col-md-3 mt-4">
                    <span><?php echo $res_per[0]['codeval'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                      <label ><strong>First Name:</strong></label>
                    </div>  
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['patientFname'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                      <label ><strong>Last Name:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                    <span><?php echo $res_per[0]['plasLtname'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                    <label ><strong>Gender:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['gender'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                     <label ><strong>DOB:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['patDob'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                        <label><strong>Home Phone:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['homeph'] ?></span> 
                    </div>
                    <div class="col-md-3 mt-4">
                      <label><strong>Work:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['workNo'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                      <label><strong>Mobile No:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                     <span><?php echo $res_per[0]['cell'] ?></span> 
                    </div>
                    <div class="col-md-3 mt-4">
                       <label><strong>Email</strong></label>    
                    </div>
                    <div class="col-md-3 mt-4">
                     <span><?php echo $res_per[0]['email'] ?></span>  
                    </div> 
                    <div class="col-md-3 mt-4">
                      <label ><strong>Address:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['address'] ?></span>
                    </div> 
                    <div class="col-md-3 mt-4">
                       <label><strong>City:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['city'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                    <label><strong>State:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['state'] ?></span>
                    </div> 
                    <div class="col-md-3 mt-4">
                       <label><strong>Zip Code:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['zipCode'] ?></span>
                    </div>  
                    <div class="col-md-3 mt-4">
                      <label ><strong>Insurance Subscribers First Name:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['insFname'] ?></span>
                    </div>
                    <div class="col-md-3 mt-4">
                      <label ><strong>Insurance Subscribers Last Name:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['insLname'] ?></span>
                    </div>           
                    <div class="col-md-3 mt-4">
                        <label ><strong>Insurance Subscribers DOB:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['dob'] ?> </span>
                    </div>
                    <div class="col-md-3 mt-4">                         
                      <label ><strong>Groupon # or Self Pay :&nbsp;</strong><?php echo $res_per[0]['payment'] ?></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['grouponcode'] ?></span>
                    </div>   
                    <div class="col-md-3 mt-4">
                    <label ><strong>Vision Insurance :</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                      <span><?php echo $res_per[0]['insurance'] ?></span>
                    </div>                    
                    <div class="col-md-3 mt-4">
                      <label ><strong>How you found our Office:</strong></label>
                    </div>
                    <div class="col-md-3 mt-4">
                       <span><?php echo $res_per[0]['office'] ?></span>
                    </div>
              </div>           
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

                    <span><?php echo $res_per[0]['date'] ?></span>
                     
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
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc2" value="pat_agree_tc2"<?php if($pat_agree[0]=='pat_agree_tc2'){echo "checked";} ?>>&ensp;I hereby REFUSE to acknwledge reciept of the policy.I understand that even though I refuse to sign this <b>ACKNOWLEDGEMENT</b>, the provider may still provide treatment to me.
                        </div>
                     
                  <div class="col-md-6 mt-4">
                    <label><strong>Signature:</strong></label>
                    <!-- <input type="text" name="signature" id="signature" class="form-control" value="<?php echo $res_per[0]['signature'];?>" readonly> -->

                    <img src="../<?php echo $res_per[0]['signature'];?>" width="100px;" height="100px;">
                  </div>
                  <div class="col-md-6 mt-4">
                    <label><strong>Date:</strong></label>
                    <span><?php echo $res_per[0]['datePre'];?></span>
                   
                  </div>
                </div>    
              </div>
            </div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title text-center">  View Patient Medical History
                </h4>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 mt-4"> 
                   <label><strong>Name of Primary Care Physician:</strong></label>
                 </div>
                 <div class="col-md-3 mt-4"> 
                  <span><?php echo $res_med[0]['physicianName'] ?></span>
                 </div>
                  <div class="col-md-3 mt-4"> 
                   <label><strong>City:</strong> </label>
                 </div>
                 <div class="col-md-3 mt-4"> 
                  <span><?php echo $res_med[0]['physicianCity'] ?></span>
                 </div>
                  <div class="col-md-3 mt-4"> 
                   <label><strong>Last Date of Check Up:</strong></label>
                 </div>
                  <div class="col-md-3 mt-4"> 
                    <span><?php echo $res_med[0]['checkUplDate'] ?></span>
                 </div>
                  <div class="col-md-3 mt-4" style="margin-top: 5px;"> 
                   <label><strong>Current Medications:</strong></label>
                 </div>
                <div class="col-md-3 mt-4"> 
                 <span><?php echo $res_med[0]['currentMed'] ?></span>
                </div>
                <div class="col-md-3 mt-4" style="margin-top: 5px;"> 
                 <label><strong>Any Allergies to Medication? </strong></label>
                 </div>
                 <div class="col-md-3 mt-4"> 
                    <span><?php echo $res_med[0]['allergyMedicationText'] ?></span>
                </div>

            <div class="col-md-3 mt-4" style="margin-top: 5px;"> 
             <label><strong>Have You Had Any Surgeries? </strong></label>  
           </div>
             <div class="col-md-3 mt-4"> 
              <span><?php echo strtoupper($res_med[0]['anySurgeries']) ?></span>
           </div>
      <div class="col-md-3 mt-4" style="margin-top: 5px;">

        <label><strong>Do you use cigarettes/tobacco,alcohol,<br> or other substances? </strong></label>
      </div>
        <div class="col-md-3 mt-4"> 
   <span><?php echo strtoupper($res_med[0]['asecigarettes']) ?></span>
           </div>
     </div>

        <!-- General Health -->
      <div class="row" style="margin-top: 30px"> 
    <strong><h4 class="text-center" style="margin-left: 350px;">GENERAL HEALTH</h4></strong><br><br> 
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
    
        </table>
       </div>
                </div>
      
            </div>
              <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title text-center">
               
                    View Patient Eye History
                
                </h4>
              </div>
            
                <div class="panel-body">
                <!--  patient eye History -->

                <div class="row">
                <div class="col-md-3 mt-4">
                  <label><b>Date Of Last Eye Exam:</b></label>  
                </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['dateOfLastEyeExam'] ?></span>
                 
                </div>
                
              <div class="col-md-3 mt-4">
                  <label><b>Do You Currently Wear Glasses:</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['doYouCurrentlyWearGlasses'] ?></span>
                </div>
                <div class="col-md-3 mt-4">
                  <label><b>Do You Currently Wear Contacts:</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['doYouCurrentlyWearContacts'] ?></span>
                </div>
          
                <div class="col-md-3 mt-4" style="margin-top: 5px;">
                  <label><b>What kind?</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['whatKind'] ?></span>
                 
                </div> 
                <div class="col-md-3 mt-4" style="margin-top: 5px;">
                  <label><b>Solution Used?</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['solutionUsed'] ?></span>
                 
                </div>
                 <div class="col-md-3 mt-4" style="margin-top: 5px;">
                  <label><b>Would You Prefer Clear, Or Colored Contacts?</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['wouldYouPreferClear'] ?></span>
                </div> 
                 <div class="col-md-3 mt-4" style="margin-top: 5px;">
                  <label><b>Are You Satiesfied With The Vision , And Comfort Of Your Contact Lenses?</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['satisfied_vision'] ?></span>
                
                </div>             
                <div class="col-md-3 mt-4" style="margin-top: 24px;">
                  <label><b>Do You Use The Computer?</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['doyouUseTheComputer'] ?></span>
                </div>
                <div class="col-md-3 mt-4" style="margin-top: 5px;">
                  <label><b>Approx.How Many Hours A Day Do You Use The Computer?</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['appr_hrs_day'] ?></span>
              
                </div>
                <div class="col-md-3 mt-4">

                  <label><b>Occupation:</b></label>
                    </div>
                 <div class="col-md-3 mt-4">
                  <span><?php echo $res_pateye[0]['ocupation'] ?></span>
                
                </div>
               <div id="tool-placeholder"></div>
        
           <!--  form 2 -->
               <strong><h4 style="text-align:center;margin-left: 350px;">OCULAR SYMPTOMS</h4></strong> 
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
             <div class="panel panel-default">
          <!--     <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title text-center">
                 
                  View Family Eye /Medical History -->
                   <!--  <span style="float:right;" >
                     <label for="yes">Yes</label>
                    <input type="radio" id="yes" name="yes" value="Yes">
                    <label for="no">No</label>
                    <input type="radio" id="no" name="no" value="No">
                  </span> -->
               
               <!--  </h4>
              </div> -->
            
                <div class="panel-body">
                  <div class="row" >
    <strong><h4 style="text-align:center;margin-left: 280px;">FAMILY EYE/MEDICAL HISTORY</h4></strong>            
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
            <div class="panel panel-default">
          <!--     <div class="panel-heading" role="tab" id="headingFive">
                <h4 class="panel-title text-center">
        
                   View Office Policies 
                
                </h4>
              </div> -->
           
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
            <span><?php echo $res_offc[0]['date'] ?></span>
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
        </div><!--- END COL -->   
      </div><!--- END ROW -->     
    </div>
  <div class="mt-5">
    <?php include "includes/footer.php"; ?>
  </div>

    </div>

  </div>
   </body> 


 
  

  