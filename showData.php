<?php 

	session_start();	

 	include("crudop/crud.php");
    $crud = new Crud();

    if (isset($_POST['action']) && $_POST['action'] == 'show'){

	$plasLtname = $_POST['Lname'];
    $codeval_lastfour = $_POST['codeval_lastfour'];

	//$sel = "select * from personal_information where codeval = '".$Code."' and plasLtname = '".$plasLtname."' ";

	  $sel = "select * from personal_information where codeval like '".'%'.$codeval_lastfour."' and plasLtname = '".$plasLtname."' ";
	// exit;
	$result = $crud->getData($sel);

	if(count($result)>0){
		$_SESSION['codeval']=$result[0]['codeval'];	
		///////////////////////now save visitors
		$patient_id = $result[0]['patient_Id'];	
		$city = $result[0]['city'];	
		$vdate = date('Y-m-d');
		  $ins_visit_info ="INSERT INTO visitors SET patient_Id='".$patient_id."',city='".$city."',date='".$vdate."'";
   
  $ins_datav = $crud->execute($ins_visit_info);
		echo "true";
			}else 
			echo "false";

 }

 if (isset($_POST['action']) && $_POST['action'] == 'show_data'){


	//$sel_per_data = "select * from personal_information where codeval = '".$_SESSION['codeval']."' ";	
	$sel_per_data = "SELECT c.city_name,pi.id,rd.towhom,pi.toWhom as pwhom, pi.patient_Id, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId FROM `personal_information` pi left join relations_details rd on pi.toWhom = rd.id left join states as s on s.id =pi.state left join cities as c on c.state_id =pi.city WHERE codeval = '".$_SESSION['codeval']."' ";
	$result_per_data = $crud->getData($sel_per_data);
	
	$response = array(
        "draw" => 1,
        "recordsTotal" => count($result_per_data),
        "data" => $result_per_data
    );
    echo json_encode($response);

	

 }


 if (isset($_POST['action']) && $_POST['action'] == 'checkSSN') {
  
    $ssn_query = "select * from personal_information where codeval = '".$_POST['V']."'";
   // exit;
    $ssn_data = $crud->getData($ssn_query);

    if (count($ssn_data)>0){
      //echo "test";
      //exit;
      echo "true";
    }
    else{
      echo "false";
    }
  }



 if (isset($_POST['action']) && $_POST['action'] == 'showPatient') {

    // print_r($_POST);
    // exit;


    $patient_no = $_POST['patient_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $ssn_no = $_POST['ssn_no'];


    if ($patient_no != '' && $first_name != '' && $last_name !='' && $dob !='' && $ssn_no != '') {
       $condition = "where patient_number = '".$patient_no."' AND patientFname ='".$first_name."' AND  plasLtname='".$last_name."' AND patDob ='".$dob."' AND patient_ssn ='".$ssn_no."'";
    }else if ($patient_no != '' && $first_name != '' && $last_name !='') {
       $condition = "where patient_number = '".$patient_no."' AND patientFname ='".$first_name."' AND  plasLtname='".$last_name."'";
    }else if ($first_name != '' && $last_name !='' && $ssn_no != '') {
       $condition = "where patient_number = '".$patient_no."' AND patientFname ='".$first_name."' AND  plasLtname='".$last_name."'";
    }else if ($first_name != '' && $last_name !='' && $ssn_no != '') {
         $condition = "where patientFname ='".$first_name."' AND  plasLtname='".$last_name."' AND patient_ssn ='".$ssn_no."'";
    }else if ($patient_no != '' && $first_name != '') {
         $condition = "where patient_number = '".$patient_no."' AND patientFname ='".$first_name."'";
    }

    else if ($first_name != '' && $last_name !='') {
        $condition = "where patientFname ='".$first_name."' AND  plasLtname='".$last_name."'";
    }
    else if ($last_name != '' && $dob !='') {
        $condition = "where plasLtname='".$last_name."' AND patDob ='".$dob."'";
    }
   else if ($last_name !='' && $ssn_no != '') {
        $condition = "where plasLtname='".$last_name."' AND patient_ssn ='".$ssn_no."'";
    }else if ($last_name !='' && $patient_no != '') {
         $condition = "where plasLtname='".$last_name."' AND patient_number = '".$patient_no."'";
    }
    else if ($patient_no !='' && $dob != '') {
         $condition = "where patient_number = '".$patient_no."' AND patDob ='".$dob."'";
    }
     else if ($patient_no !='' && $ssn_no != '') {
         $condition = "where patient_number = '".$patient_no."' AND patient_ssn ='".$ssn_no."'";
    }
    else if ($dob !='' && $ssn_no != '') {
         $condition = "where patDob ='".$dob."' AND patient_ssn ='".$ssn_no."'";
    }
    else if ($patient_no != '') {
       $condition = "where patient_number = '".$patient_no."'";
    }
    else if ($first_name != '') {
       $condition = "where patientFname ='".$first_name."'";
    }
    else if ($last_name !='') {
        $condition = "where plasLtname='".$last_name."'";
    }
     else if ($dob !='') {
        $condition = "where patDob ='".$dob."'";
    }
    else if ($ssn_no !='') {
        $condition = "where patient_ssn ='".$ssn_no."'";
    }
 

      $users_show = "SELECT * FROM `personal_information` ". $condition." order by id desc";
 

      $show_data = $crud->getData($users_show);      

        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
 }


 ?>