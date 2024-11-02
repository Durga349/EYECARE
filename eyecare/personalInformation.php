<?php 
  include "includes/header.php";
  include "includes/navbar.php";
  include "includes/sidebar.php";

  $sel_cities="select * from cities order by id";
  $res_cities=$crud ->getData($sel_cities);
  $sel_states="select * from states order by id";
  $res_states=$crud ->getData($sel_states);
?>
  <div class="mobile-menu-overlay"></div>
  <style type="text/css">
   textarea.form-control {
    height: 60px;
}
  </style>
  <div class="main-container h-auto ">
    <div class="pd-ltr-20">
      <!-- <div class="card-box pd-20 height-100-p mb-30"> -->
        <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card ">
            <div class="card-primary" style="color: #fff;">
              <div class="card-header" style="background: #8fe9df;">
                <h2 align="center">Personal Information</h2>
              </div>
            </div>

            <form class="form-horizontal" action="action_information.php" method="post" >
                <div class="card-body">
                  <div class="form-group row">
                     <div class="col-md-6 mt-4">
                      <label ><strong>To Whom:</strong></label>
                     <select name="towhom" id="towhom" class="form-control">
                      <option value="">--select--</option>
                      <option value="Myself">Myself</option>
                      <option value="Wife">Wife</option>
                      <option value="Daughter">Daughter</option>
                      <option value="Son">Son</option>
                      <option value="Mother">Mother</option>
                      <option value="Father">Father</option>                       
                     </select>
                      </div>
                      <div class="col-md-6 mt-4">
                          <label><strong>Insurance Subscribers :</strong></label>
                          <input type="radio" name="insSubscribers" id="member_id1" value="Member Id" >&ensp;Member Id&ensp;
                     <input type="radio" name="insSubscribers" id="ssn1" value="Last four of SSN" >&ensp;Last four of SSN
                     <input type="text" name="" class="form-control col-md-8">      
                      </div>  
                    <div class="col-md-6 mt-4">
                      <label ><strong>First Name:</strong></label>
                      <input type="text" class="form-control" id="patientFname" placeholder="" name="patientFname" title="enter First name" >
                      </div>
                       <div class="col-md-6 mt-4">
                      <label ><strong>Last Name:</strong></label>
                      <input type="text" class="form-control" id="plastLname" placeholder="" name="plasLtname" title="enter Last Name" >
                      </div>
                      <div class="col-md-6 mt-4">
                      <label ><strong>Gender:</strong></label><br>
                     <input type="radio" name="gender" id="gender1" value="Male" >&ensp;Male
                     <input type="radio" name="gender" id="gender2" value="Female" >&ensp;Female
                      </div>
                       <div class="col-md-6 mt-4">
                         <label ><strong>DOB:</strong></label><br>
                        <input type="date" class="form-control" id="patDob"name="patDob" placeholder="" title="Enter the Date Of Brith ">
                      </div>
                      <div class="col-md-6 mt-4">
                      <label><strong>Home Phone:</strong></label>
                          <input type="number" name="homeph" id="homeph" placeholder="Enter the Home Phone" class="form-control">
                      </div>
                       <div class="col-md-6 mt-4">
                          <label><strong>Work:</strong></label>
                          <input type="number" name="work_no" id="work_no" placeholder="" class="form-control">
                      </div>
                       <div class="col-md-6 mt-4">
                          <label><strong>Cell:</strong></label>
                          <input type="number" name="cell" id="cell" placeholder="" class="form-control">
                      </div>   
                      <div class="col-md-6 mt-4">
                          <label><strong>Email</strong>(Please print each alphabet seperate & legibly):</label>                     
                          <input type="email" name="email" id="email" placeholder="" class="form-control">
                      </div> 
                      <div class="col-md-6 mt-4">
                      <label ><strong>Address:</strong></label>
                       <textarea class="form-control" class="address" id="address" name="address" placeholder="" rows="1" ></textarea>
                      </div> 
                      <div class="col-md-6 mt-4">
                         <label><strong>City:</strong></label>
                         <select class="form-control" id="city" name="city" >
                           <option value="">--Select--</option>
                         <?php foreach ($res_cities as $key => $value) {?>
                            <option value=" <?php echo $value['city']; ?>"><?php echo $value['city']; ?></option>
                         <?php   } ?>
                           </select>
                      </div>
                      <div class="col-md-6 mt-4">
                      <label><strong>State:</strong></label>
                         <select class="form-control" id="state" name="state">
                           <option value="">--Select--</option>
                           <?php foreach ($res_states as $key => $value) {?>
                            <option value="<?php echo $value['stateName']; ?>"><?php echo $value['stateName']; ?></option> 
                              <?php    } ?>
                        </select>
                     </div> 
                      <div class="col-md-6 mt-4">
                          <label><strong>Zip Code:</strong></label>
                          <input type="text" name="zipcode" id="zipcode" placeholder="" class="form-control">
                      </div>  
                       <div class="col-md-6 mt-4">
                      <label ><strong>Insurance Subscribers First Name:</strong></label>
                      <input type="text" class="form-control" id="insLname" placeholder="" name="insLname" title="enter First name" >
                      </div> 
                       <div class="col-md-6 mt-4">
                      <label ><strong>Insurance Subscribers Last Name:</strong></label>
                      <input type="text" class="form-control" id="insFname" placeholder="" name="insFname" title="enter First name" >
                      </div>           
                        <div class="col-md-6 mt-4">
                        <label ><strong>Insurance Subscribers DOB:</strong></label><br>
                        <input type="date" class="form-control" id="dob"name="dob" placeholder="" title="Enter the Date Of Brith ">
                      </div>
                        <div class="col-md-6 mt-4">                         
                          <label ><strong>Groupon # or Self Pay:</strong></label>
                          <input type="radio" name="payment" id="groupon" value="Groupon">&ensp;Groupon                      
                           <input type="radio" name="payment" id="selfpay" value="Selfpay">&ensp;Selfpay
                           <input type="" name="" class="form-control col-md-8 pt-4">
                          </div>
                           <div class="col-md-6 mt-4">
                          <label ><strong>Vision Insurance :</strong></label>
                          <input type="text" name="insurance" id="insurance" placeholder="" class="form-control">
                      </div>                    
                         <div class="col-md-6 mt-4">
                     <label ><strong>How you found our Office:</strong></label>
                      <input type="text" class="form-control" id="office" placeholder="" name="office">
                      </div>           
                      <div class="col-md-12 mt-4">
                        <p><strong>Insurance Authorization:</strong> I authorize and request my insurance company to pay to the eye doctor benifits otherwise payble to me. I understand that my insurance carrier may pay less than the actual bill for service.I agree to be responsible for the payment of all services rendered on my behalf or my dependents.</p>
                      </div>
                      <div class="col-md-6 mt-4">
                        <label><strong>Signature:</strong></label>
                      <textarea name="sign" id="sign" class="form-control"></textarea>
                        </div>                
                       <div class="col-md-6 mt-4">
                        <label><strong>Date:</strong></label>
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
                        <div class="col-md-6 mt-4">
                          <label><strong>Signature:</strong></label>
                        <textarea name="signature" id="signature" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mt-4">
                          <label><strong>Date:</strong></label>
                          <input type="date" name="date_pre" id="date_pre" class="form-control">
                        </div>
                      </div>                      
                        </div>
                      <div class="col-md-12">
                        <button type="reset" name="cancel" id="cancel" class="btn btn-danger">Cancel</button>
                      <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-success float-right" onclick="return validateForm()">Submit</button>                    
                      </div>         
                </div>
                 </div>
                </div>
            </form>           
              </div>
      </div><br>
    <!-- </div>
  </div> -->
  <!-- js -->
  <!-- Footer -->
      <!-- <?php include "includes/footer.php"; ?>

      <script type="text/javascript">
      function validateForm(){
          // alert ("hai");
          // return false;
          if (document.getElementById('patientFname').value=="") {
            alert(Please enter patient first name);
            return false; v           
          }
        }
        
      </script> -->