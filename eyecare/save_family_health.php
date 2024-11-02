<?php
include('crudop/crud.php');
$crud= new crud();
$tablename="familyhistory";
// print_r($_POST);
// exit;

    $fieldName    = isset($_POST['fieldName'])?$_POST['fieldName']:'';
    $Name         = isset($_POST['displayFieldName'])?$_POST['displayFieldName']:'';
    $dispStatus   = isset($_POST['dispStatus'])?$_POST['dispStatus']:'';
    $HIDD_ID      = isset($_POST['hid_id'])?$_POST['hid_id']:'';

     $randomId=substr(uniqid(),0,10);

 $selttable ="SELECT MAX(columnId) as id FROM generalhealth";
    $gettabledata=$crud->getData($selttable);
    $priority = $gettabledata[0]['id'] + 1;

// ============================Save===================================================

 if (isset($_POST["action"]) && $_POST['action'] == 'Save') {
$teat  = implode(",", $_POST["whom"]);
     $ins_fam_his = "INSERT INTO ".$tablename." SET fieldName = '".$fieldName."',displayFieldName='".$fieldName."',priority='".$priority."',whom = '".$teat."',randomId='".$randomId."' "; 
        // exit; 
       $fam_data = $crud->execute($ins_fam_his);
       if ($fam_data) {

                echo "true";
            }else{
                echo "false";
            }         
}

// =================================SHOW=======================================================

if (isset($_POST['action']) && $_POST['action'] == 'show'){
    $Family_his_show = "SELECT * FROM ".$tablename."  ORDER BY columnId DESC";
      $show_data = $crud->getData($Family_his_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
 }

 // =============================DELETE====================================================

if (isset($_POST['action']) && $_POST['action'] == 'delet'){

$DEL_qry="DELETE FROM ".$tablename." WHERE columnId= ".$_POST['columnId']." ";
     $del_result = $crud->execute($DEL_qry);

    if ($del_result) {
        echo "true";
    } else {
        echo "false";
    }
}


// =============================UPDATE=========================================================
 if (isset($_POST["action"]) && $_POST['action'] == 'update') {

$teat  = implode(",", $_POST["whom"]);

        $upd_family = "UPDATE ".$tablename." SET fieldName = '".$fieldName."',displayFieldName='".$Name."',dispStatus='".$dispStatus."',whom = '".$teat."' WHERE columnId ='".$HIDD_ID."' "; 
       
       $upd_data = $crud->execute($upd_family);
       if ($upd_data) {

                echo "true";
            }else{
                echo "false";
            }         
}

?>