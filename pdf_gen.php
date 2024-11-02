
<?php 

include("crudop/crud.php");
$crud = new Crud();

 if (isset($_POST['type']) && $_POST['type'] == 'pdf') {

 $patient_number = $_POST['patient_number'];
   // $patient_Id = $_POST['patient_Id'];
//----------Personal Information---------

$sel_per = "select pi.patient_number,pi.id, pi.patient_Id, pi.toWhom, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId, rd.id from personal_information pi LEFT JOIN relations_details rd on pi.toWhom = rd.id where patient_number = '".$patient_number."' ";
$res_per = $crud->getData($sel_per);
//veiw personal information--
$view_sel_per = "SELECT pi.patient_number,pi.patient_ssn,pi.id,rd.towhom, pi.patient_Id, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId FROM `personal_information` pi left join relations_details rd on pi.toWhom = rd.id WHERE patient_number = '".$patient_number."' ";
$view_res_per = $crud->getData($view_sel_per);


 $sel_genhealth="SELECT gh.columnId,gh.genHealthStatus, gh.displayFieldName,gh.typevalues,gh.type,ph.typevalue,ph.genHealthStatus,ph.genHealth_Id, ph.physicianName,ph.checkUplDate,ph.physicianCity,ph.currentMed,ph.allergyMedication,ph.allergyMedicationText,ph.anySurgeries,ph.asecigarettes, ph.randomId FROM `generalhealth` AS gh LEFT JOIN patient_medical_history AS ph ON gh.columnId=ph.genHealth_Id WHERE gh.columnId=ph.genHealth_Id AND ph.patient_number = '".$patient_number."'";
// exit;
 $res_med =$crud->getData($sel_genhealth);

 $i=1;$j=1;

$data="";
foreach ($res_med as $key => $value) {
    $var1 = $value['displayFieldName'];
    $var2 = "";
    if($value["genHealthStatus"] == 0){
        $var2 ="No";
    }else{
        $var2 ="Yes";
    }

    $data .= <<<EOD
<tr><td>$i</td><td>$var1</td><td>$var2</td></tr>
EOD;
    $i++;$j++;
}


//Patient Eye History//
 $sel_pateye ="SELECT oc.columnId,peh.id,oc.displayFieldName,oc.priority,oc.dispStatus,oc.type,oc.typevalues,peh.ocularsymptoms,peh.dateOfLastEyeExam,peh.doYouCurrentlyWearGlasses,peh.doYouCurrentlyWearContacts,peh.whatKind,peh.solutionUsed,peh.satisfied_vision,peh.wouldYouPreferClear,peh.doyouUseTheComputer,peh.appr_hrs_day,peh.ocupation,peh.codeval,peh.randomId FROM `ocularsymptoms` AS oc LEFT JOIN patient_eye_history AS peh ON oc.columnId=peh.ocularsymptoms WHERE oc.columnId=peh.ocularsymptoms AND peh.patient_number = '".$patient_number."' ";
//exit;
 $res_pateye = $crud->getData($sel_pateye);

 //OCULAR SYMPTOMS//
 // $qryGeneralHealth2 = "select * from ocularsymptoms where dispStatus=1 order by priority";
 // $resGeneralHealth2=$crud->getData($qryGeneralHealth2);


$selgeteye = "select * from patient_eye_history where patient_number = '".$patient_number."'";

        $result = $crud->getData($selgeteye);
       // print_r($result);
        //echo "<br>";
        $ocular_data = "";
       
        $i=1;
    foreach ($result as $key => $value) {
        //print_r($value);
        
        //echo "-----------".$value['ocularsymptoms']."-----";
        //echo "<br>";
         $qryGeneralHealth2 = "select * from ocularsymptoms where dispStatus=1 and columnId = '".$value['ocularsymptoms']."' order by priority ";
        //echo "<br>";
        
        $resGeneralHealth2=$crud->getData($qryGeneralHealth2);
       // print_r($resGeneralHealth2);
        $ocular_var1 = $resGeneralHealth2[0]['displayFieldName'];
        //$var2 = "checked";
        $ocular_data .= <<<EOD
            <tr><td>$i</td><td>$ocular_var1</td><td>checked</td></tr>
            EOD;

        $i++;    
    }


//Family Eye Medical History//

 $sel_family="SELECT fh.columnId,fh.familyMedStatus,fh.displayFieldName as disease,feh.familyMedStatus,fh.whom as whome,feh.whom, feh.randomId FROM familyhistory AS fh LEFT JOIN family_eye_history AS feh ON fh.columnId=feh.familyMed_Id WHERE fh.columnId=feh.familyMed_Id AND  feh.patient_number = '".$patient_number."'";

 $res_family =$crud->getData($sel_family);

 $i=1;$j=1;

$famy_data="";

foreach ($res_family as $key => $value) {
    $famy_var1 = $value['disease'];
    $famy_var2 = "";
    if($value["familyMedStatus"] == 0){
        $famy_var2 ="No";
    }else{
        $famy_var2 ="Yes";
    }
    // $famy_var2 = $value['familyMedStatus'];
    $famy_var3 = $value['whom'];

    $famy_data .= <<<EOD
<tr><td>$i</td><td>$famy_var1</td><td>$famy_var2</td><td>$famy_var3</td></tr>
EOD;
    $i++;$j++;
}
 //Office Details//
 $sel_offc = "select * from office_details where patient_number = '".$patient_number."'";
 //exit;
 $res_offc = $crud->getData($sel_offc);



require_once __DIR__ . '/vendors/autoload.php';
    $mpdf = new \Mpdf\Mpdf();


$html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        .logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            height:100px;
            text-align: center;
        }
        h3,h1{
            text-align: center;
            margin: 0;
        }
        .header{
            margin-top: 10px;
        }
        .property_heading{
            text-align: center;
            font-size: 20px;
            margin: 0;
        }
        .recipt_no{
            font-size: 18px;
        }

        .flex-container{
            margin: 0px 30px;
            display: flex;
            border-bottom:1px solid #000;
        }
        /*.flex-child{
            width: 50%;
        }
        .flex-container .flex-child:nth-child(2){
            text-align: right;
        }*/
        .table{
            margin: 0px 30px;
        }
        
        .address-header{
            margin: 0px 30px;
            background: #ccc;
            padding:8px 0px;
        }
        
        .table table{
            width: 100%;
            padding-top: 20px;
        }
        .cell-value{
            text-align: left;
            /*background: red;*/
        }
        .table table tr td{
            width: 25%;
        }
        .adddress-table{
            border-bottom: 1px solid #000;
            padding-bottom: 8px;
        }
        .amount{
            margin: 20px 30px;

        }
        .amount-block{
            display: flex;
            width: 65%;
            align-items: center;
            float: right;
            
        }
        .amount-block{
            padding-right:30px;
        }
        .amount-block .left-child {
            width: 80%;
        }
        .amount-block .right-child {
            width: 20%;
        }
        .amount-block .left-child h4{
            text-align: right;
        }
        .amount-block .right-child h4{
            text-align: left;   
        }
        .flex-child{
            padding-top:10px;
        }
        .body_border{
            border: 2px solid #a9a6a6;
            padding-top: 60px;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 60px;
            border-style: double;
        }
        .price{
            float:left ;
        }
        .amount{
            /*margin: 10px;*/
            text-align: right;

        }

         .break-right {
        page-break-after: always;
    }
    
    </style>
</head>
<body>
<div class="container body_border">
    <div class="logo">
        <img src="Brookwood.png" >    
    </div>
    <div>
        <h3 class="header">EYE CARE</h3>
        
    </div>
    <div class="flex-container">
        <table width="100%">
            <tr>
               
            </tr>
        </table>
    </div>
    <div class="table">
    <h3 class="header">Patient Details</h3>
    <table>
        <tr class="first-line">
           
            <td>
                <b>Patient Number</b>

            </td>

            <td class="cell-value">'.@$view_res_per[0]['patient_number'].'</td>

             <td>
                <b>Patient SSN No</b>

            </td>
            <td class="cell-value">'.@$view_res_per[0]['patient_ssn'].'</td>
            </tr>
            <tr><td></td><td></td><td></td><td></td></tr>
            <tr>
           
            <td>
                <b>Insurance Subscribers:</b>

            </td>
            <td>('.@$res_per[0]['insSubscribers'].')&ensp;'.@$res_per[0]['codeval'].'</td>
              <td>
                <b>First Name:</b>

            </td>
            <td class="cell-value">'.@$res_per[0]['patientFname'].'</td>

        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
          
            <td>
                <b>Last Name:</b>

            </td>
            <td class="cell-value">'.@$res_per[0]['plasLtname'].'</td>
              <td>
                <b>Gender:</b>

            </td>
            <td>'.@$res_per[0]['gender'].'</td>
             
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td>
                <b>DOB:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['patDob'].'</td>
              <td>
                <b>Home Phone:</b>
            </td>
            <td>'.@$res_per[0]['homeph'].'</td>
        </tr>
         <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
          
            <td>
                <b>Work:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['workNo'].'</td>
             <td>
                <b>Mobile:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['cell'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
           
            <td>
                <b>Email:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['email'].'</td>
             <td>
                <b>How you found our Office:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['office'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
         <tr>
            <td>
                <b>Address:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['address'].'</td>
             <td>
                <b>City:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['city'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
         <tr>
            <td>
                <b>State:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['state'].'</td>
            <td>
                <b>Zip Code:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['zipCode'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
         <tr>
          
            <td>
                <b>Insurance#Groupon# or SelfPay:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['payment'].'</td>
            <td>
                <b>Ins Sub FName:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['insFname'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
         <tr>
            
            <td>
                <b>Ins Sub LName:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['insLname'].'</td>
          
            <td>
                <b>Ins Sub DOB:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['dob'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
         <tr>
             <td>
                <b>Vission Ins:</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['insurance'].'</td>

        </tr>
       
    </table>
    </div><br>
    <p style="page-break-after:always;"></p>

    <div class="address-header">
        <h3>Insurance Authorization:</h3>
    </div>

    <div class="table">
        <table class="adddress-table">
            
        
        </table>
        <div class="container body_border">
   
    <div>
     <tr>
            <td>
                <b>I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</b> 
                </td>
        </tr>
         <tr><td></td><td></td><td></td><td></td></tr>
         <br>
        <tr>
        <td>
                <b>Signature</b>
            </td>
            <td class="cell-value"><img src='.@$res_per[0]['sign'].' width="50px;" height="50px;"></td>
            <td>
                <b>Date</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['date'].'</td>
            </tr>
        
         <h5 class="header">HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</h5>
        
    </div>
    <div class="flex-container">
        <table width="100%">
            <tr>
              
            </tr>
        </table>
    </div>  
       
        <tr>
            <td>
               <b>I'.@$res_per[0]['represent_name'].'(Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.</b>
            </td>
            <td></td>
            </tr>
         <tr><td></td><td></td><td></td><td></td></tr>
        
         <br>
          <tr>
                            <td class="horizontal-text" colspan ="4"><input type="checkbox" name="agree_tc[]" id="agree_tc1" value="agree_tc2"<?php if('.@$res_per[0]['pat_agree_tc'].' == "agree_tc1"){echo "checked";} ?>&ensp; I hereby acknowledge reciept of the policy.<br><br>
                            </td>
                        </tr>
                         <tr><td></td><td></td><td></td><td></td></tr>
                        <tr>  
                            <td class="horizontal-text" colspan ="4"><input type="checkbox" name="agree_tc[]" id="agree_tc2" value="agree_tc2"<?php if('.@$res_per[0]['pat_agree_tc'].' == "agree_tc2"){echo "checked";} ?>&ensp; I hereby REFUSE to acknwledge reciept of the policy.I understand that even though I refuse to sign this <b>ACKNOWLEDGEMENT</b>, the provider may still provide treatment to me.<br><br>
                            </td>
                        </tr>
         <tr>
            <td>
                <b>Sigature</b>
            </td>
            <td class="cell-value"><img src='.@$res_per[0]['signature'].' width="50px;" height="50px;"></td>
            <td>
                <b>Date</b>
            </td>
            <td class="cell-value">'.@$res_per[0]['datePre'].'</td>
        </tr>
    </div>
<p style="page-break-after:always;"></p>

    <div class="table">
    <h3 class="header">Patient Medical History</h3><br>
    <table>
        <tr class="first-line">
            <td>
                <b>Name of Primary Care Physician:</b> 
            </td>
            <td class="cell-value">'.@$res_med[0]['physicianName'].'</td>
            <td>
                <b>City</b>

            </td>
            <td>'.@$res_med[0]['physicianCity'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td>
                <b>Last Date of Check Up:</b>

            </td>
            <td class="cell-value">'.@$res_med[0]['checkUplDate'].'</td>
            <td>
                <b>Current Medications:</b>

            </td>
            <td class="cell-value">'.@$res_med[0]['currentMed'].'</td>
            
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td>
                <b>Any Allergies to Medication? - '.strtoupper(@$res_med[0]['allergyMedication']).'</b>

            </td>
            <td>'.@$res_med[0]['allergyMedicationText'].'</td>
            <td>
                <b>Have You Had Any Surgeries? </b>
            </td>
            <td class="cell-value">'.strtoupper(@$res_med[0]['anySurgeries']).'</td>
        </tr>
         <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td>
                <b>Do you use cigarettes/tobacco,alcohol,<br> or other substances? </b>
            </td>
            <td>'.strtoupper(@$res_med[0]['asecigarettes']).'</td>
            
        </tr>        
    </table>
    </div><br>
    <div class="address-header">
        <h3>GENERAL HEALTH:</h3>
    </div><br>
    <div class="table table-bordered">
       <table border="1" class="table table-bordered">
        <tr>
          <th>S.No</th>
          <th>Health Problem</th>
          <th>Status</th>
        </tr>
        '.@$data.'
       </table>

   </div>
      
    </div>
<br><br>



<div class="table">
    <h3 class="header">Patient Eye History</h3>
    <table>
        <tr class="first-line">
            <td>
                <b>Date Of Last Eye Exam:</b> 
            </td>
            <td class="cell-value">'.@$res_pateye[0]['dateOfLastEyeExam'].'</td>
            <td>
                <b>Do You Currently Wear Glasses:</b>

            </td>
            <td>'.@$res_med[0]['doYouCurrentlyWearGlasses'].'</td>
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td>
                <b>Do You Currently Wear Contacts:</b>

            </td>
            <td class="cell-value">'.@$res_pateye[0]['doYouCurrentlyWearContacts'].'</td>
            <td>
                <b>What kind?</b>

            </td>
            <td class="cell-value">'.@$res_pateye[0]['whatKind'].'</td>
            
        </tr>
        <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td>
                <b>Solution Used?</b>

            </td>
            <td>'.@$res_pateye[0]['solutionUsed'].'</td>

            <td>
                <b>Would You Prefer Clear, Or Colored Contacts?</b>
            </td>
            <td class="cell-value">'.@$res_pateye[0]['wouldYouPreferClear'].'</td>
        </tr>
         <tr><td></td><td></td><td></td><td></td></tr>
        <tr>
            <td>
                <b>Are You Satiesfied With The Vision , And Comfort Of Your Contact Lenses? </b>
            </td>
            <td>'.@$res_pateye[0]['satisfied_vision'].'</td>
             <td>
                <b>Do You Use The Computer?</b>
            </td>
            <td>'.@$res_pateye[0]['doyouUseTheComputer'].'</td>
            
        </tr>  
         <tr><td></td><td></td><td></td><td></td></tr> 
        
         <tr>
            <td>
                <b>Approx.How Many Hours A Day Do You Use The Computer?</b>
            </td>
            <td>'.@$res_pateye[0]['appr_hrs_day'].'</td>
             <td>
                <b>Occupation:</b>
            </td>
            <td>'.@$res_pateye[0]['ocupation'].'</td>
            
            
        </tr>   
        
    </table><br><br>

    <div class="address-header">
        <h3><strong>OCULAR SYMPTOMS</strong></h3>
    </div><br>
    <div class="table table-bordered">
       <table border="1" class="table table-bordered">
        <tr>
          <th>S.No</th>
          <th>Symptom Name</th>
          <th>Check</th>
        </tr>
        '.@$ocular_data.'
       </table>
   </div><br>
   <p style="page-break-after:always;"></p>


    <div class="address-header">
        <h3><strong>FAMILY EYE/MEDICAL HISTORY</strong></h3>
    </div><br>
    <div class="table table-bordered">
       <table border="1" class="table table-bordered">
        <tr>
          <th>S.No</th>
          <th>Disease</th>
          <th>Status</th>
          <th>Whom</th>
        </tr>
        '.@$famy_data.'
       </table>
   </div>

<p style="page-break-after:always;"></p>


    <div class="address-header">
        <h3><strong>BROOKWOOD EYE CARE  </strong></h3>
    </div>
    <div>
        <h4 align="center"><u>OFFICE POLICIES</u></h4>
        <p align="justify">We look forward to providing all your vision care needs, and will go  above and beyond  to  provi de excellent customer service. Please take a moment to review our policies. </p>
        <ol>
            <li>All contact Lens and Spectacle Gla·sses orders are to be picked up within <u>60 days</u> from the date of purchase. Orders not picked up within <u>60 days</u> will be returned to the lab and any payments/deposits may be forfeited</li><br>
            <li><strong>Refunds</strong>: Glasses are individually fabricated so we are unable to accept requests for refunds. Therefore, <strong>All Sales are Final.</strong> Merchandise may be returned within <u>30 days</u> for exchange or store credit.</li><br>
            <li><strong>Patients own frame</strong> We take great care of patients frames. However, in the process of fitting new lenses into a customers old frame, making adjustments or minor repairs, we will not be responsible for breakages during these processes.<strong>Please knoe that these are done at your own risk.</strong></li><br>
            <li>There are <strong>no warranties on sale/ clearance frames</strong> unless purchased in addition. </li><br>
            <li>Contact Lens prescriptions are <strong>valid for 1 year </strong>per FDA regulations. Evaluations are required annually.</li><br>
            <li>All Contact Lens Exams also include a prescription for glasses.</li><br>
            <li>All fittings for Contact Lens examinations are to be completed within <u>60 days </u>to prevent any additional fitting fees.</li><br>
            <li>Doctors prescription changes are done one time at no charge within <u>60 days </u> of initial order date. </li><br>
            <li>All frames placed on hold will be returned back to the display case for sale after <u>two weeks</u>.</li>
        </ol>
        <p align="center"><strong>Insurance Authorization</strong></p><br>
        <table>
            <tr>
                <td class="tick_class horizontal-text" colspan="4">✔️ I authorize and request my insurance company to pay to the eye doctor benefits otherwise payable to 
            me. I understand that my insurance carrier may pay lgss than the act1.1al bill for service. I agree to be responsible for the payment of all services rendered on my behalf or my dependants.<br><br></td>
            </tr>
            <tr><td><input type="checkbox" name="agree_tc[]" id="agree_tc2" value="agree_tc2"<?php if($agree[1] == "agree_tc2"){echo "checked";} ?> >&ensp; I agree to all of the policies and services above. 
          <br><br></td></tr>
          <tr>
            <td>
                <b>Signature</b>
            </td>
            <td class="cell-value"><img src='.@$res_offc[0]['sign'].' width="50px;" height="50px;"></td>
          </tr>
           <tr>
            <td>
                <b>Date</b>
            </td>
            <td>'.@$res_offc[0]['date'].'</td>
          </tr>
          </table>
          <div>

            <h6 style="margin-top:8%;padding:5px;"><b>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</b></h6>
          </div>
          <div>
          <table>
            <tr>
                <td><b>Patients Signature:</b></td>
                <td class="cell-value"><img src='.@$res_offc[0]['patient_sign'].' width="50px;" height="50px;"></td>
            </tr>
        </table>
        </div>
    </div>
    </div>
</body>   
</html>';
    $mpdf->WriteHTML($html);
    //$mpdf->Output();
    $path = "pdf/".$_POST['patient_number'].".pdf";

     if (file_exists($path)) {
            unlink($path);
        }
        $mpdf->Output($path, \Mpdf\Output\Destination::FILE);
        echo $path;

    }
?>