<?php 
	session_start();

	error_reporting(E_ALL);
    ini_set('display_errors', 1);	

 	include("crudop/crud.php");
    $crud = new Crud();

     // ------------------------------UPDATE----------------------------------------------------

    if (isset($_POST['action']) && $_POST['action'] == 'update') 
    {


   /* 	print_r($_POST);
    	 exit;*/
/* Personal Information */
				$towhom                 =isset($_POST['towhom']) ? $_POST['towhom']:'';
				$patient_number            =isset($_POST['patient_number']) ? $_POST['patient_number']:'';
				$insSubscribers          =isset($_POST['insSubscribers']) ? $_POST['insSubscribers']:''; 
				$codeval                 =isset($_POST['codeval']) ? $_POST['codeval']:'';   
				$patientFname            =isset($_POST['patientFname']) ? trim($_POST['patientFname']):'';
				$plasLtname              =isset($_POST['plasLtname']) ? trim($_POST['plasLtname']):'';
				$gender                  =isset($_POST['gender']) ? trim($_POST['gender']):'';
				$patDob                  =isset($_POST['patDob']) ? trim($_POST['patDob']):'';
				$homeph                  =isset($_POST['homeph']) ? trim($_POST['homeph']):'';
				$workNo                  =isset($_POST['workNo']) ? trim($_POST['workNo']):'';
				$cell                    =isset($_POST['cell']) ? trim($_POST['cell']):'';
				$email                   =isset($_POST['email']) ? trim($_POST['email']):'';
				$address                 =isset($_POST['address']) ? trim($_POST['address']):'';
				$city                    =isset($_POST['city']) ? trim($_POST['city']):'';
				$state                   =isset($_POST['state']) ? trim($_POST['state']):'';
				$zipCode                 =isset($_POST['zipCode']) ? trim($_POST['zipCode']):'';	
				$insFname                =isset($_POST['insFname']) ? trim($_POST['insFname']):'';
				$insLname                =isset($_POST['insLname']) ? trim($_POST['insLname']):'';
				$dob                     =isset($_POST['dob']) ? trim($_POST['dob']):'';
				$payment                 = isset($_POST['payment']) ? trim($_POST['payment']):'';
				$grouponcode             = isset($_POST['grouponcode']) ? trim($_POST['grouponcode']):'';	
				$insurance               =isset($_POST['insurance']) ? trim($_POST['insurance']):'';	
				$office                  =isset($_POST['office']) ? trim($_POST['office']):'';
				$sign_pat             	 =isset($_POST['sign_pat']) ? trim($_POST['sign_pat']):'';
				$date_pat                =isset($_POST['date_pat']) ? trim($_POST['date_pat']):'';
				$represent_name           =isset($_POST['represent_name']) ? trim($_POST['represent_name']):'';
				$pat_agree_tc = implode(',', $_POST['pat_agree_tc']);
				$signature                  =isset($_POST['signature']) ? trim($_POST['signature']):'';
				$date_pre                  =isset($_POST['date_pre']) ? trim($_POST['date_pre']):'';

	/* Personal Information */

	$physicianName           =isset($_POST['physicianName']) ? trim($_POST['physicianName']):'';
	$physicianCity           =isset($_POST['physicianCity']) ? trim($_POST['physicianCity']):'';
	$checkUplDate            =isset($_POST['checkUplDate']) ? trim($_POST['checkUplDate']):'';
	$currentMed              =isset($_POST['currentMed']) ? trim($_POST['currentMed']):'';
	$allergyMedication       =isset($_POST['allergyMedication']) ? trim($_POST['allergyMedication']):'';		
	$allergyMedicationText   =isset($_POST['allergyMedicationText']) ? trim($_POST['allergyMedicationText']):'';
	$anySurgeries            =isset($_POST['anySurgeries']) ? trim($_POST['anySurgeries']):'';	
	$asecigarettes           =isset($_POST['asecigarettes']) ? trim($_POST['asecigarettes']):'';

	$dateOfLastEyeExam       =isset($_POST['dateOfLastEyeExam']) ? trim($_POST['dateOfLastEyeExam']):'';
	$doYouCurrentlyWearGlasses     =isset($_POST['doYouCurrentlyWearGlasses']) ? trim($_POST['doYouCurrentlyWearGlasses']):'';

	$doYouCurrentlyWearContacts    =isset($_POST['doYouCurrentlyWearContacts']) ? trim($_POST['doYouCurrentlyWearContacts']):'';
	
	$whatKind                      =isset($_POST['whatKind']) ? trim($_POST['whatKind']):'';
	$solutionUsed                  =isset($_POST['solutionUsed']) ? trim($_POST['solutionUsed']):'';
	$satisfied_vision =isset($_POST['satisfied_vision']) ? trim($_POST['satisfied_vision']):'';
	$wouldYouPreferClear = isset($_POST['wouldYouPreferClear']) ? $_POST['wouldYouPreferClear'] : '';

    // $wouldYouPreferClear =$_POST['wouldYouPreferClear'];
	$doyouUseTheComputer           =isset($_POST['doyouUseTheComputer']) ? trim($_POST['doyouUseTheComputer']):'';
	$appr_hrs_day        =isset($_POST['appr_hrs_day']) ? trim($_POST['appr_hrs_day']):'';
	$ocupation                     =isset($_POST['ocupation']) ? trim($_POST['ocupation']):'';


	$agree_tc = implode(',', $_POST['agree_tc']);	

	$sign  =isset($_POST['sign']) ? trim($_POST['sign']):'';
	$date  =isset($_POST['date']) ? trim($_POST['date']):'';
	$patient_sign  =isset($_POST['patient_sign']) ? trim($_POST['patient_sign']):'';
	$randomId       =substr(uniqid(), 0,10);
	$hid_mast_id = isset($_POST['hid_mast_id']) ? trim($_POST['hid_mast_id']):'';
	$hid_pet_id = isset($_POST['hid_pet_id']) ? trim($_POST['hid_pet_id']):'';
	$hid_OFFICE_id = isset($_POST['hid_OFFICE_id']) ? trim($_POST['hid_OFFICE_id']):'';
	$hidden_date = isset($_POST['hidden_date']) ? trim($_POST['hidden_date']):'';
	$ocularsymptom = isset($_POST["ocularsymptoms"]) ? ($_POST["ocularsymptoms"]):[];
	$hid_patient_id = isset($_POST["hid_patient_id"]) ? ($_POST["hid_patient_id"]):'';
	
	
	$sm ="select MAX(ID) as mxid FROM personal_information";
        
        $slm_data = $crud->getData($sm); 
         
         if($slm_data ==''){
            $mid = '1';
        }else{
        
        $mid = $slm_data[0]['mxid']+1;
            
        }
         $pid ='PATIENT'.$mid;



           //DIGITAL SIGNATURE
 	$sign_targetDir = "signatures/";

 	if(isset($_POST['hdn_signature']) && $_POST['hdn_signature'] !=""){

 	$sig_string=$_POST['hdn_signature']; 
    $nama_file=$sign_targetDir."signature_".date("his").".png";	
	file_put_contents($nama_file, file_get_contents($sig_string));

	}else{         
        $nama_file =isset($_POST['edit_extimage']) ? $_POST['edit_extimage'] :'';
      }

   //DIGITAL SIGNATURE1
 	if(isset($_POST['signature']) && $_POST['signature'] != ""){

 	$sig_string1=$_POST['signature']; 
    $nama_file1=$sign_targetDir."signature1_".date("his").".png";	
	file_put_contents($nama_file1, file_get_contents($sig_string1));
	}else{         
        $nama_file1 =isset($_POST['edit_extimage1']) ? $_POST['edit_extimage1'] :'';
      }
   //DIGITAL SIGNATURE2
 	if(isset($_POST['sign']) && $_POST['sign'] != ""){

 	$sig_string2=$_POST['sign']; 
     $nama_file2=$sign_targetDir."signature2_".date("his").".png";	
	file_put_contents($nama_file2, file_get_contents($sig_string2));
	}else{         
        $nama_file2 =isset($_POST['edit_extimage2']) ? $_POST['edit_extimage2'] :'';
      }
   //DIGITAL SIGNATURE3
    if(isset($_POST['patient_sign']) && $_POST['patient_sign'] != ""){

 	$sig_string3=$_POST['patient_sign']; 
    $nama_file3=$sign_targetDir."signature3_".date("his").".png";	
	file_put_contents($nama_file3, file_get_contents($sig_string3));
	}else{         
        $nama_file3 =isset($_POST['edit_extimage3']) ? $_POST['edit_extimage3'] :'';
     }


$num_sets =6;

	for ($i = 1; $i <= $num_sets; $i++) {

	 	     $per_info = $_POST['per_info' . $i];
             $table = $_POST['table' . $i];

	  $insert_data ="insert into patient_reportdata set date ='".$hidden_date ."',data ='".$per_info."',tablename ='".$table."',patient_id='".$hid_patient_id."',patient_number ='".$_POST['hid_pe_id']."',ssn_no ='".$_POST['hid_codeval']."', randomId ='".$randomId."'";
// exit;
	$resultData =$crud->execute($insert_data);
    }

// ------------Patient Personal Information---------------------------- 

      $UPD_pat_info ="update personal_information SET patient_Id='".$hid_patient_id."',toWhom='".$towhom."', patient_number = '".$patient_number."', insSubscribers='".$insSubscribers."',codeval='".$codeval."',patientFname='".$patientFname."',plasLtname='".$plasLtname."',gender='".$gender."',patDob='".$patDob."',homeph='".$homeph."',workNo='".$workNo."',cell='".$cell."',email='".$email."',address='".$address."',city='".$city."',state='".$state."',zipCode='".$zipCode."',insFname='".$insFname."',insLname='".$insLname."',dob='".$dob."',grouponcode='".$grouponcode."',payment='".$payment."',insurance='".$insurance."',office='".$office."', sign = '".$nama_file."', date = '".$date_pat."', represent_name = '".$represent_name."', pat_agree_tc = '".$pat_agree_tc."', signature = '".$nama_file1."', datePre = '".$date_pre."' where randomId='".$hid_pet_id."'";
 //exit;
 $upPerData = $crud->execute($UPD_pat_info);


//----------Patient Medical History---------------------------------
 
 for ($j=1; $j <= 24 ; $j++) { 

 	 $genHealthStatus = $_POST['genHealthStatus'.$j];
 	 $typevalue = $_POST['typevalue'];	
 	 $genHealth_Id 	=$_POST['genHealth_Id'.$j];
 	 $hid_gena_hel_id = $_POST['hid_gena_hel_id'.$j];

 	
	if($genHealthStatus != '' ){
      $upd_med_his_ins="UPDATE patient_medical_history SET patient_Id='".$hid_patient_id."',physicianName='".$physicianName."',physicianCity='".$physicianCity."',checkUplDate='".$checkUplDate."',currentMed='".$currentMed."',allergyMedication='".$allergyMedication."',allergyMedicationText='".$allergyMedicationText."',anySurgeries='".$anySurgeries."',asecigarettes='".$asecigarettes."',genHealthStatus='".$genHealthStatus."',genHealth_Id='".$genHealth_Id."', codeval='".$codeval."', patient_number = '".$patient_number."' WHERE randomId='".$hid_gena_hel_id."'"; 

    }if($genHealth_Id == 5){
      $upd_med_his_ins="UPDATE patient_medical_history set patient_Id='".$hid_patient_id."',typevalue = '".$typevalue."',physicianName='".$physicianName."',physicianCity='".$physicianCity."',checkUplDate='".$checkUplDate."',currentMed='".$currentMed."',allergyMedication='".$allergyMedication."',allergyMedicationText='".$allergyMedicationText."',anySurgeries='".$anySurgeries."',asecigarettes='".$asecigarettes."',genHealthStatus='".$genHealthStatus."',genHealth_Id='".$genHealth_Id."',codeval='".$codeval."', patient_number = '".$patient_number."'  WHERE randomId='".$hid_gena_hel_id."' ";
       	}

	$upMedData = $crud->execute($upd_med_his_ins);
 }
     // --Patient Eye History----------- 
 
 
  $hid_pe_id = $_POST['hid_pe_id'];
   $countval = count($ocularsymptom);

///////////////////////////delete previous one and insert the new one///////////////////////

   $delete_patient_eye_hostory = "delete from patient_eye_history where patient_number ='".$hid_pe_id."'";
   $delete_data_eye_history = $crud->execute($delete_patient_eye_hostory);

   for ($k=0; $k < $countval; $k++) { 



  $randomId_eye = substr(uniqid(), 0,10);
  $rand = $randomId_eye.$k;

   $ocularsymptoms_sym  = $ocularsymptom[$k];

     $eye_hst_ins = "insert into patient_eye_history set patient_Id='".$hid_patient_id."',patient_number = '".$hid_pe_id."',dateOfLastEyeExam ='".$_POST['dateOfLastEyeExam']."',doYouCurrentlyWearGlasses = '".$doYouCurrentlyWearGlasses."',doYouCurrentlyWearContacts = '".$doYouCurrentlyWearContacts."', whatKind = '".$whatKind."', solutionUsed = '".$solutionUsed."', satisfied_vision = '".$satisfied_vision."', wouldYouPreferClear = '".$wouldYouPreferClear."', doyouUseTheComputer = '".$doyouUseTheComputer."', appr_hrs_day = '".$appr_hrs_day."', ocupation = '".$ocupation."', ocularsymptoms ='".$ocularsymptoms_sym."',codeval='".$codeval."',randomId ='".$rand."' ";
      // exit;
          
    $ins_data = $crud->execute($eye_hst_ins);
 


 
 
 }


 // -----------------------Family Eye History--------------------------------------- 

for ($m=1; $m<= 10 ; $m++) { 


	    $familyMedStatus        =isset($_POST['familyMedStatus'.$m]) ? $_POST['familyMedStatus'.$m]:'';
	    $familyMed_Id           =isset($_POST['familyMed_Id'.$m]) ? $_POST['familyMed_Id'.$m]:'';
	    $whom                  =isset($_POST['whom'.$m]) ? $_POST['whom'.$m]:'';

	   
	     
	  $hid_fam_eye_his_id = $_POST['hid_fam_eye_his_id'.$m];


 	 if($familyMedStatus != '' && $whom != '' ){
  $UPD_family_eye_hst = "UPDATE  family_eye_history SET patient_Id='".$hid_patient_id."',codeval='".$codeval."', familyMed_Id = '".$familyMed_Id."', familyMedStatus ='".$familyMedStatus."',whom = '".$whom."', patient_number = '".$_POST['hid_pe_id']."' WHERE randomId ='".$hid_fam_eye_his_id."'";
   $upFamData = $crud->execute($UPD_family_eye_hst);
       //exit;
   }
       
 }


 //-------------------------OFFICE DETAILS--------------------
 if($agree_tc != ''){

     $upd_offc ="Update office_details SET patient_Id='".$hid_patient_id."',agree_tc='".$agree_tc."',sign='".$nama_file2."',date='".$date."',codeval='".$codeval."', patient_number = '".$_POST['hid_pe_id']."', patient_sign='".$nama_file3."' where id='".$hid_OFFICE_id."'";
  // exit;
    $upOfficeData = $crud->execute($upd_offc);
 }
     


  if($upPerData && $upMedData && $upFamData && $upOfficeData){
    echo "true";

  }else{
    echo "error";
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