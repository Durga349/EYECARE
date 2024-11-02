<?php
include('crudop/crud.php');
$crud= new crud();
$tablename="personal_information";

// =======================SHOW==========
if (isset($_POST['action']) && $_POST['action'] == 'show'){
   // $general_hel_show = "SELECT * FROM ".$tablename."  ORDER BY id DESC";

      $users_show = "SELECT pi.id,rd.towhom,pi.toWhom as pwhom, pi.patient_Id, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId FROM `personal_information` pi left join relations_details rd on pi.toWhom = rd.id";

      $show_data = $crud->getData($users_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
 }
 // =======Recent Users show==================
 if (isset($_POST['action']) && $_POST['action'] == 'recent_show'){

     /////////////////////////weekly users/////////////////////////
    
                 //$general_hel_show1 = "SELECT distinct(codeval), plasLtname plasLtname, dob, cell, toWhom,city, state,id, date FROM personal_information WHERE WEEKOFYEAR(date) = WEEKOFYEAR(NOW())";

                     $general_hel_show1 = "SELECT pi.id,rd.towhom,pi.toWhom as pwhom, pi.patient_Id, pi.insSubscribers, pi.codeval, pi.patientFname, pi.plasLtname, pi.gender, pi.patDob, pi.homeph, pi.workNo, pi.cell, pi.email, pi.address, pi.city, pi.state, pi.zipCode, pi.insFname, pi.insLname, pi.dob, pi.payment, pi.grouponcode, pi.insurance, pi.office, pi.sign, pi.date, pi.represent_name, pi.pat_agree_tc, pi.signature, pi.datePre, pi.status, pi.randomId FROM `personal_information` pi left join relations_details rd on pi.toWhom = rd.id WHERE WEEKOFYEAR(date) = WEEKOFYEAR(NOW())";
                     $show_data1 = $crud->getData($general_hel_show1);
                     $response = array(
                      "draw" => 1,
                      "recordsTotal" => count($show_data1),
                      "data" => $show_data1
                    );
                     echo json_encode($response);


        }
// =============================DELETE=================

if (isset($_POST['action']) && $_POST['action'] == 'delete'){

$DELETE_qry="DELETE FROM ".$tablename." WHERE columnId= ".$_POST['columnId']." ";
     $dele_result = $crud->execute($DELETE_qry);

    if ($dele_result) {
        echo "true";
    } else {
        echo "false";
    }
}
?>