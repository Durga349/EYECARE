<?php

    session_start();



    include("crudop/crud.php");
    $crud = new Crud();



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