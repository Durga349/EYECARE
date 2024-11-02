<?php
include("crudop/crud.php");
$crud = new Crud();

$todate = date('Y-m-d');


$patient_no = $_GET['patient_no'];

// $pid = $_GET['patient_Id'];


 //----------Personal Information---------

$sel_per = "select c.city_name,s.state_name,pi.id, pi.patient_Id, pi.toWhom, pi.patient_ssn, pi.patient_number, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name,pi.selfcode, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId, rd.id from personal_information pi LEFT JOIN relations_details rd on pi.toWhom = rd.id left join states as s on s.id=pi.state left join cities as c on c.state_id =pi.city where patient_number = '".$patient_no."' ";
$res_per = $crud->getData($sel_per);
$per_info_JSON = json_encode($res_per);
$table1_JSON = 'personal_information';


//veiw personal information--
$view_sel_per = "SELECT pi.id,rd.towhom, pi.patient_Id, pi.patient_number, pi.patient_ssn, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId FROM `personal_information` pi left join relations_details rd on pi.toWhom = rd.id WHERE patient_number = '".$patient_no."'";
$view_res_per = $crud->getData($view_sel_per);

$View_Person_Json = json_encode($view_res_per);
$table2_JSON = 'personal_information';

 //Patient Medical History

 $sel_genhealth="SELECT gh.columnId,gh.genHealthStatus, gh.displayFieldName,gh.typevalues,gh.type,ph.typevalue,ph.genHealthStatus,ph.genHealth_Id, ph.physicianName,ph.checkUplDate,ph.physicianCity,ph.currentMed,ph.allergyMedication,ph.allergyMedicationText,ph.anySurgeries,ph.asecigarettes, ph.randomId FROM `generalhealth` AS gh LEFT JOIN patient_medical_history AS ph ON gh.columnId=ph.genHealth_Id WHERE gh.columnId=ph.genHealth_Id AND ph.patient_number = '".$patient_no."'";
// exit;
 $res_med =$crud->getData($sel_genhealth);

 $Patient_medical_json = json_encode($res_med);
$table3_JSON = 'generalhealth';

 //Patient Eye History

// $sel_pateye = "SELECT peh.*, oc.* FROM `patient_eye_history` peh left JOIN ocularsymptoms oc on peh.ocularsymptoms = oc.columnId where codeval = '".$codeval."'";
//Patient Eye History
  $sel_pateye ="SELECT oc.columnId,peh.id,oc.displayFieldName,oc.priority,oc.dispStatus,oc.type,oc.typevalues,peh.ocularsymptoms,peh.dateOfLastEyeExam,peh.doYouCurrentlyWearGlasses,peh.doYouCurrentlyWearContacts,peh.whatKind,peh.solutionUsed,peh.satisfied_vision,peh.wouldYouPreferClear,peh.doyouUseTheComputer,peh.appr_hrs_day,peh.ocupation,peh.codeval,peh.randomId FROM `ocularsymptoms` AS oc LEFT JOIN patient_eye_history AS peh ON oc.columnId=peh.ocularsymptoms WHERE oc.columnId=peh.ocularsymptoms AND peh.patient_number = '".$patient_no."' ";
 
 $res_pateye = $crud->getData($sel_pateye);

  $patient_eye_json = json_encode($res_pateye);
$table4_JSON = 'patient_eye_history';

// Family Eye History

$sel_family="SELECT fh.columnId,fh.familyMedStatus,fh.displayFieldName,feh.familyMedStatus,fh.whom as whome,feh.whom, feh.randomId FROM familyhistory AS fh LEFT JOIN family_eye_history AS feh ON fh.columnId=feh.familyMed_Id WHERE fh.columnId=feh.familyMed_Id AND  feh.patient_number = '".$patient_no."'";

 $res_family =$crud->getData($sel_family);

$family_eye_json = json_encode($res_family);
$table5_JSON = 'familyhistory';

 //OFFICE DETAILS

  $sel_offc = "select * from office_details where patient_number = '".$patient_no."'";
 //exit;
 $res_offc = $crud->getData($sel_offc);

 $office_json = json_encode($res_offc);
 $table6_JSON = 'office_details';

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

	$cities= "select * from cities order by id desc"; 
    $cities_data=$crud->getData($cities); 
  //print_r($cities_data); 


  $states="select * from states order by id asc"; 
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>

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
.mand{
  color: red;
  font-size: 25px;
}.scroll {
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
   <?php if ($_REQUEST['type'] == 'edit') { ?>    

    <form method="post" name="addform" id="addform" enctype="multipart/form-data"  autocomplete="off">
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
            <div class="col-12">
            <h3 style="margin-left:60px;margin-bottom:-35px;">Name : <?php echo $res_per[0]['patientFname'] ?><?php echo $res_per[0]['plasLtname']?></h3>
            <h3 style="margin-left:85%; margin-top:10px;color:#0BA1C2;"><b>Edit</b></h3>
          </div>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <!-- <div class="row"> -->
                  <!-- <div class="col-md-6"> -->
                    <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">      
                  Edit Patient Details          
                  </a> 
                  </h4>
                </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body" id="patient_detailsId">
                  <div class="card-body">

                    <div class="row">
                     <!--  <div class="col-md-4 mt-4">
                          <label ><strong>To Whom:</strong><span class="mand">*</span></label>
                           <select name="towhom" id="towhom" class="form-control">
                          <option value="">--Select--</option>
                         <?php 
                         foreach ($relations_data as $key => $value) { ?> 
                          <option value="<?php echo $value['id'] ?>"<?php if($value['id'] == $res_per[0]['toWhom']){ echo "selected";} ?>><?php echo $value['towhom'] ?></option>

                         <?php } ?>                      
                         </select>
                      </div> -->

                      <div class="col-md-4 mt-4">
                          <label><strong>Patient Number:</strong><span class="mand">*</span></label>
                          <input type="text" name="patient_number" id="patient_number" class="form-control" placeholder="" value="<?php echo $res_per[0]['patient_number'] ?>" readonly>                                  
                         
                      </div> 
                      <div class="col-md-4 mt-4">
                          <label><strong>Patient SSN No:</strong><span class="mand"></span></label>
                          <input type="text" name="patient_ssn" id="patient_ssn" class="form-control" placeholder="Enter Patient SSN" value="<?php echo $res_per[0]['patient_ssn']; ?>" readonly>                                  
                         
                      </div> 
                        <div class="col-md-4 mt-4">              
                           <label ><strong>First Name:</strong><span class="mand">*</span></label>
                          <input type="text" class="form-control" id="patientFname" placeholder="" name="patientFname" title="enter First name" value="<?php echo $res_per[0]['patientFname'] ?>">
                      </div>
                                            
                      
                    </div><br>

                    <div class="row">
                    
                      <div class="col-md-4 mt-4">
                          <label ><strong>Last Name:</strong><span class="mand">*</span></label>
                          <input type="text" class="form-control" id="plasLtname" placeholder="" name="plasLtname" title="enter Last Name" value="<?php echo $res_per[0]['plasLtname'] ?>">
                      </div>
                      <div class="col-md-4 mt-4">
                          <label ><strong>Gender:</strong><span class="mand">*</span></label><br>
                           
                         <input type="radio" name="gender" class="gender" id="gender1" value="Male"  <?php if($res_per[0]['gender']=="Male"){echo "checked";}?> >&ensp;Male
                         <input type="radio" name="gender" class="gender" id="gender2" value="Female"  <?php if($res_per[0]['gender']=="Female"){echo "checked";}?> >&ensp;Female
                         <div id="dis"></div>
                        <br />
                        <span id="spnError" class="error" style="display: none">Please select a Fruit.</span>
                      </div>
                      <div class="col-md-4 mt-4">
                           <label ><strong>DOB:</strong><span class="mand">*</span></label><br>
                          <input type="date" class="form-control" id="patDob"name="patDob" placeholder="" title="Enter the Date Of Brith" value="<?php echo $res_per[0]['patDob'] ?>">
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-2">
                           <label><strong>Home Phone:</strong><span class="mand"></span></label>
                            <input type="text" name="homeph" id="homeph"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $res_per[0]['homeph'] ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                          <label><strong>Work:</strong><span class="mand"></span></label>
                         <input type="text" name="workNo" id="workNo"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $res_per[0]['workNo'] ?>">
                        </div>
                       <div class="col-md-4 mt-2">
                          <label><strong>Mobile No:</strong><span class="mand">*</span></label>
                          <input type="text" name="cell" id="cell"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="10" value="<?php echo $res_per[0]['cell'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">   
                      <div class="col-md-4 mt-2">
                          <label><strong>Email</strong><span style="color:blue;font-size: 14px;" class="mand">&nbsp;(Please print each alphabet seperate & legibly):</span></label>                     
                          <input type="email" name="email" id="email" class="form-control" value="<?php echo $res_per[0]['email'] ?>">
                      </div> 
                      <div class="col-md-4 mt-4">
                          <label ><strong>Address:</strong><span class="mand">*</span></label>
                           <textarea class="form-control" class="address" id="address" name="address" placeholder="" rows="1"><?php echo $res_per[0]['address'] ?></textarea>
                      </div> 
                       <div class="col-md-4 mt-4">
                          <label><strong>State:</strong><span class="mand"></span></label>
                             <select class="form-control" id="state" name="state" onchange="stateType(this.value)">
                               <option value="">--Select--</option>
                               <?php foreach ($states_data as $key => $value) {?>
                                <option value="<?php echo $value['id']; ?>"<?php if($res_per[0]['state']== $value['id']){ echo "selected='selected'";} ?>><?php echo $value['state_name']; ?></option> 
                                  <?php    } ?>
                            </select>
                      </div> 
                     
                    </div><br>
                    <div class="row mb-4">
                       <div class="col-md-4 mt-4">
                           <label><strong>City:</strong><span class="mand"></span></label>
                           <select class="form-control" id="city" name="city" >
                             <option value="">--Select--</option>
                           <?php foreach ($cities_data as $key => $value) {?>
                              <option value=" <?php echo $value['city_name']; ?>" <?php if($res_per[0]['city']== $value['id']){ echo "selected='selected'";} ?>><?php echo $value['city_name']; ?></option>
                           <?php   } ?> 
                             </select>
                      </div>
                     
                      <div class="col-md-4 mt-4">
                          <label><strong>Zip Code:</strong><span class="mand">*</span></label>
                         <input type="text" name="zipCode" id="zipCode"  class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="6" value=<?php echo $res_per[0]['zipCode']; ?>>
                      </div>
                      <div class="col-md-4 mt-4">
                       <label ><strong>How you found our Office:</strong><span class="mand"></span></label>
                        <input type="text" class="form-control" id="office" placeholder="" name="office" value=<?php echo $res_per[0]['office']; ?>>
                      </div> 
                    </div><br>
                     <div class="row">
                              <div class="col-md-4 mt-4">                         
                          <label ><strong>Payment Type:</strong></label><br>
                          <input type="radio" name="payment" id="insurance" value="Insurance"<?php if($res_per[0]['payment']=="Insurance"){echo "checked";}?> onchange="Jfgrouponchanplc(this.value)">&ensp;Insurance                      
                          <input type="radio" name="payment" id="groupon" value="Groupon"<?php if($res_per[0]['payment']=="Groupon"){echo "checked";}?> onchange="JFGroup(this.value)">&ensp;Groupon                      
                           <input type="radio" name="payment" id="selfpay" value="Selfpay"<?php if($res_per[0]['payment']=="Selfpay"){echo "checked";}?> onchange="JFSlef(this.value)">&ensp;Selfpay
                          </div>
                    
                    </div><br>
                    <div class="row" style="display:none;" id="show_data">
                       <div class="col-md-6 mt-4">
                          <label ><strong>Vision Insurance :</strong></label>
                          <input type="text" name="insurance" id="insurance" placeholder="" class="form-control" value="<?php echo $res_per[0]['insurance'];?>">
                      </div> 
                        <div class="col-md-6 mt-4">
                      <label ><strong>Insurance Subscribers First Name:</strong></label>
                      <input type="text" class="form-control" id="insFname" placeholder="" name="insFname" title="enter First name" value="<?php echo $res_per[0]['insFname'];?>">
                      </div><br>
                     <div class="col-md-6" style="margin-top: 15px;">
                      <label ><strong>Insurance Subscribers Last Name:</strong></label>
                      <input type="text" class="form-control" id="insLname" placeholder="" name="insLname" title="enter First name" value="<?php echo $res_per[0]['insLname'];?>">
                      </div> 
                      <div class="col-md-6 mt-4">
                          <label><strong>Insurance Subscribers :</strong><span class="mand">*</span></label>
                          <input type="radio" name="insSubscribers" id="member_id1" value="MemberId" <?php if($res_per[0]['insSubscribers']=="MemberId"){echo "checked";}?>  onchange="JfSSNchanplc(this)">&nbsp;Member Id&nbsp;
                          <input type="radio" name="insSubscribers" id="ssn1" value="SSN" <?php if($res_per[0]['insSubscribers']=="SSN"){echo "checked";}?> onchange="JfSSNchanplc(this)">&nbsp;SSN

                          <input type="text" id="codeval" name="codeval" class="form-control col-md-8 pt-4" placeholder="Please Enter Member Id" value="<?php echo $res_per[0]['codeval'] ?>">                  
                      </div>          
                        <div class="col-md-6" style="margin-top: 15px;">
                        <label ><strong>Insurance Subscribers DOB:</strong></label><br>
                        <input type="date" class="form-control" id="dob"name="dob" placeholder="" title="Enter the Date Of Brith" value="<?php echo $res_per[0]['dob'];?>">
                      </div>
                        </div>
                        <div class="row" style="display:none;" id="show_Group">
                           <div class="col-md-6">
                            <label><strong>Group on:</strong></label>
                          <input type="text" name="grouponcode" id="grouponcode" class="form-control col-md-8 pt-4" placeholder="Enter Groupon Number" value="<?php echo $res_per[0]['grouponcode'];?>">
                        </div>
                      </div>
                       <div class="row" style="display:none;" id="show_self">
                           <div class="col-md-6">
                            <label><strong>Self Pay:</strong></label>
                          <input type="text" name="selfcode" id="selfcode" class="form-control col-md-8 pt-4" placeholder="Enter Selfcode" value="<?php echo $res_per[0]['selfcode'];?>">
                        </div>
                      </div><br>
                    
               <div class="row">
            <div class="col-md-12 mt-4">
                        <p><strong>Insurance Authorization:</strong> I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</p>
                      </div>
                      <div class="col-md-6 mt-4">
                        <label><strong>Signature:</strong></label>
                        
                        <input type="hidden" id="edit_extimage" name="edit_extimage" class="form-control" value="<?php echo $res_per[0]['sign'];?>">
                        
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
                        
                        <img src="<?php echo $res_per[0]['sign'];?>" width="100px;" height="100px;">

                      </div>                
                       <div class="col-md-6 mt-4">
                        <label><strong>Date:</strong></label>
                      <input type="date" name="date_pat" id="date_pat" class="form-control" value="<?php echo $todate; ?>">
                       <input type="hidden" name="hidden_date" id="hidden_date" class="form-control" value="<?php echo $res_per[0]['date'] ?>"> 
                       <input type="hidden" name="hid_patient_id" id="hid_patient_id" class="form-control" value="<?php echo $res_per[0]['patient_Id']; ?>">                    

                        </div><br>
                        <div class="col-md-12 mt-4" ><br>
                          <p><b><u>HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</u></b></p>     
                        </div>
                         <div class="col-md-12 mt-4 scroll" style="width: 100%; height: 500px;">
                        <p>I, <input type="text" name="represent_name" id="represent_name" style="border:none; border-bottom: 1px dashed;" 
                          value="<?php echo $res_per[0]['represent_name'];?>"><br><br>
                          <iframe src="HIPAA Law.pdf#toolbar=0" width="100%" height="500px"></iframe>
                        </p>                        
                        </div><br>
                        <br>
                         <?php
                         
                         $agreement = $res_per[0]['pat_agree_tc'];
                          $pat_agree = explode(',', $agreement);
                           // print_r($pat_agree);
                            ?>
                        <div class="col-md-12 mt-4">
                          <p>Please check one: </p>                        
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc1" value="pat_agree_tc1"<?php if($pat_agree[0]=='pat_agree_tc1'){echo "checked";}?>>&ensp;I hereby acknowledge reciept of the policy.<br>
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc2" value="pat_agree_tc2"<?php if($pat_agree[0] =='pat_agree_tc2'){echo "checked";} ?>>&ensp;I hereby REFUSE to acknwledge reciept of the policy.I understand that even though I refuse to sign this <b>ACKNOWLEDGEMENT</b>, the provider may still provide treatment to me.
                        </div>
                        <div class="col-md-6 mt-4">
                          <label><strong>Signature:</strong></label>
                          
                          <input type="hidden" id="edit_extimage1" name="edit_extimage1" class="form-control" value="<?php echo $res_per[0]['signature'];?>">
                        
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

                        <img src="<?php echo $res_per[0]['signature'];?>" width="100px;" height="100px;">
                        </div>
                        <div class="col-md-6 mt-4">
                          <label><strong>Date:</strong></label>
                          <input type="date" name="date_pre" id="date_pre" class="form-control" value="<?php echo $todate; ?>">
                           <!-- <input type="hidden" name="hidden_date" id="hidden_date" class="form-control" value="<?php echo $res_per[0]['datePre'];?>" > -->
                        </div>
                        <input type="hidden" name="hid_mast_id" id="hid_mast_id" class="form-control" value="<?php echo $res_mast[0]['randomId']; ?>">        
              <input type="hidden" name="hid_pet_id" id="hid_pet_id" class="form-control" value="<?php echo $res_per[0]['randomId']; ?>"> 
              
              <input type="hidden" name="hid_pe_id" id="hid_pe_id" class="form-control" value="<?php echo $patient_no; ?>">
                <input type="hidden" name="hid_codeval" id="hid_codeval" class="form-control" value="<?php echo $codeval; ?>">
              
              </div>
              
    
          </div>
            </div>
              </div>
                </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                   Edit Patient Medical History
                    
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
            <div class="row">
            <div class="col-md-4"> 
             <label>Name of Primary Care Physician</label>
             <input type="text" name="physicianName" id="physicianName" class="form-control" value="<?php echo $res_med[0]['physicianName'] ?>">
           </div>

            <div class="col-md-4"> 
             <label>City </label>
             <input type="text" name="physicianCity" id="physicianCity" class="form-control" value="<?php echo $res_med[0]['physicianCity'] ?>">
           </div>

            <div class="col-md-4"> 
             <label>Last Date of Check Up</label>
             <input type="text" name="checkUplDate"  id="checkUplDate" class="form-control" value="<?php echo $res_med[0]['checkUplDate'] ?>">
           </div>
             </div>
             <br>

          <div class="row">
            <div class="col-md-4 pt-5"> 
             <label>Current Medications</label>
             <textarea name="currentMed"  id="currentMed" class="form-control"><?php echo $res_med[0]['currentMed'] ?></textarea>
           </div>

            <div class="col-md-4 pt-5"> 
             <label>Any Allergies to Medication? </label><br>
            <input type="radio" name="allergyMedication" id="allergyMedication1" value="yes" <?php if($res_med[0]['allergyMedication']=="yes"){echo "checked";}?>>&ensp;Yes
             <input type="radio" name="allergyMedication" id="allergyMedication2" value="no"<?php if($res_med[0]['allergyMedication']=="no"){echo "checked";}?>  >&ensp;No
             <input type="text" name="allergyMedicationText" id="allergyMedicationText" class="form-control" value="<?php echo $res_med[0]['allergyMedicationText'] ?>">
           </div>


            <div class="col-md-4 pt-5"> 
             <label>Have You Had Any Surgeries? </label><br>
            <input type="radio" name="anySurgeries" id="AnySurgeries1" value="yes" <?php if($res_med[0]['anySurgeries']=="yes"){echo "checked";}?> >&ensp;Yes
             <input type="radio" name="anySurgeries" id="AnySurgeries2" value="no" <?php if($res_med[0]['anySurgeries']=="no"){echo "checked";}?>>&ensp;No
           </div>

  </div>
  <br>
  <div class="row">
      <div class="col-md-4 pt-5"> 
  <label>Do you use cigarettes/tobacco,
alcohol,<br> or other substances?</label><br>
            <input type="radio" name="asecigarettes" id="asecigarettes1" value="yes" <?php if($res_med[0]['asecigarettes']=="yes"){echo "checked";}?>>&ensp;Yes
             <input type="radio" name="asecigarettes" id="asecigarettes2" value="no" <?php if($res_med[0]['asecigarettes']=="no"){echo "checked";}?>>&ensp;No
           </div>
         </div>

        <!-- General Health -->
 <br>
      <div class="row">
    <strong><h4 style="text-align:center;">GENERAL HEALTH</h4></strong> 
        <table border="1" class="table table-bordered">
          <tr>
              <th>S.No</th>
              <th>Health Problem</th>
              <th>Status</th>
          </tr>
       <?php $i=1;foreach($res_med as $key=>$value){ 
          $j=1;?>
            <tr>
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="genHealth_Id<?php echo $i;?>"><?php echo $i;?></td>
              <td><?php echo $value['displayFieldName'];?>
              </td>   
              <td>
        <input type="radio" id="genHealthStatus<?php echo $i."_".$j;?>" name="genHealthStatus<?php echo $i;?>" value="1" <?php if($value['genHealthStatus']=="1"){echo "checked";}?> class="form-group" onchange="cancer()">Yes &ensp;
         <input type="radio" id="genHealthStatus<?php echo $i."_".($j+1);?>" name="genHealthStatus<?php echo $i;?>" value="0"<?php if($value['genHealthStatus']=="0"){echo "checked";}?> class="form-group">No&ensp;
         		
         		<input type="hidden" name="hid_gena_hel_id<?php echo $i;?>" id="hid_gena_hel_id" class="form-control" value="<?php echo $value['randomId']; ?>">

                <?php if($value['type']=="Yes"){
                $typevalues = explode(",",$value['typevalues']);
                ?>
                <select id="typevalue" name="typevalue" class="form-control" style="display: none">
                  <option value="">--Select--</option>
                  <?php foreach ($typevalues as $key => $value): 

                    ?>
                    <option value="<?php echo $value;?>"<?php if($res_med[4]['typevalue'] == $value){echo "selected='selected'";}?>>
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
                     Edit Patient Eye History
                     <!--  <span style="float:right;">
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

                <div class="row">
                <div class="col-md-6">
                  <label><b>Date Of Last Eye Exam:</b></label>  
                  <input type="date" name="dateOfLastEyeExam" id="dateOfLastEyeExam" class="form-control" placeholder="" value="<?php echo $res_pateye[0]['dateOfLastEyeExam'] ?>" >
                </div>
                
              <div class="col-md-6">
                  <label><b>Do You Currently Wear Glasses:</b><span class="mand">*</span></label><br>
                  <input type="radio" name="doYouCurrentlyWearGlasses" id="doYouCurrentlyWearGlasses1" value="Yes" <?php if($res_pateye[0]['doYouCurrentlyWearGlasses']=="Yes"){echo "checked";}?>>&nbsp;Yes&nbsp;
                  <input type="radio" name="doYouCurrentlyWearGlasses" id="doYouCurrentlyWearGlasses2" value="No" <?php if($res_pateye[0]['doYouCurrentlyWearGlasses']=="No"){echo "checked";}?>>&nbsp;No&nbsp;

                </div>
            </div>
            <br>
            
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Do You Currently Wear Contacts:</b><span class="mand">*</span></label><br>
                  <input type="radio" name="doYouCurrentlyWearContacts" id="doYouCurrentlyWearContacts1" value="Yes" <?php if($res_pateye[0]['doYouCurrentlyWearContacts']=="Yes"){echo "checked";}?> onclick="show_text(this.value)">&nbsp;Yes&nbsp;
                  <input type="radio" name="doYouCurrentlyWearContacts" id="doYouCurrentlyWearContacts2" value="No" <?php if($res_pateye[0]['doYouCurrentlyWearContacts']=="No"){echo "checked";}?> onclick="show_text(this.value)">&nbsp;No&nbsp;
                </div>
                <div class="col-md-6" style="display: none;" id="show_text">
                  <label><b>What kind?</b></label>
                  <input type name="whatKind" id="whatKind" class="form-control" placeholder="" value="<?php echo $res_pateye[0]['whatKind'] ?>">
                </div> 
            </div>
            <br>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Solution Used?</b></label>
                  <input type name="solutionUsed" id="solutionUsed" class="form-control" placeholder="" value="<?php echo $res_pateye[0]['solutionUsed'] ?>">
                </div>
                
            <div class="col-md-6">
                  <label><b>Are You Satiesfied With The Vision , And Comfort Of Your Contact Lenses?</b></label>
                   <input type="radio" name="satisfied_vision" id="areYousatiesfiedWithTheVision1" value="Yes"  <?php if($res_pateye[0]['satisfied_vision']=="Yes"){echo "checked";}?>>&nbsp;Yes&nbsp;
                  <input type="radio" name="satisfied_vision" id="areYousatiesfiedWithTheVision2" value="No"  <?php if($res_pateye[0]['satisfied_vision']=="No"){echo "checked";}?>>&nbsp;No&nbsp;
                  <input type="radio" name="satisfied_vision" id="areYousatiesfiedWithTheVision3" value="not_applicable"  <?php if($res_pateye[0]['satisfied_vision']=="not_applicable"){echo "checked";}?>>&nbsp;Not Applicable&nbsp;
                </div>
            </div>
            <br>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Would You Prefer Clear, Or Colored Contacts?</b></label><br>
                   <input type="radio" name="wouldYouPreferClear" id="clear" class="form-check-inline" value="Clear" <?php if($res_pateye[0]['wouldYouPreferClear']=="Clear"){echo "checked";} ?> >&ensp;Clear&ensp;
                   <input type="radio" name="wouldYouPreferClear" id="colored" class="form-check-inline" value="Colored" <?php if($res_pateye[0]['wouldYouPreferClear']=="Colored"){echo "checked";} ?>>&ensp;Colored&ensp;
                   <input type="radio" name="wouldYouPreferClear" id="both" class="form-check-inline" value="Both" <?php if($res_pateye[0]['wouldYouPreferClear']=="Both"){echo "checked";} ?>>&ensp;Both&ensp;
                </div>                
                <div class="col-md-6">
                  <label><b>Do You Use The Computer?</b></label><br>

                <input type="radio" name="doyouUseTheComputer" id="doyouUseTheComputer1" value="Yes" <?php if($res_pateye[0]['doyouUseTheComputer']=="Yes"){echo "checked";}?> onclick="show_hours(this.value)">&nbsp;Yes&nbsp;
                  <input type="radio" name="doyouUseTheComputer" id="doyouUseTheComputer2" value="No" <?php if($res_pateye[0]['doyouUseTheComputer']=="No"){echo "checked";}?> onclick="show_hours(this.value)">&nbsp;No&nbsp;
                </div>
            </div>
            <br>
               <div class="row pt-4"> 
            <div class="col-md-6" style="display: none;" id="show_hours">
                  <label><b>Approx.How Many Hours A Day Do You Use The Computer?</b></label>
                   <input type="text" name="appr_hrs_day" id="appr_hrs_day" class="form-control" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" oninput="this.value = !!this.value &amp;&amp; Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" maxlength="3" value="<?php echo $res_pateye[0]['appr_hrs_day'] ?>">
                </div>
                <div class="col-md-6">
                  <label><b>Occupation:</b></label>
                   <textarea name="ocupation" id="ocupation" class="form-control" ><?php echo $res_pateye[0]['ocupation'] ?></textarea>
                </div>
              </div>
               <?php $i=0; foreach($res_pateye as $value) {?>
              <input type="hidden" name="hid_pat_eye_his_id<?php echo $i;?>" id="hid_pat_eye_his_id" class="form-control" value="<?php echo $value['randomId']; ?>">
              <?php $i++;} ?>
               <div id="tool-placeholder"></div>
           
           <!--  form 2 -->
          <strong><h4 style="text-align:center;">OCULAR SYMPTOMS</h4></strong> 
           <table border="1" class="table table-bordered" style="margin-top: 30px;">
          <tr>
              <th>S.No</th>
              <th>Symptom Name</th>
              <th>Check</th>
          </tr>
        <?php $j=0; $i=1;foreach($resGeneralHealth2 as $key=>$value){ 
          
          //echo $res_pateye[$j]['ocularsymptoms'];
           
          	$selgeteye = "select * from patient_eye_history where patient_number ='".$patient_no."' and ocularsymptoms='".$value['columnId']."'";
	        $result = $crud->getData($selgeteye);
          
          ?>
            <tr>
              <input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>">
              <td>
                 <?php echo $i;?></td>                               
              <td>
        <?php echo $value['displayFieldName'];?></td>
              <td>
                
                <?php 
               
                

                      if( $result[0]['ocularsymptoms'] == $value['columnId']){
                      
                 
                ?>
                <input type="checkbox" id="ocularsymptoms<?php echo $i;?>" 
                name="ocularsymptoms[]" value = "<?php echo $i;?>"<?php echo "checked"; ?> class="form-check-inline">
              <?php }else{?>
                <input type="checkbox" id="ocularsymptoms<?php echo $i;?>" 
                name="ocularsymptoms[]" value = "<?php echo $i;?>" class="form-check-inline">
                    <?php }?>
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
                  Edit Family Eye /Medical History
                  
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
        <?php $i=1; $j=0; foreach($res_family as $key=>$value){  
          ?> 

          <input type="hidden" name="hid_fam_eye_his_id<?php echo $i;?>" id="hid_fam_eye_his_id" class="form-control" value="<?php echo $value['randomId']; ?>">
            <tr> 
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="familyMed_Id<?php echo $i;?>"><?php echo $i;?></td> 
              <td> 
        <?php echo $value['displayFieldName'];?></td> 
        		
              <td> 
                <?php if($value['columnId']!=10){?>
                <input type="radio" id="familyMedStatus<?php echo $i."_".$j;?>" name="familyMedStatus<?php echo $i;?>" value="1" <?php if($value['familyMedStatus']=="1"){echo "checked";}?> class="form-group">Yes &ensp; 
                <input type="radio" id="familyMedStatus<?php echo $i."_".($j+1);?>" name="familyMedStatus<?php echo $i;?>" value="0" <?php if($value['familyMedStatus']=="0"){echo "checked";}?> class="form-group">No 
              <?php } ?>
              <?php if($value['columnId']==10){?>
                 <input type="text" class="form-control" name="familyMedStatus<?php echo $i;?>">
                <!-- <input type="text" class="form-control" name="familyMedStatus<?php echo $i;?>" value="<?php echo $res_family[$j]['familyMedStatus']?>"> -->
              <?php } ?>

              </td> 
              <td>
           <?php 
               $typevalues = explode(",",$value['whome']);
                 //echo $res_family[$i]['whom'];
            ?>
            
            <select id="whom<?php echo $i;?>" name="whom<?php echo $i;?>" class="form-control">
            <option value="">--Select--</option>
            <?php foreach ($typevalues as $key => $value): 
            
                  //  $check = '';
                  // foreach ($res_family as $key => $fameye) {
                  //   echo $fameye['whom'];
                  //     if($fameye['whom'] == $value){
                  //       $check = "checked";
                  //     }
                  // }
              ?>
      <option value="<?php echo $value;?>"<?php if($res_family[$j]['whom'] == $value){echo "selected";} ?>>
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
                   Edit Office Policies 
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
         
          
          <input type="checkbox" name="agree_tc[]" id ="agree_tc1" value="agree_tc1"<?php if($agree[0] == "agree_tc1"){echo "checked";} ?>>&ensp; I authorize and request my insurance company to pay to the eye doctor benefits otherwise payable to 
            me. I understand that my insurance carrier may pay lgss than the act1.1al bill for service. I agree to be responsible for the payment of all services rendered on my behalf or my dependants.<br><br>
          <input type="checkbox" name="agree_tc[]" id="agree_tc2" value="agree_tc2"<?php if($agree[1] == "agree_tc2"){echo "checked";} ?> >&ensp; I agree to all of the policies and services above. 
          <br><br>
          <div class="col-md-6">          
              <label><strong>Signature:</strong> </label>
              
              <input type="hidden" id="edit_extimage2" name="edit_extimage2" class="form-control" value="<?php echo $res_offc[0]['sign'];?>">
              
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

              <img src="<?php echo $res_offc[0]['sign'];?>" width="100px;" height="100px;">
            </div> <br><br>  
            <div class="col-md-4">
            <label><strong>Date:</strong></label>
            <input type="date" name="date" id="date" class="form-control" value="<?php echo $todate; ?>">
            </div>  
          <h6 style="margin-top:8%;padding:5px;"><b>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</b></h6>
          <div class="col-md-6">
            <label><strong>Patient's Signature:</strong></label>
          
            <input type="hidden" id="edit_extimage3" name="edit_extimage3" class="form-control" value="<?php echo $res_offc[0]['patient_sign'];?>">

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

            <img src="<?php echo $res_offc[0]['patient_sign'];?>" width="100px;" height="100px;">

           <input type="hidden" name="hid_OFFICE_id" id="hid_OFFICE_id" value="<?php echo $res_offc[0]['id'] ?>" class="form-control">
          </div>&ensp;
         
        </div>
                </div>
              </div>
            </div>
            <input type="submit" name="submit" id="eye_id" value="Update" class="btn btn-primary" style="float:right;background-color:#0BA1C2;border-color:#0BA1C2;">
            <input type="reset" name="cancel" value="Back" class="btn btn-danger" onclick="window(location='patient_details.php')" style="float:left;">
            <textarea cols="5" rows="5" style="display:none;" name="per_info1"><?php echo $per_info_JSON; ?></textarea>
            <input type="hidden" name="table1" value="<?php echo $table1_JSON; ?>">

              <textarea cols="5" rows="5" style="display:none;" name="per_info2"><?php echo $View_Person_Json; ?></textarea>
            <input type="hidden" name="table2" value="<?php echo $table2_JSON; ?>">
             <textarea cols="5" rows="5" style="display:none;" name="per_info3"><?php echo $Patient_medical_json; ?></textarea>
            <input type="hidden" name="table3" value="<?php echo $table3_JSON; ?>">   

            <textarea cols="5" rows="5" style="display:none;" name="per_info4"><?php echo $patient_eye_json; ?></textarea>
            <input type="hidden" name="table4" value="<?php echo $table4_JSON; ?>">
                <textarea cols="5" rows="5" style="display:none;" name="per_info5"><?php echo $family_eye_json; ?></textarea>
            <input type="hidden" name="table5" value="<?php echo $table5_JSON; ?>">
                <textarea cols="5" rows="5" style="display:none;" name="per_info6"><?php echo $office_json; ?></textarea>
            <input type="hidden" name="table6" value="<?php echo $table6_JSON; ?>">


          
          </div>
        </div><!--- END COL -->   
      </div><!--- END ROW -->     
    </div>
  </form>
   <?php }?>



   <!-- ----------------------------View---------------------------------------------- -->
    <?php if ($_REQUEST['type'] == 'view') { ?>    
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
           <div class="col-12">
            <h3 style="margin-left:60px;margin-bottom:-35px;">Name : <?php echo $res_per[0]['patientFname'] ?>&nbsp;<?php echo $res_per[0]['plasLtname']?></h3>
            <h3 style="margin-left:85%; margin-top:10px;color:#0BA1C2;"><b>View</b></h3>
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
              <!--   <div class="col-md-4 mt-4">
                      <label ><strong>To Whom:</strong></label>
                   <input type="text" class="form-control" id="towhom" placeholder="" name="towhom" readonly value="<?php echo $view_res_per[0]['towhom']; ?>">    
                      </div> -->
                     <div class="col-md-4 mt-4">
                          <label><strong>Patient Number:</strong></label>
                          <input type="text" name="patient_number" id="patient_number" class="form-control" placeholder="" value="<?php echo $view_res_per[0]['patient_number']; ?>" readonly>                                  
                         
                      </div>   
                       <div class="col-md-4 mt-4">
                          <label><strong>Patient SSN No:</strong></label>
                          <input type="text" name="patient_ssn" id="patient_ssn" class="form-control" placeholder="Enter Patient SSN" value="<?php echo $view_res_per[0]['patient_ssn'] ?>" readonly>                                  
                         
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
                    </div>

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

                      </div>
                      <br>
                         <div class="row mb-4">   
                      <div class="col-md-4 mt-4">
                          <label><strong>Email</strong>(Please print each alphabet seperate & legibly):</label>                     
                          <input type="email" name="email" id="email" class="form-control" value="<?php echo $res_per[0]['email'] ?>" readonly>
                      </div> 
                      <div class="col-md-4 mt-4" style="margin-top:22px;">
                      <label ><strong>Address:</strong></label>
                       <textarea class="form-control" class="address" id="address" name="address" placeholder="" readonly rows="1"><?php echo $res_per[0]['address'] ?></textarea>
                      </div>
                      <div class="col-md-4 mt-4" style="margin-top:22px;">
                      <label><strong>State:</strong></label>
            <input type="text" name="state" id="state" class="form-control" value="<?php echo $res_per[0]['state_name'] ?>" readonly>          
                     </div>  
                      
                  
                    </div>
                     <br>
                    <div class="row">
                      <div class="col-md-4 mt-4">
                         <label><strong>City:</strong></label>
                          <input type="text" name="city" id="city" class="form-control" value="<?php echo $res_per[0]['city_name'] ?>" readonly>
                      </div>
                      
                      <div class="col-md-4 mt-4">
                          <label><strong>Zip Code:</strong></label>
              <input type="text" name="zipCode" id="zipCode" class="form-control" value="<?php echo $res_per[0]['zipCode'] ?>" readonly>
                      </div> 
                      <div class="col-md-4 mt-4">
                     <label ><strong>How you found our Office:</strong></label>
                      <input type="text" class="form-control" id="office" name="office" readonly value="<?php echo $res_per[0]['office'] ?>">
                      </div>
                    
                    </div><br>
                    <div class="row">
                        <div class="col-md-4 mt-4">                         
                            <label><strong>Payment Type:</strong></label><br>
                            <input type="radio" name="payment" id="insurance" value="Insurance"<?php if($res_per[0]['payment']=="Insurance"){echo "checked";}?>>&ensp;Insurance                      
                            <input type="radio" name="payment" id="groupon" value="Groupon"<?php if($res_per[0]['payment']=="Groupon"){echo "checked";}?>>&ensp;Groupon                      
                            <input type="radio" name="payment" id="selfpay" value="Selfpay"<?php if($res_per[0]['payment']=="Selfpay"){echo "checked";}?> >&ensp;Selfpay
                        </div>
                    </div><br>

                    <div class="row" id="show_data" <?php if($res_per[0]['payment']!="Insurance"){echo 'style="display:none;"';}?>>
                        <div class="col-md-6 mt-4">
                            <label><strong>Vision Insurance :</strong></label>
                            <input type="text" name="insurance" id="insurance" placeholder="" class="form-control" value="<?php echo $res_per[0]['insurance'];?>" readonly>
                        </div> 
                        <div class="col-md-6 mt-4">
                            <label><strong>Insurance Subscribers First Name:</strong></label>
                            <input type="text" class="form-control" id="insFname" placeholder="" name="insFname" title="enter First name" value="<?php echo $res_per[0]['insFname'];?>" readonly>
                        </div><br>
                        <div class="col-md-6" style="margin-top: 15px;">
                            <label><strong>Insurance Subscribers Last Name:</strong></label>
                            <input type="text" class="form-control" id="insLname" placeholder="" name="insLname" title="enter First name" value="<?php echo $res_per[0]['insLname'];?>" readonly>
                        </div> 
                        <div class="col-md-6 mt-4">
                          <label><strong>Insurance Subscribers :&nbsp;</strong><?php echo $res_per[0]['insSubscribers'] ?></label>
                         <!--  <input type="text" class="form-control" id="insSubscribers" placeholder="" name="insSubscribers" readonly value="<?php echo $res_per[0]['insSubscribers'] ?>"> -->

                        <input type="text" id="codeval" name="codeval" class="form-control col-md-8 pt-4" readonly value="<?php echo $res_per[0]['codeval'] ?>">                      
                      </div>           
                        <div class="col-md-6" style="margin-top: 15px;">
                            <label><strong>Insurance Subscribers DOB:</strong></label><br>
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="" title="Enter the Date Of Brith" value="<?php echo $res_per[0]['dob'];?>" readonly>
                        </div>
                    </div>

                    <div class="row" id="show_Group" <?php if($res_per[0]['payment']!="Groupon"){echo 'style="display:none;"';}?>>
                        <div class="col-md-6">
                            <label><strong>Group on:</strong></label>
                            <input type="text" name="grouponcode" id="grouponcode" class="form-control col-md-8 pt-4" placeholder="Enter Groupon Number" value="<?php echo $res_per[0]['grouponcode'];?>" readonly>
                        </div>
                    </div>
                    <div class="row" id="show_self" <?php if($res_per[0]['payment']!="Selfpay"){echo 'style="display:none;"';}?>>
                        <div class="col-md-6">
                            <label><strong>Self Pay:</strong></label>
                            <input type="text" name="selfcode" id="selfcode" class="form-control col-md-8 pt-4" placeholder="Enter Selfcode" value="<?php echo $res_per[0]['selfcode'];?>" readonly>
                    </div>
                  </div><br>           
                   <div class="row">
                      <div class="col-md-12 mt-4">
                        <p><strong>Insurance Authorization:</strong> I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</p>
                      </div>
                      <div class="col-md-6 mt-4">
                        <label><strong>Signature:</strong></label>
                        <!-- <input type="text" name="sign" id="sign" class="form-control" value="<?php echo $res_per[0]['sign'];?>"readonly> -->
                        <img src="<?php echo $res_per[0]['sign'];?>" width="100px;" height="100px;">

                      </div> 
                        

                       <div class="col-md-6 mt-4">
                        <label><strong>Date:</strong></label>
                      <input type="date" name="date" id="date" class="form-control" value="<?php echo $res_per[0]['date'] ?>"readonly>
                        </div><br>
                        <div class="col-md-12 mt-4"><br>
                          <p><b><u>HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</u></b></p>     
                        </div>
                        <div class="col-md-12 mt-4 scroll" style="width: 100%; height: 300px;">
                        <p>I, <input type="text" name="represent_name" id="represent_name" style="border:none; border-bottom: 1px dashed;" value="<?php echo $res_per[0]['represent_name'];?>" readonly><br><br> 
                          <iframe src="HIPAA Law.pdf#toolbar=0" width="100%" height="500px"></iframe>
                        </p>                        
                        </div>
                        <?php
                         
                         $agreement = $res_per[0]['pat_agree_tc'];
                          $pat_agree = explode(',', $agreement);
                           // print_r($pat_agree);
                            ?>
                        <div class="col-md-12 mt-4">
                          <p>Please check one: </p>                        
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc1" value="pat_agree_tc1"<?php if($pat_agree[0]=='pat_agree_tc1'){echo "checked";}?>>&ensp;I hereby acknowledge reciept of the policy.<br>
                          <input type="checkbox" name="pat_agree_tc[]" id="pat_agree_tc2" value="pat_agree_tc2"<?php if($pat_agree[0] =='pat_agree_tc2'){echo "checked";} ?>>&ensp;I hereby REFUSE to acknwledge reciept of the policy.I understand that even though I refuse to sign this <b>ACKNOWLEDGEMENT</b>, the provider may still provide treatment to me.
                        </div>
                     
                        <div class="col-md-6 mt-4">
                          <label><strong>Signature:</strong></label>
                          <!-- <input type="text" name="signature" id="signature" class="form-control" value="<?php echo $res_per[0]['signature'];?>" readonly> -->

                          <img src="<?php echo $res_per[0]['signature'];?>" width="100px;" height="100px;">
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
          <input type="checkbox" name="agree_tc[]" id="agree_tc2" value="agree_tc2"<?php if($agree[0] == "agree_tc2"){echo "checked";} ?> >&ensp; I agree to all of the policies and services above. 
          <br><br>
          <div class="col-md-12 mb-4">
          <div class="row">
            <div class="col-md-6">          
              <label><strong>Signature:</strong> </label>
              <img src="<?php echo $res_offc[0]['sign'];?>" width="100px;" height="100px;">
            </div> 
            <div class="col-md-4">
            <label><strong>Date:</strong></label>
            <input type="date" name="date" id="date" value="<?php echo $todate; ?>" class="form-control" readonly>
          
            </div>
          </div>
          </div><br><br>    
          <h6 style="margin-top:8%;padding:5px;"><b>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</b></h6>
          <div class="col-md-6">
            <label><strong>Patient's Signature:</strong></label>
           <img src="<?php echo $res_offc[0]['patient_sign'];?>" width="100px;" height="100px;">
          </div>&ensp;
         
        </div>
                </div>
              </div>
            </div>
              <input type="reset" name="cancel" value="Back" class="btn btn-danger" onclick="window(location='patient_details.php')" style="float:right;"> 
          </div>
        </div><!--- END COL -->   
      </div><!--- END ROW -->     
    </div>
   <?php }?>
    </body>

</html>
 <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <!-- validate -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
     <!-- toaster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Signature JS Files -->
    <script type="text/javascript" src="assets/signature.js"></script>
    <script type="text/javascript" src="assets/signature1.js"></script>
    <script type="text/javascript" src="assets/signature2.js"></script>
    <script type="text/javascript" src="assets/signature3.js"></script>
    <!-- Signature JS Files End -->

   <script type="text/javascript">

    // function saveData() {
    //     document.getElementById("fm1").submit();
    // }
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
  


<script type="text/javascript">
   //  var gender = $('.gender').val();
    // if ($(".gender:checked").length > 1 || $(".gender:checked").length == 0){
    //   $('#dis').slideDown().html('<span id="error">Please choose a gender</span>');
    // }
    // else{
    //   alert(gender)
    // }

  $(function() {
    //alert("hii");
  
  $("form[name='addform']").validate({    
        //ignore: [],  // ignore NOTHING
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

      // var isValid = $("input[name=gender]").is(":checked");
      // $("#spnError")[0].style.display = isValid ? "none" : "block";  


      //alert('hii');
        let formdata = new FormData();
        let x = $('#addform').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'update');      
       
        $.ajax({
          type: "POST",
          url: "saveUpdate.php",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('Updated Successfully...!');
              setTimeout(function (){
                location.href = "patient_details.php";
              },1000);
            }
            else{
              toastr.error(data);
            }
          }
        });
      }
  });
});

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

// function jFyesNo(v) {
//   //alert(v);
//   if(v=="yes"){
//     $('#patient_detailsId').show();
//   }else if(v=="no"){
//     $('#patient_detailsId').hide();
//   } 
// }


//   function JfSSNchanplc(element) {
//   var data = {    
//     member_id1: 'Please Enter Member Id',
//     ssn1: 'Please Enter Last Four of SSN',
   
//   };
//   var input = element.form.codeval;
//   input.placeholder = data[element.id];
 
// }

// function Jfgrouponchanplc(element) {
//   var data = {    
//      groupon: 'Please Enter Groupon',
//     selfpay: 'Please Enter Selfpay'
//   };
//    var goinput = element.form.grouponcode;
//   goinput.placeholder = data[element.id];
// }

$(document).ready(function() {
   
    var initialOption = "<?php echo $res_per[0]['payment']; ?>";
  
    showRadioDiv(initialOption);
   
    $('input[name="payment"]').on('change', function() {
        var selectedOption = $(this).val();
     
        showRadioDiv(selectedOption);
    });
});

function Jfgrouponchanplc(element) {
    if (element == "Insurance") {
        $('#show_data').show();
        $('#show_self').hide(); 
        $('#show_Group').hide(); 
    } else {
        $('#show_data').hide();
    }
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
    
    if (V == "Selfpay") {
        $('#show_self').show();
        $('#show_data').hide(); 
        $('#show_Group').hide(); 
    } else {
        $('#show_self').hide();
    }
}

function showRadioDiv(option) {
    
    $('#show_data').hide();
    $('#show_Group').hide();
    $('#show_self').hide();

  
    switch (option) {
        case 'Insurance':
            Jfgrouponchanplc(option);
            break;
        case 'Groupon':
            JFGroup(option);
            break;
        case 'Selfpay':
            JFSlef(option);
            break;
     
    }
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

 function stateType(B){
  alert(B);

    $.ajax({
        url     : "saveUpdate.php",
        type    : 'POST',
        data    : {'action' : 'Getcity','B' : B},
        success : function(data){         
            if (data){             
                var res_data  = JSON.parse(data);
                let view_data = res_data['data'];
                var selHTML   = '';
                selHTML  += `<option value="">-- Select City --</option>`;
                $.each(view_data, function (i, userData) { 
                    selHTML += `<option value="`+`${userData.id}`+`">`+`${userData.city_name}`+`</option>`;
                });

                let selchk = $('#city').length;
                if(selchk > 0) {
                    var selectElement = $('select#city');
                    selectElement.empty();                        
                }
                $('#city').append(selHTML);
            }else {
                toastr.error('No Data');
            }
        }
    });
}
</script>