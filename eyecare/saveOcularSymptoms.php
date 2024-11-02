<?php
include('crudop/crud.php');
$crud= new crud();
$tablename="ocularsymptoms";
// print_r($_POST);
// exit;
  $fieldName       =isset($_POST['Name']) ? $_POST['Name']:'';
  $displayFieldName=isset($_POST['FieldName']) ? $_POST['FieldName']:'';
  $type            =isset($_POST['type1']) ? $_POST['type1']:'';
  $typevalues      =isset($_POST['typevalue']) ? $_POST['typevalue']:'';
  $dispStatus      =isset($_POST['dispStatus']) ? $_POST['dispStatus']:'';
  $hid          =isset($_POST['hid']) ? $_POST['hid']:'';
 
 $randomId=substr(uniqid(),0,10);

 $selttable ="SELECT MAX(columnId) as id FROM ocularsymptoms";
    $gettabledata=$crud->getData($selttable);
    $priority = $gettabledata[0]['id'] + 1;

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
 // ===============================Insert===================================================
if (isset($_POST['action']) && $_POST['action'] == 'save'){
 $insert_qry="INSERT INTO ".$tablename." SET  fieldName ='".$fieldName."',displayFieldName ='".$displayFieldName."',type ='".$type."',typevalues ='".$typevalues."',priority='".$priority."',randomId ='".$randomId."' ";
  $result =$crud->execute($insert_qry);
  if($result){
    echo "true";

  }else{
    echo "error";
  }

}
// =====================================Update============================================
if (isset($_POST['action']) && $_POST['action'] == 'update'){

  $upd_qry="UPDATE ".$tablename." SET  fieldName ='".$fieldName."',displayFieldName ='".$displayFieldName."',type ='".$type."',typevalues ='".$typevalues."',dispStatus='".$dispStatus."'  WHERE columnId ='".$hid."' ";

  $updat_qry =$crud->execute($upd_qry);
  if($updat_qry){
    echo "true";

  }else{
    echo "error";
  }

}

// =============================DELETE====================================================

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