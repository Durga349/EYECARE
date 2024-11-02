<?php
include('crudop/crud.php');
$crud= new crud();
$tablename="visitors";
// print_r($_POST);
// exit;

// =================================SHOW=======================================================

if (isset($_POST['action']) && $_POST['action'] == 'show'){
    $general_hel_show = "SELECT * FROM ".$tablename." WHERE WEEKOFYEAR(date) = WEEKOFYEAR(NOW());";
      $show_data = $crud->getData($general_hel_show);        
       $response = array();
       $i = 0;
        foreach($show_data as $row){
            $i+15;
            $response['city'] = $row['city'];
             $response['cutomers'] = $i;
            
        }
       
       
       
    echo json_encode($response);
 }


?>