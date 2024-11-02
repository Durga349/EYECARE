<!DOCTYPE html>
<html lang="en">
<head>
  <title>BROOKWOOD-EYECARE</title>
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

  <style type="text/css">
               
         .btn-grad {
            background-image: linear-gradient(to right, #c21500 0%, #ffc500  51%, #c21500  100%);
            
            margin: 7px;
            padding: 12px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         



           .btn-grads {
            background-image: linear-gradient(to right, #314755 0%, #26a0da  51%, #314755  100%);
            margin: 7px;
            padding: 12px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .btn-grads:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
          span{
          	font-weight: bold;
          }


  </style>
</head>
<body>

<div class="container">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        	<div class="row justify-content-center">
        	 <div class="col-md-12 text-center" >
        		<img src="Brookwood.png" width="100" height="100">
        		</div>
        	</div>

        	<div class="row justify-content-center">
        		<div class="col-md-12 text-center">
        			<a href="new_Customer.php" class="btn btn-grads">New Patient</a><br>
        			<a href="patient_details.php" class="btn btn-grad" >Existing Patient</a>
        		</div>
        		<br>
        	</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

        <!--   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>





<div class="modal fade" id="existingModel">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <form method="POST">
        <div class="modal-header">

          <h5 class="modal-title pl-4">Existing Patient</h5>
          <img src="Brookwood.png" width="40" height="40" style="margin-left: 180px;" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        	<div class="row justify-content-center">
        <!-- <input type="text" class="form-control col-md-10 mb-4" placeholder="Enter First Name" name="Fname" id="Fname"> -->	


         <input type="text" class="form-control col-md-10 mb-4" placeholder="Enter Last Name" name="Lname" id="Lname">
        		
		<!--  <select class="form-control col-md-10 mb-4"  name="Subscribers" id="Subscribers">
			<option value="">Insurance Subscribers Type</option>
			<option value="MemberID">Member ID</option>
			<option value="SSN">SSN</option>
		</select> -->
			    
	  <input type="password" class="form-control col-md-10 mb-4" placeholder="Enter SSN Last Four Digits" id="Code" name="Code" maxlength="4">

		
        	</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
       
	
			<button type="button" class="btn btn-danger mr-2" onclick="backmodel()">Back</button>
			<button type="submit" class="btn btn-primary mr-2" data-dismiss="modal" onclick="searchdata()">Search</button>


        
        </div>
     
      </form>
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

 $(window).on('load', function() {
        $('#myModal').modal('show');
    });
function existing(){
/*  alert("df")*/
 $("#myModal").hide();
$('#existingModel').modal('show');
}
function backmodel() {
$("#existingModel").hide();
location.reload();
}


 function validation() {
    
    let Lname = $('#Lname').val();
    let Code = $('#Code').val();   

    if(Lname == ''){
      toastr.error("Enter Last Name...");
      window.location.href = "index.php";
      $('#Lname').focus();
      return false;
    }else if(Code == ''){
      toastr.error("Enter SSN/MemberID...");
      $('#Code').focus();
      return false;
    }else{
      return true;
    }
  }
  
  function searchdata(){
    
    if(validation()){
      let Lname = $('#Lname').val();
      let Code = $('#Code').val();       
      var codeval_lastfour = Code.substr(Code.length - 4);    
      //alert(lastFour);
    $.ajax({
        url : 'showData.php',
        type : 'POST',
        data : {'action' : 'show','Lname' : Lname, 'codeval_lastfour' : codeval_lastfour},
        success : function(data){
               //console.log(data);
            if (data == 'true'){
              //alert("hii");
             
              toastr.success("Login successfully...!");
              window.location.href = "manage_details.php";
               
            }
            else{
              toastr.error('No Data Available with this LastName and SSN/MemberID');
              setTimeout(function () {
               window.location.href = "index.php";
              },1000);               
            }
        }
    });
    }
  }

</script>
