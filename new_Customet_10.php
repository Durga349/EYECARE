
<?php
include("crudop/crud.php");
$crud = new Crud();
$qryGeneralHealth = "select * from generalhealth where dispStatus=1  
   order by priority";
  $resGeneralHealth=$crud->getData($qryGeneralHealth);
// print_r($resGeneralHealth);


    $qryGeneralHealth2=
  "select * from ocularsymptoms where dispStatus=1  
   order by priority";
  $resGeneralHealth2=$crud->getData($qryGeneralHealth2);

    $qryFamilyHistory= 
  "select * from familyhistory where dispStatus=1   
   order by priority"; 
  $resFamilyHistory=$crud->getData($qryFamilyHistory); 
 // print_r($resGeneralHealth); 

    $cities= 
  "select * from cities  
   order by id asc"; 
  $cities_data=$crud->getData($cities); 
  //print_r($cities_data); 


   $states= 
  "select * from states  
   order by id asc"; 
  $states_data=$crud->getData($states); 
  //print_r($cities_data);

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>BROOKWOOD-EYECARE</title>
    
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <style type="text/css">
      .template_faq {
    background: #edf3fe none repeat scroll 0 0;
}
.panel-group {
    background: #fff none repeat scroll 0 0;
    border-radius: 3px;
    box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.04);
    margin-bottom: 0;
    padding: 30px;
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
    background: #ffb900 none repeat scroll 0 0;
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
    background: #ffb900 none repeat scroll 0 0;
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
    border-left: 1px dashed #8c8c8c;
    padding-left: 25px;
}
</style> 
    
</head>
    <body>

      <form id="fm1" name="fm1" enctype="multipart/form-data" method="post" action="saveData.php">
        <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center wow zoomIn">
            <img src="Brookwood.png" width="100" height="100">
            <span></span>
        
          </div>
        </div>
      </div>

      <div class="row">       
        <div class="col-md-12">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   Patient Details
                   <span style="float:right;"  onclick="saveData()" ><i class="ri-save-3-line ri-lg"></i>
                     <!-- <label for="yes">Yes</label>
                    <input type="radio" id="yes" name="yes" value="Yes">
                    <label for="no">No</label>
                    <input type="radio" id="no" name="no" value="No"> -->
                  </span>
                  </a>
                  </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <div class="card-body">



              <div class="row">
                <div class="col-md-4 mt-4">
                      <label ><strong>To Whom:</strong></label>
                     <select name="towhom" id="towhom" class="form-control">
                      <option value="">--Select--</option>
                      <option value="Myself">Myself</option>
                      <option value="Wife">Wife</option>
                      <option value="Daughter">Daughter</option>
                      <option value="Son">Son</option>
                      <option value="Mother">Mother</option>
                      <option value="Father">Father</option>                       
                     </select>
                      </div>
                      <div class="col-md-4 mt-4">
                          <label><strong>Insurance Subscribers :</strong></label><br>
                         <div class="row">
                           <div class="col-md-9">
                                  <input type="radio" name="insSubscribers" id="member_id1" value="Member Id" >&ensp;Member Id&ensp;
                                  <input type="radio" name="insSubscribers" id="ssn1" value="Last four of SSN" >&ensp;Last four of SSN
                           </div>
                           <div class="col-md-3">
                        
                     <input type="text" name="codeval" class="form-control col-md-8">      
                           </div>
                         </div>
                      </div>  
                    <div class="col-md-4 mt-4">
                    
                      <label ><strong>First Name:</strong></label>
                      <input type="text" class="form-control" id="patientFname" placeholder="" name="patientFname" title="enter First name" >
                      </div>
                    </div><br>

                    <div class="row">
                      <div class="col-md-4 mt-4">
                      <label ><strong>Last Name:</strong></label>
                      <input type="text" class="form-control" id="plastLname" placeholder="" name="plasLtname" title="enter Last Name" >
                      </div>
                      <div class="col-md-4 mt-4">
                      <label ><strong>Gender:</strong></label><br>
                     <input type="radio" name="gender" id="gender1" value="Male" >&ensp;Male
                     <input type="radio" name="gender" id="gender2" value="Female" >&ensp;Female
                      </div>
                       <div class="col-md-4 mt-4">
                         <label ><strong>DOB:</strong></label><br>
                        <input type="date" class="form-control" id="patDob"name="patDob" placeholder="" title="Enter the Date Of Brith ">
                      </div>
                    </div><br>
             <div class="row mb-4">
              <div class="col-md-4 mt-4">
                      <label><strong>Home Phone:</strong></label>
                          <input type="number" name="homeph" id="homeph" placeholder="Enter the Home Phone" class="form-control">
                      </div>
                       <div class="col-md-4 mt-4">
                          <label><strong>Work:</strong></label>
                          <input type="number" name="workNo" id="workNo" placeholder="" class="form-control">
                      </div>
                       <div class="col-md-4 mt-4">
                          <label><strong>Mobile No:</strong></label>
                          <input type="number" name="cell" id="cell" placeholder="" class="form-control">
                      </div>

                      </div><br>
                         <div class="row mb-4">   
                      <div class="col-md-4 mt-4">
                          <label><strong>Email</strong>(Please print each alphabet seperate & legibly):</label>                     
                          <input type="email" name="email" id="email" placeholder="" class="form-control">
                      </div> 
                      <div class="col-md-4 mt-4">
                      <label ><strong>Address:</strong></label>
                       <textarea class="form-control" class="address" id="address" name="address" placeholder="" rows="1" ></textarea>
                      </div> 
                      <div class="col-md-4 mt-4">
                         <label><strong>City:</strong></label>
                         <select class="form-control" id="city" name="city" >
                           <option value="">--Select--</option>
                         <?php foreach ($cities_data as $key => $value) {?>
                            <option value=" <?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>
                         <?php   } ?>
                           </select>
                      </div>

                    </div><br>
                    <div class="row">
                      <div class="col-md-4 mt-4">
                      <label><strong>State:</strong></label>
                         <select class="form-control" id="state" name="state">
                           <option value="">--Select--</option>
                           <?php foreach ($states_data as $key => $value) {?>
                            <option value="<?php echo $value['stateName']; ?>"><?php echo $value['stateName']; ?></option> 
                              <?php    } ?>
                        </select>
                     </div> 
                      <div class="col-md-4 mt-4">
                          <label><strong>Zip Code:</strong></label>
                          <input type="text" name="zipCode" id="zipCode" placeholder="" class="form-control">
                      </div>  
                       <div class="col-md-4 mt-4">
                      <label ><strong>Insurance Subscribers First Name:</strong></label>
                      <input type="text" class="form-control" id="insFname" placeholder="" name="insFname" title="enter First name" >
                      </div> 
                    </div><br>
                    <div class="row">
                     <div class="col-md-4 mt-4">
                      <label ><strong>Insurance Subscribers Last Name:</strong></label>
                      <input type="text" class="form-control" id="insLname" placeholder="" name="insLname" title="enter First name" >
                      </div>           
                        <div class="col-md-4 mt-4">
                        <label ><strong>Insurance Subscribers DOB:</strong></label><br>
                        <input type="date" class="form-control" id="dob"name="dob" placeholder="" title="Enter the Date Of Brith ">
                      </div>
                        <div class="col-md-4 mt-4">                         
                          <label ><strong>Groupon # or Self Pay:</strong></label>
                          <input type="radio" name="payment" id="groupon" value="Groupon">&ensp;Groupon                      
                           <input type="radio" name="payment" id="selfpay" value="Selfpay">&ensp;Selfpay
                           <input type="text" name="grouponcode" class="form-control col-md-8 pt-4">
                          </div>
                        </div><br>
                          <div class="row">


                           <div class="col-md-4 mt-4">
                          <label ><strong>Vision Insurance :</strong></label>
                          <input type="text" name="insurance" id="insurance" placeholder="" class="form-control">
                      </div>                    
                         <div class="col-md-4 mt-4">
                     <label ><strong>How you found our Office:</strong></label>
                      <input type="text" class="form-control" id="office" placeholder="" name="office">
                      </div> 
                    </div><br>
                     <!--  <div class="row">          
                      <div class="col-md-12 mt-4">
                        <p><strong>Insurance Authorization:</strong> I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</p>
                      </div>
                      <div class="col-md-4 mt-4">
                        <label><strong>Signature:</strong></label>
                      <textarea name="sign" id="sign" class="form-control"></textarea>
                        </div>                
                       <div class="col-md-4 mt-4">
                        <label><strong>Date:</strong></label>
                      <input type="date" name="date" id="date" class="form-control">
                        </div>
                        <div class="col-md-12 mt-4"><p><u>HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</u></p>     
                        </div>
                        <div class="col-md-12 mt-4">
                        <p>I, <input type="text" name="" style="border:none; border-bottom: 1px dashed;" > (Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.</p>                        
                        </div>
                        <div class="col-md-12 mt-4">
                          <p>Please check one: </p>
                          <input type="checkbox" name="">&ensp;I hereby acknowledge reciept of the policy.<br>
                          <input type="checkbox" name="">&ensp;I hereby REFUSE to acknwledge reciept of the policy. I understand that even though I refuse to sign this ACKNOWLEDGEMENT, the provider may still provide treatment to me.
                        </div>
                        <div class="col-md-4 mt-4">
                          <label><strong>Signature:</strong></label>
                        <textarea name="signature" id="signature" class="form-control"></textarea>
                        </div>
                        <div class="col-md-4 mt-4">
                          <label><strong>Date:</strong></label>
                          <input type="date" name="date_pre" id="date_pre" class="form-control">
                        </div>
              </div> -->
               <div class="row">
           <!--  <div class="col-md-4"> 
             <label>Labele 1 </label>
             <input type="text" name="" class="form-control">
           </div>

            <div class="col-md-4"> 
             <label>Labele 2 </label>
             <input type="text" name="" class="form-control">
           </div>

            <div class="col-md-4"> 
             <label>Labele 3 </label>
             <input type="text" name="" class="form-control">
           </div>
 -->             
              </div>
              
    
          </div>
            </div>
              </div>
                </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   Patient Medical History
                    <span style="float:right;">
                     <label for="yes">Yes</label>
                    <input type="radio" id="yes" name="yes" value="Yes">
                    <label for="no">No</label>
                    <input type="radio" id="no" name="no" value="No">
                  </span>
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
            <div class="row">
            <div class="col-md-4"> 
             <label>Name of Primary Care Physician</label>
             <input type="text" name="physicianName" id="physicianName" class="form-control">
           </div>

            <div class="col-md-4"> 
             <label>City </label>
             <input type="text" name="physicianCity" id="physicianCity" class="form-control">
           </div>

            <div class="col-md-4"> 
             <label>Last Date of Check Up</label>
             <input type="text" name="checkUplDate"  id="checkUplDate" class="form-control">
           </div>
             </div>

          <div class="row">
            <div class="col-md-4"> 
             <label>Current Medications</label>
             <textarea name="currentMed"  id="currentMed" class="form-control"></textarea>
           </div>

            <div class="col-md-4"> 
             <label>Any Allergies to Medication? </label><br>
            <input type="radio" name="allergyMedication" id="allergyMedication1" value="yes" >&ensp;Yes
             <input type="radio" name="allergyMedication" id="allergyMedication2" value="no" >&ensp;No
             <input type="text" name="allergyMedicationText" id="allergyMedicationText" class="form-control">
           </div>


            <div class="col-md-4"> 
             <label>Have You Had Any Surgeries? </label><br>
            <input type="radio" name="anySurgeries" id="AnySurgeries1" value="yes" >&ensp;Yes
             <input type="radio" name="anySurgeries" id="AnySurgeries2" value="no" >&ensp;No
           </div>

  </div>
  <div class="row">
      <div class="col-md-4"> 
  <label>Do you use cigarettes/tobacco,
alcohol,<br> or other substances?  </label><br>
            <input type="radio" name="asecigarettes" id="asecigarettes1" value="yes" >&ensp;Yes
             <input type="radio" name="asecigarettes" id="asecigarettes2" value="no" >&ensp;No
           </div>
         </div>

        <!-- General Health -->

      <div class="row">
        <table border="1" class="table table-bordered">
          <tr>
              <th>S.No</th>
              <th>Health Problem</th>
              <th>Status</th>
          </tr>
        <?php $i=1;foreach($resGeneralHealth as $key=>$value){ 
          $j=1;?>
            <tr>
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>"><?php echo $i;?></td>
              <td>
        <?php echo $value['displayFieldName'];?>
          
          
        </td>
              <td>
<input type="radio" id="genHealthStatus<?php echo $i."_".$j;?>" name="genHealthStatus<?php echo $i;?>" value="1" 
class="form-check-inline">Yes &ensp;
<input type="radio" id="genHealthStatus<?php echo $i."_".($j+1);?>" name="genHealthStatus<?php echo $i;?>" value="0" 
class="form-check-inline">No
&ensp;
<?php if($value['type']=="Yes"){
  $typevalues = explode(",",$value['typevalues']);
  ?>
        <select id="typevalue<?php echo $i;?>" name="typevalue<?php echo $i;?>" class="form-control">
            <option value="">--Select--</option>
            <?php foreach ($typevalues as $key => $value): ?>
      <option value="<?php echo $value;?>">
        <?php echo ucwords($value);?></option>
            <?php endforeach ?>
         </select>
          <?php }?>
              </td>
            </tr>
        <?php $i++;$j++;} ?>
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
                     Patient Eye History
                      <span style="float:right;">
                     <label for="yes">Yes</label>
                    <input type="radio" id="yes" name="yes" value="Yes">
                    <label for="no">No</label>
                    <input type="radio" id="no" name="no" value="No">
                  </span>
                  </a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                <!--  patient eye History -->

                <div class="row">
                <div class="col-md-6">
                  <label><b>Date Of Last Eye Exam:</b></label>  
                  <input type="date" name="dateOfLastEyeExam" id="dateOfLastEyeExam" class="form-control" placeholder="">
                </div>
                
              <div class="col-md-6">
                  <label><b>Do You Currently Wear Glasses:</b></label><br>
                  <input type="radio" name="doYouCurrentlyWearGlasses" id="doYouCurrentlyWearGlasses1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="doYouCurrentlyWearGlasses" id="doYouCurrentlyWearGlasses2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
            
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Do You Currently Wear Contacts:</b></label><br>
                  <input type="radio" name="doYouCurrentlyWearContacts" id="doYouCurrentlyWearContacts1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="doYouCurrentlyWearContacts" id="doYouCurrentlyWearContacts2" value="No">&nbsp;No&nbsp;
                </div>
                <div class="col-md-6">
                  <label><b>What kind?</b></label>
                  <input type name="whatKind" id="whatKind" class="form-control" placeholder="">
                </div> 
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Solution Used?</b></label>
                  <input type name="solutionUsed" id="solutionUsed" class="form-control" placeholder="">
                </div>
                
            <div class="col-md-6">
                  <label><b>Are You Satiesfied With The Vision , And Comfort Of Your Contact Lenses?</b></label>
                   <input type="radio" name="satisfied_vision" id="areYousatiesfiedWithTheVision1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="satisfied_vision" id="areYousatiesfiedWithTheVision2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Would You Prefer Clear, Or Colored Contacts?</b></label><br>
                   <input type="checkbox" name="wouldYouPreferClear[]" id="clear" class="form-check-inline" value="Clear">Clear&ensp;
                   <input type="checkbox" name="wouldYouPreferClear[]" id="colored" class="form-check-inline" value="Colored">Colored&ensp;
                   <input type="checkbox" name="wouldYouPreferClear[]" id="both" class="form-check-inline" value="Both">Both&ensp;
                </div>                
                <div class="col-md-6">
                  <label><b>Do You Use The Computer?</b></label><br>

                <input type="radio" name="doyouUseTheComputer" id="doyouUseTheComputer1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="doyouUseTheComputer" id="doyouUseTheComputer2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
               <div class="row pt-4"> 
            <div class="col-md-6">
                  <label><b>Approx.How Many Hours A Day Do You Use The Computer?</b></label>
                   <input type="number" name="appr_hrs_day" id="appr_hrs_day" value="" placeholder="" class="form-control">
                </div>
                <div class="col-md-6">
                  <label><b>Occupation:</b></label>
                   <textarea name="ocupation" id="ocupation" class="form-control" ></textarea>
                </div>
              </div>
              
               <div id="tool-placeholder"></div>
            <!--   <div class="row pt-2">
                <div class="col-md-12">
                <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageVisitors.php'" style="float: left;">
              <input type="submit" name="submit" value="Save" class="btn btn-primary" style="float: right;">
            </div>
              </div> -->



           <!--  form 2 -->

           <table border="1" class="table table-bordered">
          <tr>
              <th>S.No</th>
              <th>Symptom Name</th>
              <th>&nbsp;</th>
          </tr>
        <?php $i=1;foreach($resGeneralHealth2 as $key=>$value){ 
          $j=1;?>
            <tr>
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>"><?php echo $i;?></td>
              <td>
        <?php echo $value['displayFieldName'];?></td>
              <td>
                <input type="checkbox" id="ocularsymptoms<?php echo $i;?>" 
                name="ocularsymptoms<?php echo $i;?>" value="1" 
                class="form-check-inline">
<!-- Yes &ensp; -->
<!-- <input type="checkbox" id="ocularsymptoms<?php echo $i."_".($j+1);?>" name="ocularsymptoms<?php echo $i;?>" value="0" 
class="form-check-inline">No -->
              </td>
            </tr>
        <?php $i++;$j++;} ?>
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
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                   Family Eye /Medical History
                    <span style="float:right;" >
                     <label for="yes">Yes</label>
                    <input type="radio" id="yes" name="yes" value="Yes">
                    <label for="no">No</label>
                    <input type="radio" id="no" name="no" value="No">
                  </span>
                  </a>
                </h4>
              </div>
              <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                  <div class="row" >
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
            <select id="whom<?php echo $i;?>" name="whom<?php echo $i;?>" class="form-control">
            <option value="">--Select--</option>
            <?php foreach ($typevalues as $key => $value): ?>
      <option value="<?php echo $value;?>">
        <?php echo ucwords($value);?></option>
            <?php endforeach ?>
         </select>
         
              </td>
            </tr> 
        <?php $i++;$j++;} ?> 
       <!--  <tr> 
            <td colspan="3"> 
              <button type="button"  
              class="btn btn-danger">Cancel</button> 
 
              <button type="submit"  
              class="btn btn-primary float-right">Step-4</button> 
            </td> 
        </tr> --> 
        </table> 

                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFive">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    How Titanic give customer support? 
                  </a>
                </h4>
              </div>
              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem, dictum id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu tincidunt ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor aliquam vitae. Curabitur molestie eros. </p>
                </div>
              </div>
            </div> -->
          </div>
        </div><!--- END COL -->   
      </div><!--- END ROW -->     
    </div>
  </form>
    </body>

   <script type="text/javascript">

    function saveData() {
        document.getElementById("fm1").submit();
    }
    /*
Author       : Theme_ocean.
Template Name: Fury - Product Landing Page
Version      : 1.0
*/
(function($) {
  'use strict';
  
  jQuery(document).on('ready', function(){
  
      $('a.page-scroll').on('click', function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: $(anchor.attr('href')).offset().top - 50
        }, 1500);
        e.preventDefault();
      });   

  });   

        
})(jQuery);


  


   </script>
</html>