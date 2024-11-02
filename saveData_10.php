<?php
print_r($_POST);


 	include("crudop/crud.php");
    $crud = new Crud();
  //echo "test";
 
	 $towhom=isset($_POST['towhom']) ? $_POST['towhom']:'';
    
	$patientFname=isset($_POST['patientFname']) ? trim($_POST['patientFname']):'';
	$plasLtname=isset($_POST['plasLtname']) ? trim($_POST['plasLtname']):'';
	$patDob=isset($_POST['patDob']) ? trim($_POST['patDob']):'';
	$homeph=isset($_POST['homeph']) ? trim($_POST['homeph']):'';
	$workNo=isset($_POST['workNo']) ? trim($_POST['workNo']):'';
	$cell=isset($_POST['cell']) ? trim($_POST['cell']):'';
	$email=isset($_POST['email']) ? trim($_POST['email']):'';
	$address=isset($_POST['address']) ? trim($_POST['address']):'';
	$city=isset($_POST['city']) ? trim($_POST['city']):'';
	$state=isset($_POST['state']) ? trim($_POST['state']):'';
	$zipCode=isset($_POST['zipCode']) ? trim($_POST['zipCode']):'';	
	$insFname=isset($_POST['insFname']) ? trim($_POST['insFname']):'';
	$insLname=isset($_POST['insLname']) ? trim($_POST['insLname']):'';
	$dob=isset($_POST['dob']) ? trim($_POST['dob']):'';
	$payment = isset($_POST['payment']) ? trim($_POST['payment']):'';
	$grouponcode = isset($_POST['grouponcode']) ? trim($_POST['grouponcode']):'';	
	$office=isset($_POST['office']) ? trim($_POST['office']):'';
	$physicianName=isset($_POST['physicianName']) ? trim($_POST['physicianName']):'';
	$physicianCity=isset($_POST['physicianCity']) ? trim($_POST['physicianCity']):'';
	$checkUplDate=isset($_POST['checkUplDate']) ? trim($_POST['checkUplDate']):'';
	$currentMed=isset($_POST['currentMed']) ? trim($_POST['currentMed']):'';
	$allergyMedication=isset($_POST['allergyMedication']) ? trim($_POST['allergyMedication']):'';		
	$allergyMedicationText=isset($_POST['allergyMedicationText']) ? trim($_POST['allergyMedicationText']):'';
	$anySurgeries=isset($_POST['anySurgeries']) ? trim($_POST['anySurgeries']):'';	
	$asecigarettes=isset($_POST['asecigarettes']) ? trim($_POST['asecigarettes']):'';

		$dateOfLastEyeExam             =isset($_POST['dateOfLastEyeExam']) ? trim($_POST['dateOfLastEyeExam']):'';
	$doYouCurrentlyWearGlasses     =isset($_POST['doYouCurrentlyWearGlasses']) ? trim($_POST['doYouCurrentlyWearGlasses']):'';

	$doYouCurrentlyWearContacts    =isset($_POST['doYouCurrentlyWearContacts']) ? trim($_POST['doYouCurrentlyWearContacts']):'';
	
	$whatKind                      =isset($_POST['whatKind']) ? trim($_POST['whatKind']):'';
	$solutionUsed                  =isset($_POST['solutionUsed']) ? trim($_POST['solutionUsed']):'';
	$areYousatiesfiedWithTheVision =isset($_POST['areYousatiesfiedWithTheVision']) ? trim($_POST['areYousatiesfiedWithTheVision']):'';
	$wouldYouPreferClear           =isset($_POST['wouldYouPreferClear']) ? trim($_POST['wouldYouPreferClear']):'';
	$doyouUseTheComputer           =isset($_POST['doyouUseTheComputer']) ? trim($_POST['doyouUseTheComputer']):'';
	$ApproxhowManyHoursaDay        =isset($_POST['ApproxhowManyHoursaDay']) ? trim($_POST['ApproxhowManyHoursaDay']):'';
	$ocupation                     =isset($_POST['ocupation']) ? trim($_POST['ocupation']):'';

	$ocularsymptoms = 


	for($i=1;$i<=24;$i++)
	{
		//echo "kkkkkk";
			$columnId=isset($_POST['columnId.$i']) ? trim($_POST['columnId.$i']):'';
			echo $columnId;
			echo "<br>";
	}
	/*$columnId1=isset($_POST['columnId1']) ? trim($_POST['columnId1']):'';
	$columnId2=isset($_POST['columnId2']) ? trim($_POST['columnId2']):'';
	$columnId3=isset($_POST['columnId3']) ? trim($_POST['columnId3']):'';
	$columnId4=isset($_POST['columnId4']) ? trim($_POST['columnId4']):'';
	$columnId5=isset($_POST['columnId5']) ? trim($_POST['columnId5']):'';
	$typevalue5	=isset($_POST['typevalue5	']) ? trim($_POST['typevalue5	']):'';
	$columnId6=isset($_POST['columnId6']) ? trim($_POST['columnId6']):'';
	$columnId7=isset($_POST['columnId7']) ? trim($_POST['columnId7']):'';
	$columnId8=isset($_POST['columnId8']) ? trim($_POST['columnId8']):'';
	$columnId9=isset($_POST['columnId9']) ? trim($_POST['columnId9']):'';
	$columnId10=isset($_POST['columnId10']) ? trim($_POST['columnId10']):'';
	$columnId11=isset($_POST['columnId11']) ? trim($_POST['columnId11']):'';
	$columnId12=isset($_POST['columnId12']) ? trim($_POST['columnId12']):'';
	$columnId13=isset($_POST['columnId13']) ? trim($_POST['columnId13']):'';
	$columnId14=isset($_POST['columnId14']) ? trim($_POST['columnId14']):'';
	$columnId15=isset($_POST['columnId15']) ? trim($_POST['columnId15']):'';
	$columnId16=isset($_POST['columnId16']) ? trim($_POST['columnId16']):'';
	$columnId17=isset($_POST['columnId17']) ? trim($_POST['columnId17']):'';
	$columnId18=isset($_POST['columnId18']) ? trim($_POST['columnId18']):'';
	$columnId19=isset($_POST['columnId19']) ? trim($_POST['columnId19']):'';
	$columnId20=isset($_POST['columnId20']) ? trim($_POST['columnId20']):'';
	$columnId21=isset($_POST['columnId21']) ? trim($_POST['columnId21']):'';
	$columnId22=isset($_POST['columnId22']) ? trim($_POST['columnId22']):'';
	$columnId23=isset($_POST['columnId23']) ? trim($_POST['columnId23']):'';
	$columnId24=isset($_POST['columnId24']) ? trim($_POST['columnId24']):'';*/	
	$columnId25=isset($_POST['columnId25']) ? trim($_POST['columnId25']):'';
	$whomvalue1=isset($_POST['whomvalue1']) ? trim($_POST['whomvalue1']):'';
	$whomvalue2=isset($_POST['whomvalue2']) ? trim($_POST['whomvalue2']):'';
	$whomvalue3=isset($_POST['whomvalue3']) ? trim($_POST['whomvalue3']):'';
	$whomvalue4=isset($_POST['whomvalue4']) ? trim($_POST['whomvalue4']):'';
	$whomvalue5=isset($_POST['whomvalue5']) ? trim($_POST['whomvalue5']):'';
	$whomvalue6=isset($_POST['whomvalue6']) ? trim($_POST['whomvalue6']):'';
	$whomvalue7=isset($_POST['whomvalue7']) ? trim($_POST['whomvalue7']):'';
	$whomvalue8=isset($_POST['whomvalue8']) ? trim($_POST['whomvalue8']):'';
	$whomvalue9=isset($_POST['whomvalue9']) ? trim($_POST['whomvalue9']):'';
	$familyMedStatus10=isset($_POST['familyMedStatus10']) ? trim($_POST['familyMedStatus10']):'';
	$whomvalue10=isset($_POST['whomvalue10']) ? trim($_POST['whomvalue10']):'';
	$randomId=substr(uniqid(), 0,10);

if (isset($_POST['action'])  && $_POST['action']=='saveData') {
 	echo "good";
}

?>