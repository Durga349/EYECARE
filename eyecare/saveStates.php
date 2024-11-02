<?php
session_start();
include_once("crudop/crud.php");
$crud = new Crud();
  
 $tableName = 'states'; 
 $state_name  = isset($_POST['state_name']) ? $_POST['state_name'] : '';
 $random_id = substr(uniqid(),0,10);
 $hdn_id    = isset($_POST['hdn_id']) ? $_POST['hdn_id'] : ''; 

   if (isset($_POST['action']) && $_POST['action'] == 'save'){   

        $ins_sql = "insert into ".$tableName." set state_name='".$state_name."',random_id='".$random_id."'";
     //exit;  
        $stat_data = $crud->execute($ins_sql);
        if ($stat_data) {
         echo "true";
        }else{
          echo "false";
        }

      }
     
// --------------------------Show-data-----------------------------------
  if (isset($_POST['action']) && $_POST['action'] == 'show'){ 

          $stdshow = "SELECT * FROM ".$tableName." order by id desc";  
         //exit;   
        $stdshow_data = $crud->getData($stdshow); 
       $response = array(
        "draw" => 1,
        "recordsTotal" => count($stdshow_data),
        "data" => $stdshow_data
    );

    echo json_encode($response);
 }

/*------------------------------------edit-----------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'edit'){
    
 $edit_sql = "select * from  ".$tableName." where id = ".$_POST['id'];
     
     //exit;
        $edit_data = $crud->getData($edit_sql);
    
        if ($edit_data){
            echo json_encode($edit_data);
        }
        else{
            echo "false";
          // echo "<script>alert('deleted successfully...!'); location.href='manageRoles.php'</sctipt>";
        }
    }
/*----------------Update--------------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'update'){  
  //print_r($_POST);
  // exit;
 
    $roleupdate = "update ".$tableName." set  state_name='".$state_name."' where id ='".$_POST['hdn_id']."'";
//exit;
  $stdupdate_data = $crud->execute($roleupdate);
 
      if ($stdupdate_data){
          echo "true";
        }else{
          echo "false";
         }

 }

// ----------------------------Delete--------------------------------------
  if (isset($_POST['action']) && $_POST['action'] == 'delete'){

   $roledelete = "delete from ".$tableName." where id='".$_POST['id']."'";
    $role_data = $crud->execute($roledelete);
    
        if ($role_data){
          echo "true";
         }else{
          echo "false";
         }
 }
// ------------------------View-data--------------------------------
  if (isset($_POST['action']) && $_POST['action'] == 'view'){

    $anti_sql = "select * from ".$tableName."  where id = '".$_POST['id']."' ";
 
     
     $anti_data = $crud->getData($anti_sql);
    
        if ($anti_data){
            
            echo json_encode($anti_data);
        }
        else{
            echo "false";
        }
    }
?>