
<?php
session_start();
include("crudop/crud.php");
$crud = new Crud();

$codeval = $_SESSION['codeval'];

//----------Personal Information---------

$sel_per = "select pi.id, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.signature, pi.datePre, pi.status, pi.randomId, rd.id from personal_information pi LEFT JOIN relations_details rd on pi.toWhom = rd.id where codeval = '".$codeval."' ";
$res_per = $crud->getData($sel_per);


$qryGeneralHealth = "select * from generalhealth where dispStatus=1  
   order by priority";
  $resGeneralHealth=$crud->getData($qryGeneralHealth);
// print_r($resGeneralHealth);


    $qryGeneralHealth2= "select * from ocularsymptoms where dispStatus=1 order by priority";
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <!-- toastr -->
  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

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
  .mand{
    color: red;
    font-size: 25px;
  }
  .scroll {
            margin: 4px, 4px;
            padding: 4px;
/*            background-color: green;*/
            width: 500px;
            height: 110px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }
</style> 
    
</head>
    <body>

        <form method="post" name="addform" id="addform" enctype="multipart/form-data"  autocomplete="off">

        <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center wow zoomIn">
            <img src="Brookwood.png" width="100" height="80">
            <span></span>
        
          </div>
        </div>
       <!--  <input type="submit" name="submit" value="Save" class="btn btn-primary" style="float: right;background-color: #0BA1C2;"> -->
      </div>
     
      <div class="row">       
        <div class="col-md-12">
           <div class="col-12">
            <h3 style="margin-left:60px;margin-bottom:-35px;">Name : <?php echo $res_per[0]['patientFname'] ?><?php echo $res_per[0]['plasLtname']?></h3>
            <h3 style="margin-left:70%; margin-top:10px;color:#0BA1C2;"><b>Add Family Members</b></h3>
          </div>
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <!-- <div class="row"> -->
                  <!-- <div class="col-md-6"> -->
                    <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   Patient Details          
                 
                  </a> 
                  </h4>                  
              
              </div>


              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body" id="patient_detailsId">
                  <div class="card-body">
              <div class="row">
                <div class="col-md-4 mt-4">
                      <label ><strong>To Whom:</strong><span class="mand">*</span></label>
                       <select name="towhom" id="towhom" class="form-control">
                      <option value="">--Select--</option>
                     <?php 
                     foreach ($relations_data as $key => $value) { ?> 
                      <option value="<?php echo $value['id'] ?>"><?php echo $value['towhom'] ?></option>

                     <?php } ?>                      
                     </select>
                      </div>
        <div class="col-md-4 mt-4">
        <label><strong>Insurance Subscribers :</strong><span class="mand">*</span></label>
        <input type="radio" name="insSubscribers" id="member_id1" value="MemberId" <?php if($res_per[0]['insSubscribers']=="MemberId"){echo "checked";}?>  onchange="JfSSNchanplc(this)">&ensp;Member Id&ensp;
        <input type="radio" name="insSubscribers" id="ssn1" value="SSN" <?php if($res_per[0]['insSubscribers']=="SSN"){echo "checked";}?> onchange="JfSSNchanplc(this)">&ensp;SSN

        <input type="text" id="codeval" name="codeval" class="form-control col-md-8 pt-4" placeholder="Please Enter Member Id" value="<?php echo $res_per[0]['codeval'] ?>" readonly>                  
        </div>                       
       <div class="col-md-4 mt-4">              
       <label ><strong>First Name:</strong><span class="mand">*</span></label>
      <input type="text" class="form-control" id="patientFname" placeholder="" name="patientFname" title="enter First name" value="">
      </div>
       </div><br>
      <div class="row">
                      <div class="col-md-4 mt-4">
                      <label ><strong>Last Name:</strong><span class="mand">*</span></label>
                      <input type="text" class="form-control" id="plasLtname" placeholder="" name="plasLtname" title="enter Last Name" value="<?php echo $res_per[0]['plasLtname'];?>" readonly>
                      </div>
                      <div class="col-md-4 mt-4">
                      <label ><strong>Gender:</strong><span class="mand">*</span></label><br>
                       
                     <input type="radio" name="gender" class="gender" id="gender1" value="Male">&ensp;Male
                     <input type="radio" name="gender" class="gender" id="gender2" value="Female" >&ensp;Female
                    <br/>
                      </div>
                       <div class="col-md-4 mt-4">
                         <label ><strong>DOB:</strong><span class="mand">*</span></label><br>
                        <input type="date" class="form-control" id="patDob"name="patDob" placeholder="" title="Enter the Date Of Brith" value="">
                      </div>
                    </div><br>
             <div class="row mb-4">
              <div class="col-md-4 mt-4">
                      <label><strong>Home Phone:</strong><span class="mand"></span></label>
                          <input type="text" name="homeph" id="homeph"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $res_per[0]['homeph'] ?>" readonly>
                      </div>
                       <div class="col-md-4 mt-4">
                          <label><strong>Work:</strong><span class="mand"></span></label>
                         <input type="text" name="workNo" id="workNo"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $res_per[0]['workNo'] ?>" readonly>
                      </div>
                       <div class="col-md-4 mt-4">
                          <label><strong>Mobile No:</strong><span class="mand">*</span></label>
                          <input type="text" name="cell" id="cell"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="" >
                      </div>

                      </div><br>
                         <div class="row mb-4">   
                      <div class="col-md-4 mt-4">
                          <label><strong>Email</strong><span style="color:blue;">&nbsp;(Please print each alphabet seperate & legibly):</span></label>                     
                          <input type="email" name="email" id="email" class="form-control" value="">
                      </div> 
                      <div class="col-md-4 mt-4">
                      <label ><strong>Address:</strong><span class="mand">*</span></label>
                       <textarea class="form-control" class="address" id="address" name="address" placeholder="" rows="1" readonly><?php echo $res_per[0]['address'] ?></textarea>
                      </div> 
                      <div class="col-md-4 mt-4">
                         <label><strong>City:</strong><span class="mand"></span></label>
                         <select class="form-control" id="city" name="city" >
                           <option value="">--Select--</option>
                         <?php foreach ($cities_data as $key => $value) {?>
                            <option value=" <?php echo $value['city']; ?>" <?php if($res_per[0]['city']== $value['city']){ echo "selected='selected'";} ?>><?php echo $value['city']; ?></option>
                         <?php   } ?>
                           </select>
                      </div>

                    </div><br>
                    <div class="row">
                      <div class="col-md-4 mt-4">
                      <label><strong>State:</strong><span class="mand"></span></label>
                         <select class="form-control" id="state" name="state">
                           <option value="">--Select--</option>
                           <?php foreach ($states_data as $key => $value) {?>
                            <option value="<?php echo $value['stateName']; ?>"<?php if($res_per[0]['state']== $value['stateName']){ echo "selected='selected'";} ?>><?php echo $value['stateName']; ?></option> 
                              <?php    } ?>
                        </select>
                     </div> 
                      <div class="col-md-4 mt-4">
                          <label><strong>Zip Code:</strong><span class="mand">*</span></label>
                         <input type="text" name="zipCode" id="zipCode"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="6" value="<?php echo $res_per[0]['zipCode'] ?>" readonly>
                      </div> 
                        <div class="col-md-4 mt-4">
                     <label ><strong>How you found our Office:</strong><span class="mand"></span></label>
                      <input type="text" class="form-control" id="office" name="office" value="<?php echo $res_per[0]['office'] ?>">
                      </div>  
                      
                    </div><br>
                   <div class="row">
                              <div class="col-md-4 mt-4">                         
                          <label ><strong>Payment Type:</strong><span class="mand">*</span></label><br>
                          <input type="radio" name="payment" id="insurance" value="Insurance" onchange="Jfgrouponchanplc(this.value)">&ensp;Insurance                      
                          <input type="radio" name="payment" id="groupon" value="Groupon" onchange="JFGroup(this.value)">&ensp;Groupon                      
                           <input type="radio" name="payment" id="selfpay" value="Selfpay"onchange="JFSlef(this.value)">&ensp;Selfpay
                          </div>
                    
                    </div><br>
                    <div class="row" style="display:none;" id="show_data">
                       <div class="col-md-6 mt-4">
                          <label ><strong>Vision Insurance :</strong></label>
                          <input type="text" name="insurance" id="insurance" placeholder="" class="form-control">
                      </div> 
                        <div class="col-md-6 mt-4">
                      <label ><strong>Insurance Subscribers First Name:</strong></label>
                      <input type="text" class="form-control" id="insFname" placeholder="" name="insFname" title="enter First name" >
                      </div><br>
                     <div class="col-md-6" style="margin-top: 15px;">
                      <label ><strong>Insurance Subscribers Last Name:</strong></label>
                      <input type="text" class="form-control" id="insLname" placeholder="" name="insLname" title="enter First name" >
                      </div>           
                        <div class="col-md-6" style="margin-top: 15px;">
                        <label ><strong>Insurance Subscribers DOB:</strong></label><br>
                        <input type="date" class="form-control" id="dob"name="dob" placeholder="" title="Enter the Date Of Brith ">
                      </div>
                        </div>
                        <div class="row" style="display:none;" id="show_Group">
                           <div class="col-md-6">
                            <label><strong>Group on:</strong></label>
                          <input type="text" name="grouponcode" id="grouponcode" class="form-control col-md-8 pt-4" placeholder="Enter Groupon Number">
                        </div>
                      </div>
                       <div class="row" style="display:none;" id="show_self">
                           <div class="col-md-6">
                            <label><strong>Self Pay:</strong></label>
                          <input type="text" name="selfcode" id="selfcode" class="form-control col-md-8 pt-4" placeholder="Enter Selfcode">
                        </div>
                      </div><br>
            <div class="row">         
                      <div class="col-md-12 mt-4">
                        <p><strong>Insurance Authorization:</strong> I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</p>
                      </div>
                      <div class="col-md-6 mt-4">
                        <label><strong>Signature:</strong></label>
                      <!-- <textarea name="sign_pat" id="sign_pat" class="form-control"></textarea> -->
                        <div id="signature-pad">
                          <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                            <div id="note" onmouseover="my_function();">The signature should be inside box</div>
                            <canvas id="the_canvas" width="350px" height="100px"></canvas>
                          </div>
                          <div style="margin:10px;">
                            <input type="hidden" id="hdn_signature" name="hdn_signature">
                            <button type="button" id="clear_btn" class="btn btn-danger" data-action="clear"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                            <button type="button" id="save_btn" class="btn btn-primary" data-action="save-png"><span class="glyphicon glyphicon-ok"></span> Upload Signature</button>
                          </div>
                        </div>


                        </div>                
                       <div class="col-md-6 mt-4">
                        <label><strong>Date:</strong></label>
                      <input type="date" name="date_pat" id="date_pat" class="form-control">
                        </div><br>
                        <div class="col-md-12 mt-4"><br>
                          <p><b><u>HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</u></b></p>     
                        </div>
                          <div class="col-md-12 mt-4 scroll" style="width: 100%;">
                        <p>I, <input type="text" name="represent_name" id="represent_name" style="border:none; border-bottom: 1px dashed;" > (Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.
                        (Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.
                      (Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.(Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.(Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.</p>                        
                        </div><br>
                       <div class="col-md-12 mt-4">
                          <p><b>Please check one:</b> </p>
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc1" value="pat_agree_tc1" onclick="limitCheckboxSelection(this)">&ensp;I hereby acknowledge reciept of the policy.<br>
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc2" value="pat_agree_tc2" onclick="limitCheckboxSelection(this)">&ensp;I hereby REFUSE to acknwledge reciept of the policy.I understand that even though I refuse to sign this <b>ACKNOWLEDGEMENT</b>, the provider may still provide treatment to me.
                        </div>
                        <div class="col-md-6 mt-4">
                          <label><strong>Signature:</strong></label>
                          <div id="signature-pad1">
                          <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                            <div id="note1" onmouseover="my_function1();">The signature should be inside box</div>
                            <canvas id="the_canvas1" width="350px" height="100px"></canvas>
                          </div>
                          <div style="margin:10px;">
                            <input type="hidden" id="signature" name="signature">
                            <button type="button" id="clear_btn1" class="btn btn-danger" data-action="clear1"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                            <button type="button" id="save_btn1" class="btn btn-primary" data-action="save-png1"><span class="glyphicon glyphicon-ok"></span> Upload Signature</button>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-6 mt-4">
                          <label><strong>Date:</strong></label>
                          <input type="date" name="date_pre" id="date_pre" class="form-control">
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
                   Patient Medical History
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
             <input type="date" name="checkUplDate"  id="checkUplDate" class="form-control">
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
             <input type="radio" name="allergyMedication" id="allergyMedication2" value="no" >&ensp;No<br>
             <label id="allergyMedication-error" class="error" for="allergyMedication" style="display: none;">Please Select The Field</label>
             <input type="text" name="allergyMedicationText" id="allergyMedicationText" class="form-control">
           </div>


            <div class="col-md-4"> 
             <label>Have You Had Any Surgeries? </label><br>
            <input type="radio" name="anySurgeries" id="AnySurgeries1" value="yes" >&ensp;Yes
             <input type="radio" name="anySurgeries" id="AnySurgeries2" value="no" >&ensp;No<br>
             <label id="anySurgeries-error" class="error" for="anySurgeries" style="display: none;">Please Select The Field</label>
           </div>

  </div>
  <div class="row">
      <div class="col-md-4"> 
  <label>Do you use cigarettes/tobacco,
alcohol,<br> or other substances?  </label><br>
            <input type="radio" name="asecigarettes" id="asecigarettes1" value="yes" >&ensp;Yes
             <input type="radio" name="asecigarettes" id="asecigarettes2" value="no" >&ensp;No
             <br>
             <label id="asecigarettes-error" class="error" for="asecigarettes" style="display: none;">Please Select The Field</label>
           </div>
         </div>

        <!-- General Health -->

      <div class="row">
        <strong><h4 style="text-align:center;">GENERAL HEALTH</h4></strong> 
        <table border="1" class="table table-bordered">
          <tr>
              <th>S.No</th>
              <th>Health Problem</th>
              <th>Status</th>
          </tr>
        <?php $i=1;foreach($resGeneralHealth as $key=>$value){ 
          $j=1;?>
            <tr>
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="genHealth_Id<?php echo $i;?>"><?php echo $i;?></td>
              
              <td><?php echo $value['displayFieldName'];?></td>
              
              <td>
                <input type="radio" id="genHealthStatus<?php echo $i."_".$j;?>" name="genHealthStatus<?php echo $i;?>" value="1" class="form-check-inline" onchange="cancer()">Yes &ensp;
               
                <input type="radio" id="genHealthSt
                atus<?php echo $i."_".($j+1);?>" name="genHealthStatus<?php echo $i;?>" value="0" class="form-check-inline" checked>No&ensp;
               
             <?php if($value['type']=="Yes"){
                $typevalues = explode(",",$value['typevalues']);
                ?>                
                <select id="typevalue" name="typevalue" class="form-control" style="display: none">
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
                  <label><b>Do You Currently Wear Glasses:</b><span class="mand">*</span></label><br>
                  <input type="radio" name="doYouCurrentlyWearGlasses" id="doYouCurrentlyWearGlasses1" value="Yes" >&nbsp;Yes&nbsp;
                  <input type="radio" name="doYouCurrentlyWearGlasses" id="doYouCurrentlyWearGlasses2" value="No" >&nbsp;No&nbsp;<br>
                  <label id="doYouCurrentlyWearGlasses-error" class="error" for="doYouCurrentlyWearGlasses" style="display: none;">Please Select The Field</label>
                </div>
            </div>
            
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Do You Currently Wear Contacts:</b><span class="mand">*</span></label><br>
                  <input type="radio" name="doYouCurrentlyWearContacts" id="doYouCurrentlyWearContacts1" value="Yes" onclick="show_text(this.value)">&nbsp;Yes&nbsp;
                  <input type="radio" name="doYouCurrentlyWearContacts" id="doYouCurrentlyWearContacts2" value="No" onclick="show_text(this.value)">&nbsp;No&nbsp;<br>
                  <label id="doYouCurrentlyWearContacts-error" class="error" for="doYouCurrentlyWearContacts" style="display: none;">Please Select The Field</label>
                </div>
                <div class="col-md-6" id="show_text" style="display: none;">
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
                  <input type="radio" name="satisfied_vision" id="areYousatiesfiedWithTheVision2" value="No">&nbsp;No&nbsp;<br>
                  <label id="satisfied_vision-error" class="error" for="satisfied_vision" style="display: none;">Please Select The Field</label>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Would You Prefer Clear, Or Colored Contacts?</b></label><br>
                   <input type="radio" name="wouldYouPreferClear[]" id="clear" class="form-check-inline" value="Clear">&ensp;Clear&ensp;
                   <input type="radio" name="wouldYouPreferClear[]" id="colored" class="form-check-inline" value="Colored">&ensp;Colored&ensp;
                   <input type="radio" name="wouldYouPreferClear[]" id="both" class="form-check-inline" value="Both">&ensp;Both&ensp;
                </div>                
                <div class="col-md-6">
                  <label><b>Do You Use The Computer?</b></label><br>

                <input type="radio" name="doyouUseTheComputer" id="doyouUseTheComputer1" value="Yes" onclick="show_hours(this.value)">&nbsp;Yes&nbsp;
                  <input type="radio" name="doyouUseTheComputer" id="doyouUseTheComputer2" value="No" onclick="show_hours(this.value)">&nbsp;No&nbsp;
                </div>
            </div>
               <div class="row pt-4" > 
            <div class="col-md-6" id="show_hours" style="display: none;">
                  <label><b>Approx.How Many Hours A Day Do You Use The Computer?</b></label>
                   <input type="number" name="appr_hrs_day" id="appr_hrs_day" value="" placeholder="" class="form-control">
                </div>
                <div class="col-md-6">
                  <label><b>Occupation:</b></label>
                   <textarea name="ocupation" id="ocupation" class="form-control" ></textarea>
                </div>
              </div>
              
               <div id="tool-placeholder"></div>
           <!--  form 2 -->
        <strong><h4 style="text-align:center;">OCULARS SYMPTOMS</h4></strong> 
           <table border="1" class="table table-bordered" style="margin-top:20px;">
          <tr>
              <th>S.No</th>
              <th>Symptom Name</th>
              <th>Check</th>
          </tr>
        <?php $i=1;foreach($resGeneralHealth2 as $key=>$value){ 
          $j=1;?>
            <tr>
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>"><?php echo $i;?></td>
              <td>
        <?php echo $value['displayFieldName'];?></td>
              <td>
                <input type="checkbox" id="ocularsymptoms<?php echo $i;?>" 
                name="ocularsymptoms[]" value = "<?php echo $i;?>" class="form-check-inline">
<!-- Yes &ensp; -->
<!-- <input type="checkbox" id="ocularsymptoms<?php echo $i."_".($j+1);?>" name="ocularsymptoms<?php echo $i;?>" value="0" 
class="form-check-inline">No -->
              </td>
            </tr>
        <?php $i++;$j++;} ?>
      
        </table>

                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                   Family Eye /Medical History
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
        <?php $i=1;foreach($resFamilyHistory as $key=>$value){  
          $j=1;?> 
            <tr> 
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="familyMed_Id<?php echo $i;?>"><?php echo $i;?></td> 
              <td> 
        <?php echo $value['displayFieldName'];?></td> 
              <td> 
                <?php if($value['columnId']!=10){?>
                <input type="radio" id="familyMedStatus<?php echo $i."_".$j;?>" name="familyMedStatus<?php echo $i;?>" value="1"  
                class="form-check-inline">Yes &ensp; 
                <input type="radio" id="familyMedStatus<?php echo $i."_".($j+1);?>" name="familyMedStatus<?php echo $i;?>" value="0"  
                class="form-check-inline" checked>No 
              <?php } ?>
              <?php if($value['columnId']==10){?>
                <input type="text" class="form-control" name="familyMedStatus<?php echo $i;?>">
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
      
        </table> 

                  </div>
                </div>
              </div>
            </div>
             <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingFive">
                <h4 class="panel-title">
         <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Office Policies 
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
          
      <form >
          <input type="checkbox" name="agree_tc[]" value="agree_tc1" >&ensp; I authorize and request my insurance company to pay to the eye doctor benefits otherwise payable to 
            me. I understand that my insurance carrier may pay lgss than the act1.1al bill for service. . l agree to be responsible for the payment of all services rendered on my behalf or my dependants.<br><br>
          <input type="checkbox" name="agree_tc[]" value="agree_tc2" >&ensp; I agree to all of the policies and services above. 
          <br><br>
          <div class="col-md-12 mb-4">
          <div class="row">
            <div class="col-md-6">          
              <label><strong>Signature:</strong> </label>
              <div id="signature-pad2">
                          <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                            <div id="note2" onmouseover="my_function2();">The signature should be inside box</div>
                            <canvas id="the_canvas2" width="350px" height="100px"></canvas>
                          </div>
                          <div style="margin:10px;">
                            <input type="hidden" id="sign" name="sign">
                            <button type="button" id="clear_btn2" class="btn btn-danger" data-action="clear2"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                            <button type="button" id="save_btn2" class="btn btn-primary" data-action="save-png2"><span class="glyphicon glyphicon-ok"></span> Upload Signature</button>
                          </div>
                        </div>
                      </div> 
            <div class="col-md-4">
            <label><strong>Date:</strong></label>
            <input type="date" name="date" id="date" class="form-control">
            </div>
          </div>
          </div><br><br>    
          <h6 style="margin-top:8%;padding:5px;"><b>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</b></h6>
          <div class="col-md-6">
            <label><strong>Patient's Signature:</strong></label>
            <div id="signature-pad3">
              <div style="border:solid 1px teal; width:360px;height:110px;padding:3px;position:relative;">
                <div id="note3" onmouseover="my_function3();">The signature should be inside box</div>
                <canvas id="the_canvas3" width="350px" height="100px"></canvas>
              </div>
              <div style="margin:10px;">
                <input type="hidden" id="patient_sign" name="patient_sign">
                <button type="button" id="clear_btn3" class="btn btn-danger" data-action="clear3"><span class="glyphicon glyphicon-remove"></span> Clear</button>
                <button type="button" id="save_btn3" class="btn btn-primary" data-action="save-png3"><span class="glyphicon glyphicon-ok"></span> Upload Signature</button>
              </div>
            </div>
          </div>&ensp;
          </form>
        </div>
                </div>
              </div>
            </div>
            <input type="submit" name="submit" id="eye_id" value="Save" class="btn btn-primary" style="float:right;background-color:#0BA1C2;border-color:#0BA1C2;">
            <input type="reset" name="cancel" value="Back" class="btn btn-danger" onclick="window(location='manage_details.php')" style="float:left;">
          </div>
        </div><!--- END COL -->   
      </div><!--- END ROW -->     
    </div>
  </form>
    </body>

</html>
    <!-- Signature JS Files -->
    <script type="text/javascript" src="assets/signature.js"></script>
    <script type="text/javascript" src="assets/signature1.js"></script>
    <script type="text/javascript" src="assets/signature2.js"></script>
    <script type="text/javascript" src="assets/signature3.js"></script>
    <!-- Signature JS Files End -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <!-- validate -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
     <!-- toaster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script type="text/javascript">

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

<script type="text/javascript">

  $(function() {
    //alert("hii");
  
  $("form[name='addform']").validate({    
   
       rules: {        
        towhom            : "required",
        insSubscribers    : "required",
       patientFname       : "required",       
       plasLtname         : "required",       
       gender             : { required:true },
        patDob            : "required",
       // homeph             : "required",
       // workNo             : "required",       
       cell               : "required",
       // email              : "required",
       address            : "required",
       // city               : "required",
       // state              : "required",
       zipCode            : "required",
       // insFname           : "required",
       // insLname           : "required",
       // dob                : "required",
       payment            : "required",
       //  grouponcode       : "required",
       //  insurance         : "required",
       //  office            : "required",

//         physicianName     : "required",
//         physicianCity     : "required",
//         checkUplDate      : "required",
//        currentMed         : "required",
//        allergyMedication  : "required",
//        asecigarettes      : "required",
//         anySurgeries      : "required",

//   dateOfLastEyeExam       : "required",
    doYouCurrentlyWearGlasses : "required",
    doYouCurrentlyWearContacts: "required",
//        whatKind           : "required",
//        solutionUsed       : "required",
//        satisfied_vision   : "required",
//   wouldYouPreferClear     : "required",
//    doyouUseTheComputer    : "required",
//        appr_hrs_day       : "required",
//        ocupation          : "required",
       
      
    },
    // Specify validation error messages
    messages: {         
        towhom            : "Please Select The Field",
        insSubscribers    : "Please Select Insurance Subscribers",   
       patientFname       : "Please Enter First Name",      
       plasLtname         : "Please Enter Last Name",
      // gender             : "Please Select Gender",
       patDob             : "Please Enter Date Of Birth",
       homeph             : "Please Enter Mobile Number",
       workNo             : "Please Enter Work Number",
       cell               : "Please Enter Cell Number",       
       email              : "Please Enter Email Id",
       address            : "Please Enter The Address",
       city               : "Please Enter City",
       state              : "Please Enter The State",
       zipCode            : "Please Enter ZipCode",
       insFname           : "Please Enter Insurance Subscribers First Name",
       insLname           : "Please Enter Insurance Subscribers Last Name",
       dob                : "Please Enter Date Of Birth",
       payment            : "Please Enter Payment",
       grouponcode        : "Please Enter The Field",
       insurance          : "Please Enter Insurance",
       office             : "Please Enter The Details",

       physicianName      : "Please Enter Physician Name",
       physicianCity      : "Please Enter Physician City",
       checkUplDate       : "Please Select The Date",
        currentMed        : "Please Enter The Current Medications",
       allergyMedication  : "Please Select The Field",
          asecigarettes   : "Please Select The Field",
       anySurgeries       : "Please Select The Field",

 dateOfLastEyeExam        : "Please Enter Last Eye Exam",
 doYouCurrentlyWearGlasses: "Please Select The Field",
doYouCurrentlyWearContacts: "Please Select The Field",
       whatKind           : "Please Enter The Field",
       solutionUsed       : "Please Enter The Field",
       satisfied_vision   : "Please Select The Field",
     wouldYouPreferClear  : "Please Check The Field",
    doyouUseTheComputer   : "Please Enter The Field",
       appr_hrs_day       : "Please Enter Hours",
       ocupation          : "Please Enter Ocupation",
},

    
    submitHandler: function(form) {
     
        let formdata = new FormData();
        let x = $('#addform').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'save');      
       
        $.ajax({
          type: "POST",
          url: "saveData.php",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            $('#eye_id').attr('disabled',true)
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manage_details.php";
              },1000);
            }
            else{
              $('#eye_id').attr('disabled',false);
              toastr.error(data);
            }
          }
        });
      }
  });
});

function jFyesNo(v) {
  //alert(v);
  if(v=="yes"){
    $('#patient_detailsId').show();
  }else if(v=="no"){
    $('#patient_detailsId').hide();
  } 
}


  function JfSSNchanplc(element) {
  var data = {    
    member_id1: 'Please Enter Member Id',
    ssn1: 'Please Enter Last Four of SSN',
   
  };
  var input = element.form.codeval;
  input.placeholder = data[element.id];
 
}

function Jfgrouponchanplc(element) {

  if(element=="Insurance"){
    $('#show_data').show();
     $('#show_self').hide(); 
    $('#show_Group').hide(); 
  }else{
    $('#show_data').hide();
  }

  // var data = {  
  //   insurance:'Please Enter Insurance',  
  //    groupon: 'Please Enter Groupon',
  //   selfpay: 'Please Enter Selfpay'
  // };
  //  var goinput = element.form.grouponcode;
  // goinput.placeholder = data[element.id];

  
}

function JFGroup(B) {

 if (B == "Groupon") {
    $('#show_Group').show();
    $('#show_data').hide(); 
    $('#show_self').hide(); 
  } else {
    $('#show_Group').hide();
  }
}


function JFSlef(V) {
  if(V =="Selfpay"){
    $('#show_self').show();
    $('#show_data').hide(); 
    $('#show_Group').hide(); 
  } else {
    $('#show_self').hide();
  }
}


$( document ).ready(function() {
   cancer();
});

$('input[name="genHealthStatus5"]').on('change', function(e) {
  cancer();
});

function cancer() {
    var x =$('input[name="genHealthStatus5"]:checked').val();
     if(x != "0"){
       $('#typevalue').show();
     }else{
       $('#typevalue').hide();
     }
   }
//Signature

var wrapper = document.getElementById("signature-pad");
var clearButton = wrapper.querySelector("[data-action=clear]");
var savePNGButton = wrapper.querySelector("[data-action=save-png]");
var canvas = wrapper.querySelector("canvas");
var el_note = document.getElementById("note");
var signaturePad;
signaturePad = new SignaturePad(canvas);

clearButton.addEventListener("click", function (event) {
  document.getElementById("note").innerHTML="The signature should be inside box";
  signaturePad.clear();
});
savePNGButton.addEventListener("click", function (event){
  if (signaturePad.isEmpty()){
    alert("Please provide signature first.");
    event.preventDefault();
  }else{
    var canvas  = document.getElementById("the_canvas");
    var dataUrl = canvas.toDataURL();
    document.getElementById("hdn_signature").value = dataUrl;
    //console.log(dataUrl)
  }
});
function my_function(){
  document.getElementById("note").innerHTML="";
}

//Signature1

var wrapper1 = document.getElementById("signature-pad1");
var clearButton1 = wrapper1.querySelector("[data-action=clear1]");
var savePNGButton1 = wrapper1.querySelector("[data-action=save-png1]");
var canvas1 = wrapper1.querySelector("canvas");
var el_note1 = document.getElementById("note1");
var signaturePad1;
signaturePad1 = new SignaturePad1(canvas1);

clearButton1.addEventListener("click", function (event) {
  document.getElementById("note1").innerHTML="The signature should be inside box";
  signaturePad1.clear();
});
savePNGButton1.addEventListener("click", function (event){
  if (signaturePad1.isEmpty()){
    alert("Please provide signature first.");
    event.preventDefault();
  }else{
    var canvas1  = document.getElementById("the_canvas1");
    var dataUrl1 = canvas1.toDataURL();
    document.getElementById("signature").value = dataUrl1;
    //console.log(dataUrl)
  }
});
function my_function1(){
  document.getElementById("note1").innerHTML="";
}

//Signature2

var wrapper2 = document.getElementById("signature-pad2");
var clearButton2 = wrapper2.querySelector("[data-action=clear2]");
var savePNGButton2 = wrapper2.querySelector("[data-action=save-png2]");
var canvas2 = wrapper2.querySelector("canvas");
var el_note2 = document.getElementById("note2");
var signaturePad2;
signaturePad2 = new SignaturePad2(canvas2);

clearButton2.addEventListener("click", function (event) {
  document.getElementById("note2").innerHTML="The signature should be inside box";
  signaturePad2.clear();
});
savePNGButton2.addEventListener("click", function (event){
  if (signaturePad2.isEmpty()){
    alert("Please provide signature first.");
    event.preventDefault();
  }else{
    var canvas2  = document.getElementById("the_canvas2");
    var dataUrl2 = canvas2.toDataURL();
    document.getElementById("sign").value = dataUrl2;
    //console.log(dataUrl)
  }
});
function my_function2(){
  document.getElementById("note2").innerHTML="";
}

//Signature3

var wrapper3 = document.getElementById("signature-pad3");
var clearButton3 = wrapper3.querySelector("[data-action=clear3]");
var savePNGButton3 = wrapper3.querySelector("[data-action=save-png3]");
var canvas3 = wrapper3.querySelector("canvas");
var el_note3 = document.getElementById("note3");
var signaturePad3;
signaturePad3 = new SignaturePad3(canvas3);

clearButton3.addEventListener("click", function (event) {
  document.getElementById("note3").innerHTML="The signature should be inside box";
  signaturePad3.clear();
});
savePNGButton3.addEventListener("click", function (event){
  if (signaturePad3.isEmpty()){
    alert("Please provide signature first.");
    event.preventDefault();
  }else{
    var canvas3  = document.getElementById("the_canvas3");
    var dataUrl3 = canvas3.toDataURL();
    document.getElementById("patient_sign").value = dataUrl3;
    //console.log(dataUrl)
  }
});
function my_function3(){
  document.getElementById("note3").innerHTML="";
}

function show_text(a){
  if(a=="Yes"){
    $('#show_text').show();
  }else if(a=="No"){
    $('#show_text').hide();
  }
}

function show_hours(b){
  if(b=="Yes"){
    $('#show_hours').show();
  }else if(b=="No"){
    $('#show_hours').hide();
  }
}


function limitCheckboxSelection(checkbox) {
    var checkboxes = document.getElementsByName("pat_agree_tc[]");

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] !== checkbox) {
            checkboxes[i].checked = false;
        }
    }
}


</script>   