<?php
session_start();
include_once("crudop/crud.php");
$crud = new crud();

if(isset($_POST['action']) && $_POST['action'] == 'login'){
	extract($_POST);
	$username = isset($username) ? $username :'';
	$password = isset($password) ? $password : '';
    // $user_type = isset($user_type) ? $user_type : '';
    //echo $user_type;

 $res_sql = "select * from logins where username = '".$username."' and password = '".$password."' and encpassword = '".sha1($_POST['password'])."'";
	
    $res_data = $crud->getData($res_sql);
   
	if (count($res_data) > 0){
    $_SESSION['username'] = $res_data[0]['username'];
    $_SESSION['password'] = $res_data[0]['password'];
    // $_SESSION['user_type'] = $res_data[0]['user_type'];

    echo "true";
     }else{
     	echo "false";
     }
}

if (isset($_POST['action']) && $_POST['action'] == 'changePass'){

     $updatePass = "update logins set encpassword = '".sha1($_POST['password'])."', password = '".$_POST['password']."' where id = " . $_POST['id'];
        //exit;
       $da = $crud->execute($updatePass);

        if ($da){
            echo "true";
        }
        else{
            echo "false";
        }
    }

?>