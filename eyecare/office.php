<?php 
	include "includes/header.php";
	include "includes/navbar.php";
	include "includes/sidebar.php";

	$sel_cities="select * from cities order by id";
	$res_cities=$crud ->getData($sel_cities);
	$sel_states="select * from states order by id";
	$res_states=$crud ->getData($sel_states);
?>
<style type="text/css">
			textarea.form-control {
    height: 80px;
    border: none;
    border-bottom: 1px dashed;
}
			input.form-control{
				border: none;
				border-bottom: 1px dashed;
			}

			 input.text{
				border: none;
				border-bottom: 1px solid;
			}
			h3{
				color: royalblue;
			}
		</style>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container ">
		<div class="pd-ltr-20">
			<!-- <div class="card-box pd-20 height-100-p mb-30"> -->
        <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-primary" style="color: #fff;">
              <div class="card-header">
                <h3 class="card-title">Welcome To Our Office</h3>
              </div>
            </div>

            <form class="form-horizontal" action="#" method="post" >
                <div class="card-body">
                  <div class="form-group row">
                     <div class="col-md-4 mt-4">
                      <label ><strong>Gender:</strong></label><br>
                      <input type="radio"  id="male" name="gender" title="Check Gender">&nbsp;Male <input type="radio"  id="female" name="gender" title="Check Gender">&nbsp;Female
                      </div>
                      <div class="col-md-4 mt-4">
                      <label ><strong>Date:</strong></label>
                      <input type="text" class="form-control" id="dateval" placeholder="" name="dateval" title="enter Date">
                      </div>                 
                         <div class="col-md-4 mt-4">
                     <label ><strong>How you found our Office:</strong></label>
                      <input type="text" class="form-control" id="office" placeholder="" name="office">
                      </div>
                      <div class="col-md-4 mt-4">
                      <label ><strong>Patient Last Name:</strong></label>
                      <input type="text" class="form-control" id="plastname" placeholder="" name="plastname" title="enter Last Name" >
                      </div>
                                      
                     <div class="col-md-4 mt-4">
                      <label ><strong>Patient First Name:</strong></label>
                      <input type="text" class="form-control" id="patientFname" placeholder="" name="patientFname" title="enter First name" >
                      </div>
                      <div class="col-md-4 mt-4">
                         <label ><strong>Pat.DOB:</strong></label><br>
                        <input type="date" class="form-control" id="patDob"name="patDob" placeholder="" title="Enter the Date Of Brith ">
                      </div>                     
                     <div class="col-md-4 mt-4">
                      <label ><strong>Insurance Subscribers Last Name:</strong></label>
                      <input type="text" class="form-control" id="insLname" placeholder="" name="insLname" title="enter First name" >
                      </div>
                      <div class="col-md-4 mt-4">
                      <label ><strong>First Name:</strong></label>
                      <input type="text" class="form-control" id="insFname" placeholder="" name="insFname" title="enter First name" >
                      </div>                      
                     	<div class="col-md-4 mt-4">
                         <label ><strong>DOB:</strong></label><br>
                        <input type="date" class="form-control" id="dob"name="dob" placeholder="" title="Enter the Date Of Brith ">
                      </div>
                     <div class="col-md-3 mt-4">
                      <label ><strong>Patient Address:</strong></label>
                  </div>
                   <div class="col-md-9 mt-4">
                       <textarea class="form-control" class="address" id="address" placeholder="" rows="1" ></textarea>
                      </div>                      
                     <div class="col-md-4 mt-4">
                         <label><strong>City:</strong></label>
                         <select class="form-control" id="city" name="city" >
                           <option value="">--Select--</option>
                         <?php foreach ($res_cities as $key => $value) {?>
						<option value=" <?php echo $value['id']; ?>"><?php echo $value['city']; ?></option>
			<?php  	} ?>
                           <!-- <option value="">Opction1</option>                           
                           <option value="">Opction2</option>
                           <option value="">Opction3</option>
                           <option value="">Opction4</option> -->
                       </select>
                      </div>
                     <div class="col-md-4 mt-4">
                      <label><strong>State:</strong></label>
                         <select class="form-control" id="state" name="state">
                           <option value="">--Select--</option>
                           <?php foreach ($res_states as $key => $value) {?>
                           	<option value="<?php echo $value['id']; ?>"><?php echo $value['stateName']; ?></option>
                          
                   <?php    } ?>
                           <!-- <option value="">Opction1</option>                           
                           <option value="">Opction2</option>
                           <option value="">Opction3</option>
                           <option value="">Opction4</option> -->
                       </select>
                      </div>
                      <div class="col-md-4 mt-4">
                          <label><strong>Zip Code:</strong></label>
                          <input type="text" name="zipcode" id="zipcode" placeholder="" class="form-control">
                      </div>              
                     <div class="col-md-4 mt-4">
                      <label><strong>Home Phone:</strong></label>
                          <input type="number" name="homeph" id="homeph" placeholder="Enter the Home Phone" class="form-control">
                      </div>
                      <div class="col-md-4 mt-4">
                          <label><strong>Work:</strong></label>
                          <input type="text" name="work" id="work" placeholder="" class="form-control">
                      </div>
                       <div class="col-md-4 mt-4">
                          <label><strong>Cell:</strong></label>
                          <input type="number" name="cell" id="cell" placeholder="" class="form-control">
                      </div>
                      <div class="col-md-6 mt-4">
                          <label><strong>Email</strong>(Please print each alphabet seperate & legibly):</label>
                      </div>
                      <div class="col-md-6 mt-4">
                          <input type="email" name="email" id="email" placeholder="" class="form-control">
                      </div>
                      <div class="col-md-6 mt-4">
                          <label>Insurance Subscribers<strong> Member ID #</strong> or Last four of <b>SSN :</b></label>
                      </div>
                      <div class="col-md-6 mt-4">
                       <input type="text" name="member_id" id="member_id" placeholder="" class="form-control">
                      </div>
                      
                      	<div class="col-md-3 mt-4">
                          <label ><strong>Groupon # or Self Pay:</strong></label>
                          </div>
                          <div class="col-md-3 mt-4">
                         <!--  <input type="number" name="amount" id="amount" placeholder="" class="form-control"> -->
                          <select class="form-control" id="pay" name="pay">
                           <option value="">--Select--</option>
                           <option value="">Groupon</option>                           
                           <option value="">Self pay</option>
                           </select>
                      </div>
                      <div class="col-md-2 mt-4">
                          <label ><strong>Vision Insurance :</strong></label>
                          </div>
                          <div class="col-md-4 mt-4">
                          <input type="text" name="insurance" id="insurance" placeholder="" class="form-control">
                      </div>
                      <div class="col-md-12 mt-4">
                      	<p><strong>Insurance Authorization:</strong> I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</p>
                      </div>
                      <div class="col-md-1 mt-4">
                      	<label><strong>Signature:</strong></label>
                      </div>
                      	<div class="col-md-5 mt-4">
                      		<textarea name="sign" id="sign" class="form-control"></textarea>
                      	</div>       	
                    
                       <div class="col-md-1 mt-4">
                      	<label><strong>Date:</strong></label>
                      </div>
                      	<div class="col-md-5 mt-4">
                      		<input type="date" name="date" id="date" class="form-control">
                      	</div>
                      	<div class="col-md-12 mt-4"><p><u>HIPAA PRIVACY ACKNOWLEDGEMENT OF RECIEPT OF NOTICE OF PRIVACY PRACTICE:</u></p>                      		
                      	</div>
                      	<div class="col-md-12 mt-4">
                      	<p>I, <input type="text" name="" style="border:none; border-bottom: 1px dashed;" > (Please print name of patient or legal representative) have been presented with the Notice OF Privacy Policy of Dr.Birdsong & Associates (the provider), and have been offered a copy of such policy to keep for records.</p>                     		
                      	</div>
                      	<div class="col-md-12 mt-4">
                      		<p>Please check one: </p>
                      		<input type="checkbox" name="">&ensp;I hereby acknowledge reciept of the policy.<br>
                      		<input type="checkbox" name="">&ensp;I hereby REFUSE to acknwledge reciept of the policy. I understand that even though I refuse to sign this ACKNOWLEDGEMENT, the provider may still provide treatment to me.
                      	</div>
                      	<div class="col-md-2 mt-4">
                      		<label><strong>Signature:</strong></label>
                      	</div>
                      	<div class="col-md-4 mt-4">
                      		<textarea name="signature" id="signature" class="form-control"></textarea>
                      	</div>
                      	<div class="col-md-2 mt-4">
                      		<label><strong>Date:</strong></label>
                      	</div>
                      	<div class="col-md-4 mt-4">
                      		<input type="date" name="date_pre" id="date_pre" class="form-control">
                      	</div>
                      
                               
                
            </form>
            </div>
            </div>
                       
              </div>
			</div>
		<!-- </div>
	</div> -->
	<!-- js -->
	<!-- Footer -->
			<?php include "includes/footer.php"; ?>