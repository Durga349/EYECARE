<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("crudop/crud.php");
$crud = new Crud();

if (isset($_POST['type']) && $_POST['type'] == 'pdf') {
    $date       = $_POST['date'];
    $patient_number    = $_POST['patient_number'];
    // $patient_Id = $_POST['patient_Id'];

   $sel_data = "SELECT * FROM patient_reportdata WHERE patient_number ='".$patient_number."' AND date ='".$date."'";
    $res_per = $crud->getData($sel_data);
    // print_r($res_per);
    // exit;

    if (!empty($res_per) && isset($res_per[0])) {

         $json_data_column1 = $res_per[1]['data'];
         $json_data_column2 = $res_per[2]['data'];
         $json_data_column3 = $res_per[3]['data'];
         $json_data_column4 = $res_per[4]['data'];
         $json_data_column5 = $res_per[5]['data'];
         $decoded_data1 = json_decode($json_data_column1, true);
         $decoded_data2 = json_decode($json_data_column2, true);
         $decoded_data3 = json_decode($json_data_column3, true);
         $decoded_data4 = json_decode($json_data_column4, true);
         $decoded_data5 = json_decode($json_data_column5, true);
         // print_r($decoded_data2);
         //  exit;
        // foreach ($res_per as $key => $value) {
        //     $json_data_column = $value['data'];
        //     $decoded_data = json_decode($json_data_column, true);
        //  print_r($decoded_data);
        // exit;
  

    require_once __DIR__ . '/../vendors/autoload.php';
    $mpdf = new \Mpdf\Mpdf();


 
    $html = '<!DOCTYPE html>
    <html>
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
            padding-bottom: 25px;
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
        .horizontal-text {
        white-space: nowrap;
        text-align: left; 
       }
    
    </style>
    <body>
    <div class="container body_border">
        <div class="logo">
            <img src="../Brookwood.png" >    
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
                     
                     <td><b>Patient Number:</b></td>
                     <td class="cell-value">'.@$decoded_data1[0]['patient_number'].'</td>
                     <td><b>Patient SSN No:</b></td>
                     <td class="cell-value">'.@$decoded_data1[0]['patient_ssn'].'</td>
                    
                </tr>
                 <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                   
                    <td><b>Insurance Subscribers:</b></td>
                    <td>('.@$decoded_data1[0]['insSubscribers'].')&ensp;'.@$decoded_data1[0]['codeval'].'</td>
                    <td><b>First Name:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['patientFname'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                    
                    <td><b>Last Name:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['plasLtname'].'</td>
                     <td><b>Gender:</b></td>
                   <td>'.@$decoded_data1[0]['gender'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                  
                   <td><b>DOB:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['patDob'].'</td>
                    <td><b>Home Phone:</b></td>
                    <td>'.@$decoded_data1[0]['homeph'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                    <td><b>Work:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['workNo'].'</td>
                    <td><b>Mobile:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['cell'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                 
                   <td><b>Email:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['email'].'</td>
                    <td> <b>Address:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['address'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                   <td> <b>Address:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['address'].'</td>
                   <td><b>How you found our Office:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['office'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr> 
                   <td> <b>State:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['state'].'</td>
                   <td><b>Zip Code:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['zipCode'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                    <td><b>Vission Ins:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['insurance'].'</td>
                    <td><b>Insurance#Groupon# or SelfPay:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['payment'].'</td>
                  
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                 <tr>
                    <td><b>Ins Sub FName:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['insFname'].'</td>
                    <td><b>Ins Sub LName:</b></td>
                    <td class="cell-value">'.@$decoded_data1[0]['insLname'].'</td>
                </tr>
                 <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                   <td><b>Ins Sub DOB:</b></td>
                   <td class="cell-value">'.@$decoded_data1[0]['dob'].'</td>
                   
                  
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>
        </div><br>
         <p style="page-break-after:always;"></p>
        <div class="address-header">
        <h3>Insurance Authorization:</h3>
        </div>
        
        <div class="table">
            <div class="container body_border">
                <div>
                    <table class="adddress-table">
                        <tr>
                           <td class="horizontal-text" colspan="4" style="font-size:20px">
                            <b>I authorize and request my insurance company to pay to the eye doctor benefits otherwise payable to me. I understand that my insurance carrier may pay less than the actual bill for service. I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</b></td>
                        </tr>
                        <tr><td></td><td></td><td></td><td></td></tr>
                         <br>
                        <tr>
                            <td><b>Signature</b></td>
                            <td class="cell-value"><img src="../'.@$decoded_data1[0]['sign'].'" width="50px;" height="50px;"></td>
                            <td><b>Date</b></td>
                            <td class="cell-value">'.@$decoded_data1[0]['date'].'</td>
                        </tr>
                    </table>
                    <h5 class="header">HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</h5>

                </div>
                <div class="flex-container">
                    <table width="100%">
                        <tr>
                            <td class="horizontal-text" colspan ="4" style="font-size:20px"><b>'.@$decoded_data1[0]['represent_name'].'(Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.</b></td>
                            <td><b><p><b>Please check one:</b> </p></b></td>
                        </tr>
                        <tr><td></td><td></td><td></td><td></td></tr>
                        <br>
                        <tr>
                            <td class="horizontal-text" colspan ="4" style="font-size:20px"><input type="checkbox" name="agree_tc[]" id="agree_tc1" value="agree_tc2"<?php if('.@$decoded_data1[0]['pat_agree_tc'].' == "agree_tc1"){echo "checked";} ?>&ensp; I hereby acknowledge reciept of the policy.<br><br>
                            </td>
                        </tr>
                         <tr><td></td><td></td><td></td><td></td></tr>
                        <tr>  
                            <td class="horizontal-text" colspan ="4" style="font-size:20px"><input type="checkbox" name="agree_tc[]" id="agree_tc2" value="agree_tc2"<?php if('.@$decoded_data1[0]['pat_agree_tc'].' == "agree_tc2"){echo "checked";} ?>&ensp; I hereby REFUSE to acknwledge reciept of the policy.I understand that even though I refuse to sign this <b>ACKNOWLEDGEMENT</b>, the provider may still provide treatment to me.<br><br>
                            </td>
                        </tr>
                         <tr><td></td><td></td><td></td><td></td></tr>
                        <tr>
                            <td><b>Sigature</b></td>
                           <td class="cell-value"><img src="../'.@$decoded_data1[0]['signature'].'" width="50px;" height="50px;"></td>
                            <td><b>Date</b></td>
                            <td class="cell-value">'.@$decoded_data1[0]['datePre'].'</td>
                        </tr>
                    </table>
                </div>
            </div>
            <p style="page-break-after:always;"></p>

            <div class="table">
               <h3 class="header">Patient Medical History</h3><br>
                <table>
                    <tr class="first-line">
                       <td><b>Name of Primary Care Physician:</b></td>
                       <td class="cell-value">'.@$decoded_data2[0]['physicianName'].'</td>
                       <td><b>City</b></td>
                       <td>'.@$decoded_data2[0]['physicianCity'].'</td>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                    <tr>
                       <td><b>Last Date of Check Up:</b></td>
                       <td class="cell-value">'.@$decoded_data2[0]['checkUplDate'].'</td>
                       <td><b>Current Medications:</b></td>
                       <td class="cell-value">'.@$decoded_data2[0]['currentMed'].'</td>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                    <tr>
                       <td><b>Any Allergies to Medication? - '.strtoupper(@$decoded_data2[0]['allergyMedication']).'</b></td>
                       <td>'.@$decoded_data2[0]['allergyMedicationText'].'</td>
                       <td><b>Have You Had Any Surgeries? </b></td>
                       <td class="cell-value">'.strtoupper(@$decoded_data2[0]['anySurgeries']).'</td>
                    </tr>
                    <tr><td></td><td></td><td></td><td></td></tr>
                    <tr>
                       <td><b>Do you use cigarettes/tobacco,alcohol,<br> or other substances? </b></td>
                       <td>'.strtoupper(@$decoded_data2[0]['asecigarettes']).'</td>
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
                <tr>';
                foreach ($decoded_data2 as $i => $value) {

                 $html .= '<tr>
                    <td>' . ($i + 1) . '</td>
                    <td>' . @$value['displayFieldName'] . '</td>
                    <td>' . (@$value['genHealthStatus'] == 1 ? 'YES' : 'NO') . '</td>
                </tr>';
                }
     $html .= '</table>
            </div>
        </div>
        <br><br>
        <div class="table">
            <h3 class="header">Patient Eye History</h3>
            <table>
               <tr class="first-line">
                    <td><b>Date Of Last Eye Exam:</b> </td>
                    <td class="cell-value">'.@$decoded_data3[0]['dateOfLastEyeExam'].'</td>
                    <td><b>Do You Currently Wear Glasses:</b> </td>
                    <td>'.@$decoded_data3[0]['doYouCurrentlyWearGlasses'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                    <td><b>Do You Currently Wear Contacts:</b></td>
                    <td class="cell-value">'.@$decoded_data3[0]['doYouCurrentlyWearContacts'].'</td>
                    <td><b>What kind?</b></td>
                    <td class="cell-value">'.@$decoded_data3[0]['whatKind'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                    <td><b>Solution Used?:</b></td>
                    <td>'.@$decoded_data3[0]['solutionUsed'].'</td>
                    <td><b>Would You Prefer Clear, Or Colored Contacts?:</b></td>
                    <td class="cell-value">'.@$decoded_data3[0]['wouldYouPreferClear'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
                <tr>
                    <td><b>Are You Satiesfied With The Vision , And Comfort Of Your Contact Lenses?: </b></td>
                    <td>'.@$decoded_data3[0]['satisfied_vision'].'</td>
                    <td><b>Do You Use The Computer?:</b></td>
                    <td>'.@$decoded_data3[0]['doyouUseTheComputer'].'</td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr> 
                <tr>
                    <td><b>Approx.How Many Hours A Day Do You Use The Computer?:</b></td>
                    <td>'.@$decoded_data3[0]['appr_hrs_day'].'</td>
                    <td><b>Occupation:</b></td>
                    <td>'.@$decoded_data3[0]['ocupation'].'</td>
                </tr>   
                     
            </table>
            <br><br>
            <div class="address-header">
                <h3><strong>OCULAR SYMPTOMS</strong></h3>
            </div><br>
            <div class="table table-bordered">
                <table border="1" class="table table-bordered">
                   <tr>
                      <th>S.No</th>
                      <th>Symptom Name</th>
                      <th>Check</th>
                    </tr>';
                    foreach ($decoded_data3 as $i => $value) {
                       
                    
               $html .= '<tr>
                      <td>' . ($i + 1) . '</td>
                      <td>'.@$value['displayFieldName'].'</td>
                      <td>'. (@$value['dispStatus'] == 1 ? 'checked' : 'unchecked') . '</td>
                    </tr>'; 
                }
           $html .= '</table>
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
                    </tr>';
                    foreach ($decoded_data4 as $i => $value) {
                   $html .= '<tr>
                      <td>' . ($i + 1) . '</td>
                      <td>'.@$value['displayFieldName'].'</td>
                      <td>' . (@$value['familyMedStatus'] == 1 ? 'YES' : 'NO') . '</td>
                      <td>'.@$value['whom'].'</td>
                    </tr>'; 
                }
              $html .= '</table>
            </div><br>
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
                        <td class="tick_class horizontal-text" colspan="4">✔️ I authorize and request my insurance company to pay to the eye doctor benefits otherwise payable to me. I understand that my insurance carrier may pay lgss than the act1.1al bill for service. I agree to be responsible for the payment of all services rendered on my behalf or my dependants.<br><br></td>
                    </tr>
                    <tr>
                        <td class="horizontal-text" colspan="4"><input type="checkbox" name="agree_tc[]" id="agree_tc2" value="agree_tc2"<?php if($agree[1] == "agree_tc2"){echo "checked";} ?>&ensp; I agree to all of the policies and services above.<br><br></td>
                    </tr>
                    <tr>
                        <td><b>Signature</b></td>
                        <td class="cell-value"><img src="../'.@$decoded_data5[0]['sign'].'" width="50px;" height="50px;"></td>
                    </tr>
                    <tr>
                        <td><b>Date</b></td>
                        <td>'.@$decoded_data5[0]['date'].'</td>
                    </tr>
                </table>
                <div>
                    <h6 style="margin-top:8%;padding:5px;"><b>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</b></h6>
                </div>
                <div>
                   <table>
                      <tr>
                        <td><b>Patients Signature:</b></td>
                        <td class="cell-value"><img src="../'.@$decoded_data5[0]['patient_sign'].'" width="50px;" height="50px;"></td>
                       </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </body>   
    </html>';
       $mpdf->WriteHTML($html);

     // }
    } else {
        echo "No results found.";
    }

    $path = "pdf/".$_POST['patient_number'].".pdf";
    if (file_exists($path)) {
        unlink($path);
    }
    $mpdf->Output($path, \Mpdf\Output\Destination::FILE);
    echo $path;

   

}
?>
