<?php include "includes/header.php"; 

$table = 'logins';

$user_query = "select * from ".$table." where username = '".$_SESSION['username']."'";
//exit;
$user_data = $crud->getData($user_query);

?>


	<?php include "includes/navbar.php";?>



	<!-- Sidebar -->
	<?php include "includes/sidebar.php";?>
	<!-- Sidebar -->
	<div class="mobile-menu-overlay"></div>

	<div class="main-container h-100">
		<br>
		<br>
		<div class="pd-ltr-20">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="vendors/images/forgot-password.png" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Change Password</h2>
						</div>
						
						<form >
							<input type = "hidden" id = "hdn_id" value = "<?php echo @$user_data[0]['id'] ?>"/>
							<div class="input-group custom">
								<input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="UserName" value = "<?php echo $user_data[0]['username'] ?>" readonly = "true">
								<div class="input-group-append custom">								
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" name="password" id="password" class="form-control form-control-lg" placeholder="New Password" value = "<?php echo $user_data[0]['password'] ?>">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" name="confpassword" id="confpassword" class="form-control form-control-lg" placeholder="Confirm New Password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
										-->
										<button type="button" class="btn btn-primary" onclick = "jFUpdate()" style = "float: right;">Update</button>
										<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Submit</a> -->
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		
			
			
		</div>
	</div>
	<!-- js -->
	<!-- Footer -->
			<?php include "includes/footer.php"; ?>

<script type="text/javascript">
	function jFUpdate()
    {
      //alert("hii");
        let password = $('#password').val();
        let confpassword = $('#confpassword').val();
        let hdn_id = $('#hdn_id').val();
        if(password != confpassword)
        {
           toastr.error("password and confirm password not matched !"); 
        }else 
        {

        $.ajax({
            url : 'logindata.php',
            type : 'POST',
            data : {'action' : 'changePass', 'password' : password , 'id' : hdn_id},
            success : function(data){
              
                if (data == "true"){
                 // alert("hii");
                    toastr.success("updated successfully...!");
                    setTimeout(function(){
                      location.reload();
                    },1000);
                }
                else{
                    toastr.error('error');
                }
            }
        });
    }
}
</script>