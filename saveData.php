<?php 

    session_start();	
 	include("crudop/crud.php");
    $crud = new Crud();
 
 if (isset($_POST['action']) && $_POST['action'] == 'save') {

 	//Pid Generation
 	 $sm ="select MAX(ID) as mxid FROM patient_master_table";
        $slm_data = $crud->getData($sm);  
         if($slm_data ==''){
            $mid = '1';
        }else{
        $mid = $slm_data[0]['mxid']+1;  
        }
         $pid ='PATIENT'.$mid;

                       //Personal Details
$towhom           =  isset($_POST['towhom']) ? trim($_POST['towhom']):'';
$patient_number   =  isset($_POST['patient_number']) ? trim($_POST['patient_number']):'';
$patient_ssn      =  isset($_POST['patient_ssn']) ? trim($_POST['patient_ssn']):'';
$patientFname     =  isset($_POST['patientFname']) ? trim($_POST['patientFname']):'';
$plasLtname       =  isset($_POST['plasLtname']) ? trim($_POST['plasLtname']):'';
$gender           =  isset($_POST['gender']) ? trim($_POST['gender']):'';
$patDob           =  isset($_POST['patDob']) ? trim($_POST['patDob']):'';
$homeph           =  isset($_POST['homeph']) ? trim($_POST['homeph']):'';
$workNo           =  isset($_POST['workNo']) ? trim($_POST['workNo']):'';
$cell             =  isset($_POST['cell']) ? trim($_POST['cell']):'';
$email            =  isset($_POST['email']) ? trim($_POST['email']):'';
$address          =  isset($_POST['address']) ? trim($_POST['address']):'';
$city             =  isset($_POST['city']) ? trim($_POST['city']):'';
$state            =  isset($_POST['state']) ? trim($_POST['state']):'';
$zipCode          =  isset($_POST['zipCode']) ? trim($_POST['zipCode']):'';
$office           =  isset($_POST['office']) ? trim($_POST['office']):'';
$payment          =  isset($_POST['payment']) ? trim($_POST['payment']):'';
$insurance        =  isset($_POST['insurance']) ? trim($_POST['insurance']):'';
$insFname         =  isset($_POST['insFname']) ? trim($_POST['insFname']):'';
$insSubscribers   =  isset($_POST['insSubscribers']) ? trim($_POST['insSubscribers']):'';
$codeval          =  isset($_POST['codeval']) ? trim($_POST['codeval']):'';
$dob              =  isset($_POST['dob']) ? trim($_POST['dob']):'';
$grouponcode      =  isset($_POST['grouponcode']) ? trim($_POST['grouponcode']):'';
$selfcode         =  isset($_POST['selfcode']) ? trim($_POST['selfcode']):'';
$date_pat         =  isset($_POST['date_pat']) ? trim($_POST['date_pat']):'';
$date_pre         =  isset($_POST['date_pre']) ? trim($_POST['date_pre']):'';
$represent_name   =  isset($_POST['represent_name']) ? trim($_POST['represent_name']):'';
$patagree_tc         =  isset($_POST['pat_agree_tc']) ? $_POST['pat_agree_tc']:[];
$pat_agree_tc     = implode(',', $patagree_tc);
$randomId         =  substr(uniqid(), 0,10);

                    //Medical health
$physicianName     =  isset($_POST['physicianName']) ? trim($_POST['physicianName']):'';
$physicianCity     =  isset($_POST['physicianCity']) ? trim($_POST['physicianCity']):'';
$checkUplDate      =  isset($_POST['checkUplDate']) ? trim($_POST['checkUplDate']):'';
$currentMed        =  isset($_POST['currentMed']) ? trim($_POST['currentMed']):'';
$allergyMedication =  isset($_POST['allergyMedication']) ? trim($_POST['allergyMedication']):'';
$allergyMedicationText = isset($_POST['allergyMedicationText']) ? trim($_POST['allergyMedicationText']):'';
$anySurgeries      =  isset($_POST['anySurgeries']) ? trim($_POST['anySurgeries']):'';
$asecigarettes     =  isset($_POST['asecigarettes']) ? trim($_POST['asecigarettes']):'';


                         //Eye History 
$dateOfLastEyeExam          =  isset($_POST['dateOfLastEyeExam']) ? trim($_POST['dateOfLastEyeExam']):'';
$doYouCurrentlyWearGlasses  =  isset($_POST['doYouCurrentlyWearGlasses']) ? trim($_POST['doYouCurrentlyWearGlasses']):'';
$doYouCurrentlyWearContacts =  isset($_POST['doYouCurrentlyWearContacts']) ? trim($_POST['doYouCurrentlyWearContacts']):'';
$whatKind                   =  isset($_POST['whatKind']) ? trim($_POST['whatKind']):'';
$solutionUsed               =  isset($_POST['solutionUsed']) ? trim($_POST['solutionUsed']):'';
$satisfied_vision           =  isset($_POST['satisfied_vision']) ? trim($_POST['satisfied_vision']):'';
$wouldYouPreferClear        =  isset($_POST['wouldYouPreferClear']) ? trim($_POST['wouldYouPreferClear']):'';
$doyouUseTheComputer        =  isset($_POST['doyouUseTheComputer']) ? trim($_POST['doyouUseTheComputer']):'';
$appr_hrs_day               =  isset($_POST['appr_hrs_day']) ? trim($_POST['appr_hrs_day']):'';
$ocupation                  =  isset($_POST['ocupation']) ? trim($_POST['ocupation']):'';
 $ocularsymptom             = isset($_POST["ocularsymptoms"]) ? ($_POST["ocularsymptoms"]):[];

                         //OFFICE DETAILS
$policie_date            =  isset($_POST['date']) ? $_POST['date']:'';
$Office_agree_tc         =  isset($_POST['agree_tc']) ? $_POST['agree_tc']:[];
$policies                = implode(',', $Office_agree_tc);


//DIGITAL SIGNATURE
 	$sign_targetDir = "signatures/";

 	if(isset($_POST['hdn_signature']) && $_POST['hdn_signature'] !=""){
 	$sig_string=$_POST['hdn_signature']; 
    $nama_file=$sign_targetDir."signature_".date("his").".png";	
	file_put_contents($nama_file, file_get_contents($sig_string));
	
	}

     //DIGITAL SIGNATURE1
 	if(isset($_POST['signature']) && $_POST['signature'] != ""){

 	$sig_string1=$_POST['signature']; 
    $nama_file1=$sign_targetDir."signature1_".date("his").".png";	
	file_put_contents($nama_file1, file_get_contents($sig_string1));
	}

      //DIGITAL SIGNATURE2
    if(isset($_POST['sign']) && $_POST['sign'] != ""){

    $sig_string2=$_POST['sign']; 
     $nama_file2=$sign_targetDir."signature2_".date("his").".png";  
    file_put_contents($nama_file2, file_get_contents($sig_string2));
    }

      //DIGITAL SIGNATURE3
    if(isset($_POST['patient_sign']) && $_POST['patient_sign'] != ""){
    $sig_string3=$_POST['patient_sign']; 
    $nama_file3=$sign_targetDir."signature3_".date("his").".png";   
    file_put_contents($nama_file3, file_get_contents($sig_string3));
    }


           // --------Patient-Master-Information-------- 
			
	      $ins_mast_info = "INSERT INTO patient_master_table SET patient_Id ='".$pid."',patient_number ='".$patient_number."',toWhom='".$towhom."',insSubscribers='".$insSubscribers."',codeval='".$codeval."',randomId='".$randomId."'";
        
         $info_data1 = $crud->execute($ins_mast_info);




	       // // -------Patient Personal Information------------

		 if($pat_agree_tc != ''){
		   $ins_pat_info ="INSERT INTO personal_information SET patient_Id='".$pid."',toWhom='".$towhom."', patient_number = '".$patient_number."', patient_ssn = '".$patient_ssn."', insSubscribers='".$insSubscribers."',codeval='".$codeval."',patientFname='".$patientFname."',plasLtname='".$plasLtname."',gender='".$gender."',patDob='".$patDob."',homeph='".$homeph."',workNo='".$workNo."',cell='".$cell."',email='".$email."',address='".$address."',city='".$city."',state='".$state."',zipCode='".$zipCode."',insFname='".$insFname."',insLname='".$insLname."',dob='".$dob."',grouponcode='".$grouponcode."',selfcode ='".$selfcode."',payment='".$payment."',insurance='".$insurance."',office='".$office."', sign = '".$nama_file."', date = '".$date_pat."', represent_name = '".$represent_name."', pat_agree_tc = '".$pat_agree_tc."', signature = '".$nama_file1."', datePre = '".$date_pre."', randomId='".$randomId."'";

		 $info_data2 = $crud->execute($ins_pat_info);
           }
             // ---------Patient Medical History------------------
         $randomId_eye_hst = substr(uniqid(), 0,10);

           for ($i=1; $i <= 24; $i++) { 
           $rand      = $randomId_eye_hst.$i;
           $typevalue = $_POST['typevalue'];   
           $genHealthStatus  = $_POST['genHealthStatus'.$i]; 
           $genHealth_Id     = $_POST['genHealth_Id'.$i];
          
           //this is for typevale to save cancer
          if($genHealth_Id == 5){
     $med_his_ins="INSERT INTO patient_medical_history SET patient_Id='".$pid."',patient_number ='".$patient_number."',physicianName='".$physicianName."',physicianCity='".$physicianCity."',checkUplDate='".$checkUplDate."',currentMed='".$currentMed."',allergyMedication='".$allergyMedication."',allergyMedicationText='".$allergyMedicationText."',anySurgeries='".$anySurgeries."',asecigarettes='".$asecigarettes."',typevalue = '".$typevalue."',genHealthStatus='".$genHealthStatus."',genHealth_Id='".$genHealth_Id."', codeval='".$codeval."', randomId='".$rand."'"; 
           }

           if($genHealthStatus != '' ){
 $med_his_ins="INSERT INTO patient_medical_history SET patient_Id='".$pid."',patient_number ='".$patient_number."',physicianName='".$physicianName."',physicianCity='".$physicianCity."',checkUplDate='".$checkUplDate."',currentMed='".$currentMed."',allergyMedication='".$allergyMedication."',allergyMedicationText='".$allergyMedicationText."',anySurgeries='".$anySurgeries."',asecigarettes='".$asecigarettes."',typevalue = 0,genHealthStatus='".$genHealthStatus."',genHealth_Id='".$genHealth_Id."', codeval='".$codeval."', randomId='".$rand."'"; 


           }
           $info_data3 = $crud->execute($med_his_ins);
        }
         

         // ------Patient Eye History------------------------------------
          $countval = count($ocularsymptom);
          $randomId_eye = substr(uniqid(), 0,10);

          for ($j=0; $j < $countval; $j++) {
          $rand1 = $randomId_eye.$j;
          $ocularsymptoms_sym  = $ocularsymptom[$j];

           $eye_hst_ins = "insert into patient_eye_history set patient_Id = '".$pid."',patient_number ='".$patient_number."', 
                dateOfLastEyeExam ='".$dateOfLastEyeExam."',doYouCurrentlyWearGlasses = '".$doYouCurrentlyWearGlasses."',doYouCurrentlyWearContacts = '".$doYouCurrentlyWearContacts."', whatKind = '".$whatKind."', solutionUsed = '".$solutionUsed."', satisfied_vision = '".$satisfied_vision."', wouldYouPreferClear = '".$wouldYouPreferClear."', doyouUseTheComputer = '".$doyouUseTheComputer."', appr_hrs_day = '".$appr_hrs_day."', ocupation = '".$ocupation."', ocularsymptoms ='".$ocularsymptoms_sym."',codeval='".$codeval."', randomId ='".$rand1."' ";
                  $info_data4 = $crud->execute($eye_hst_ins);

            }
         
    

                  // ---------Family Eye  Medical History------------------
                  $randomId_fam_eye = substr(uniqid(), 0,10);
                  for ($k=1; $k <= 10 ; $k++) {
             $family_Id      = $_POST['familyMed_Id'.$k]; 
             $family_Status  = $_POST['familyMedStatus'.$k]; 
             $Forwhom        = $_POST['whom'.$k];
              $rand2 = $randomId_fam_eye.$k;
            
           $family_eye_hst_ins = "insert into family_eye_history set patient_Id = '".$pid."',patient_number ='".$patient_number."', familyMed_Id = '".$family_Id."', familyMedStatus ='".$family_Status."',whom = '".$Forwhom."',codeval='".$codeval."', randomId ='".$rand2."' ";
             $info_data5 = $crud->execute($family_eye_hst_ins);
                  }
        

        //-------------------------OFFICE DETAILS--------------------
     if($policies != ''){

          $ins_offc ="INSERT INTO office_details SET patient_Id = '".$pid."',patient_number ='".$patient_number."', agree_tc='".$policies."',sign='".$nama_file2."',date='".$policie_date."',codeval='".$codeval."',patient_sign='".$nama_file3."', randomId='".$randomId."'";
        $off_data = $crud->execute($ins_offc);
         }

// exit;
        if($info_data1 && $info_data2 && $info_data3 && $info_data4 && $info_data5 && $off_data){
            echo "true";
          }else{
            echo "false";
          }



}


if (isset($_POST['action']) && $_POST['action'] == 'Getcity'){ 

    $sel_area = "SELECT * FROM cities WHERE state_id = '".$_POST['B']."' ORDER BY id asc"; 

    $area_data = $crud->getData($sel_area);

    $response = array(
        "draw" => 1,
        "recordsTotal" => count($area_data),
        "data" => $area_data
    );
    echo json_encode($response);
}

 ?>