<?php
include('crudop/crud.php');
$crud= new crud();
$tablename="generalhealth";
// print_r($_POST);
// exit;
  $fieldName       =isset($_POST['fieldName']) ? $_POST['fieldName']:'';
  $displayFieldName=isset($_POST['displayFieldName']) ? $_POST['displayFieldName']:'';
  $type            =isset($_POST['type']) ? $_POST['type']:'';
  $typevalues      =isset($_POST['typevalues']) ? $_POST['typevalues']:'';
  $dispStatus      =isset($_POST['dispStatus']) ? $_POST['dispStatus']:'';
  $hid_ID          =isset($_POST['hid_ID']) ? $_POST['hid_ID']:'';
 
 $randomId=substr(uniqid(),0,10);

 $selttable ="SELECT MAX(columnId) as id FROM generalhealth";
    $gettabledata=$crud->getData($selttable);
    $priority = $gettabledata[0]['id'] + 1;
     // ===============================Insert===================================================
if (isset($_POST['action']) && $_POST['action'] == 'submit'){
 $ins_qry="INSERT INTO ".$tablename." SET  fieldName ='".$fieldName."',displayFieldName ='".$displayFieldName."',type ='".$type."',typevalues ='".$typevalues."',priority='".$priority."',randomId ='".$randomId."' ";

  $result_qry =$crud->execute($ins_qry);
  if($result_qry){
    echo "true";

  }else{
    echo "error";
  }

}

// =================================SHOW=======================================================

if (isset($_POST['action']) && $_POST['action'] == 'show'){
    $general_hel_show = "SELECT * FROM ".$tablename."  ORDER BY columnId DESC";
      $show_data = $crud->getData($general_hel_show);        
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($show_data),
        "data" => $show_data
    );
    echo json_encode($response);
 }

// =====================================Update============================================
if (isset($_POST['action']) && $_POST['action'] == 'update'){

  $update_qry="UPDATE ".$tablename." SET  fieldName ='".$fieldName."',displayFieldName ='".$displayFieldName."',type ='".$type."',typevalues ='".$typevalues."',dispStatus='".$dispStatus."'  WHERE columnId ='".$hid_ID."' ";

  $upd_qry =$crud->execute($update_qry);
  if($upd_qry){
    echo "true";

  }else{
    echo "error";
  }

}

// =============================DELETE====================================================

if (isset($_POST['action']) && $_POST['action'] == 'del'){

$DEL_qry="DELETE FROM ".$tablename." WHERE columnId= ".$_POST['columnId']." ";
     $del_result = $crud->execute($DEL_qry);

    if ($del_result) {
        echo "true";
    } else {
        echo "false";
    }
}
?>