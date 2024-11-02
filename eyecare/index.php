<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>EyeCare Project</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- toastr -->
	
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>


	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<!-- <div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div>
		</div>
	</div> -->
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="pictures/eyecare.jpg" width=100% height=500px alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Admin Login</h2>
						</div>
						<form method="POST">
							<div class="select-role">
								
								<!-- <div class="btn-group btn-group-toggle col-8 d-flex justify-content-center" data-toggle="buttons" style="text-align: center;">
									<label class="btn active">
										<input type="radio" name="user_type" id="admin" value="admin" checked>
										<div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
										<span>Admin</span>
							
									</label>
									!-- <label class="btn">
										<input type="radio" name="user_type" id="user" value="user">
										<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
										<span>User</span>
										
									</label> -->
								<!-- </div> -->
								
							</div>
							<div class="input-group custom">
								<input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!-- <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="loginval()" name="submit" >Sign In</button> -->
										<a class="btn btn-primary btn-lg btn-block" href="#" onclick="loginval()" name="submit">Sign In</a>
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
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>

	<!-- toaster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>	

<script type="text/javascript">
  
  function validation() {
  	
    let username = $('#username').val();
    let password = $('#password').val();
    // let user_type = $('#user_type').val();

    if(username == ''){
      toastr.error("Enter Email...");
      $('#username').focus();
      return false;
    }else if(password == ''){
      toastr.error("Enter PassWord...");
      $('#password').focus();
      return false;
    }else{
      return true;
    }
  }
  
  function loginval(){
  	
    if(validation()){
      let username = $('#username').val();
      let password = $('#password').val();      
      // let user_type = $('input[name = "user_type"]:checked').val();   
      //alert(user_type);   
    	
    $.ajax({
        url : 'logindata.php',
        type : 'POST',
        data : {'action' : 'login','username' : username, 'password' : password},
        success : function(data){
          console.log(data);         
            if (data.trim() == "true"){
              //alert("hii");
              toastr.success("Login successfully...!");
              
              	window.location.href = "home.php";
                       
               
            }
            else{
              toastr.error('invalid logins');
            }
        }
    });
    }
  }
</script>