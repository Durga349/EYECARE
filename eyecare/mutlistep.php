<?php
			include "crudop/crud.php";
			$crud = new Crud();//object creation
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<style type="text/css">
	
    .error{
      color: red;
    }
  
</style>
<body>
<form>
	<div class="container mt-4">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 mb-2">
				<button class="btn btn-primary float-right">Save</button>
			</div>
		<div class="col-md-12">
		<div id="tabs">
		  <ul>
		    <li><a href="#tabs-0">Patient Details</a></li>
		    <li><a href="#tabs-1">Family Eye /Medical History</a></li>
		    <li><a href="#tabs-2">Ocular Symptoms</a></li>
		    <li><a href="#tabs-3"> General Health</a></li>
		     <li><a href="#tabs-4"> Patient History</a></li>
		     <li><a href="#tabs-5"> Office Policies</a></li>
		     <li><a href="#tabs-6"> Office</a></li>
		  </ul>
       <div id="tabs-0">
		  <div class="row">
	
                     <div class="col-md-6 mt-4">
                      <label><strong>To Whom:</strong></label>
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

		  <!-- <div id="tabs-1">
		  <div class="row">
		  	 
		   <div class="form-group col-md-6">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		    
		  </div> 
		   <div class="form-group col-md-6">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div> 
		   <div class="form-group col-md-6">
		    <label for="exampleInputPassword1">Dropdwon</label>
		    <select class="form-control">
  					<option>Default select</option>
  					<option>select Option 1</option>
  					<option>select Option 2</option>
			</select>
		  </div>
		  <div class="form-check col-md-6">
		  	 <label for="exampleInputPassword1">Checkboxes</label><br>
		  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
		  <label class="form-check-label" for="defaultCheck1">
		    Default checkbox
		  </label>
		</div>
		 <div class="col-md-6">
			<label for="gender">Gender</label><br>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="option1">
			  <label class="form-check-label" for="inlineRadio1">Male</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="option2">
			  <label class="form-check-label" for="inlineRadio2">Female</label>
			</div>
			</div>
			<table border="1" class="table table-bordered"> 
          <tr> 
              <th>S.No</th> 
              <th>Disease</th> 
              <th>Status</th> 
               <th>Whom</th> 
          </tr> 
        <?php 
         $qryFamilyHistory= 
  "select * from familyhistory where dispStatus=1   
   order by priority"; 
    
  $resFamilyHistory=$crud->getData($qryFamilyHistory);
  $i=1;foreach($resFamilyHistory as $key=>$value){  
          $j=1;?> 
            <tr> 
              <td><input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>"><?php echo $i;?></td> 
              <td> 
        <?php echo $value['displayFieldName'];?></td> 
              <td> 
                <?php if($value['columnId']!=10){?>
<input type="radio" id="familyMedStatus<?php echo $i."_".$j;?>" name="familyMedStatus<?php echo $i;?>" value="1"  
class="form-check-inline">Yes &ensp; 
<input type="radio" id="familyMedStatus<?php echo $i."_".($j+1);?>" name="familyMedStatus<?php echo $i;?>" value="0"  
class="form-check-inline">No 
<?php } ?>
<?php if($value['columnId']==10){?>
  <input type="text" class="form-control" 
  name="familyMedStatus<?php echo $i;?>">
  <?php } ?>

              </td> 
              <td>
           <?php 
               $typevalues = explode(",",$value['whom']);
            ?>
            <select id="whomvalue<?php echo $i;?>" name="whomvalue<?php echo $i;?>" class="form-control">
            <option value="">--Select--</option>
            <?php foreach ($typevalues as $key => $value): ?>
      <option value="<?php echo $value;?>">
        <?php echo ucwords($value);?></option>
            <?php endforeach ?>
         </select>
         
              </td>
            </tr> 
        <?php $i++;$j++;} ?> 
        <tr> 
            <td colspan="3"> 
              <button type="button"  
              class="btn btn-danger">Cancel</button> 
 
              <button type="submit"  
              class="btn btn-primary float-right">Step-4</button> 
            </td> 
        </tr> 
        </table> 
		  </div>
		  </div> -->
		  <div id="tabs-2">
		  	<div class="row">
		    <p><strong>Click this tab again to close the content pane.</strong></p>
		   <table border="1" class="table table-bordered">
					<tr>
							<th>S.No</th>
							<th>Symptom Name</th>
							<th>&nbsp;</th>
					</tr>
				<?php
				
				 $qryGeneralHealth=
	"select * from ocularsymptoms where dispStatus=1  
	 order by priority";
	$resGeneralHealth=$crud->getData($qryGeneralHealth);
	$i=1;foreach($resGeneralHealth as $key=>$value){ 
					$j=1;?>
						<tr>
							<td><input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>"><?php echo $i;?></td>
							<td>
				<?php echo $value['displayFieldName'];?></td>
							<td>
<input type="checkbox" id="ocularsymptoms<?php echo $i;?>" 
name="ocularsymptoms<?php echo $i;?>" value="1" 
class="form-check-inline"><!-- Yes &ensp; -->
<!-- <input type="checkbox" id="ocularsymptoms<?php echo $i."_".($j+1);?>" name="ocularsymptoms<?php echo $i;?>" value="0" 
class="form-check-inline">No -->
							</td>
						</tr>
				<?php $i++;$j++;} ?>
				<tr>
						<td colspan="3">
							<button type="button" 
							class="btn btn-danger">Cancel</button>

							<button type="submit" 
							class="btn btn-danger float-right">Step-4</button>
						</td>
				</tr>
				</table>
			</div>
		  </div>
		  <div id="tabs-3">
		    <p><strong>Click this tab again to close the content pane.</strong></p>
		    <div class="row">
		  <table border="1" class="table table-bordered">
					<tr>
							<th>S.No</th>
							<th>Health Problem</th>
							<th>Status</th>
					</tr>
				<?php $qryGeneralHealth=
	"SELECT * FROM generalhealth WHERE dispStatus=1  
	 order by priority";
	$resGeneralHealth=$crud->getData($qryGeneralHealth);
	$i=1;foreach($resGeneralHealth as $key=>$value){ 
					$j=1;?>
						<tr>
							<td><input type="hidden" value="<?php echo $value['columnId'];?>" name="columnId<?php echo $i;?>"><?php echo $i;?></td>
							<td>
				<?php echo $value['displayFieldName'];?>
					
					
				</td>
							<td>
<input type="radio" id="genHealthStatus<?php echo $i."_".$j;?>" name="genHealthStatus<?php echo $i;?>" value="1" 
class="form-check-inline">Yes &ensp;
<input type="radio" id="genHealthStatus<?php echo $i."_".($j+1);?>" name="genHealthStatus<?php echo $i;?>" value="0" 
class="form-check-inline">No
&ensp;
<?php if($value['type']=="Yes"){
	$typevalues = explode(",",$value['typevalues']);
	?>
				<select id="typevalue<?php echo $i;?>" name="typevalue<?php echo $i;?>" class="form-control">
						<option value="">--Select--</option>
						<?php foreach ($typevalues as $key => $value): ?>
			<option value="<?php echo $value;?>">
				<?php echo ucwords($value);?></option>
						<?php endforeach ?>
				 </select>
					<?php }?>
							</td>
						</tr>
				<?php $i++;$j++;} ?>
				<tr>
						<td colspan="3">
							<button type="button" 
							class="btn btn-danger">Cancel</button>

							<button type="submit" 
							class="btn btn-danger float-right">Step-4</button>
						</td>
				</tr>
				</table>
			</div>
		  </div>

<div id="tabs-4">
		   
		    <div class="container">
		  <form name="addformpage" id="addformpage"  autocomplete="off" method="post" enctype="multipart/form-data">
            
              <div class="row">
                <div class="col-md-6">
                  <label><b>Date of last eye exam:</b></label>  
                  <input type="date" name="date" id="date" class="form-control" placeholder="">
                </div>
                
              <div class="col-md-6">
                  <label><b>Do you currently wear glasses:</b></label><br>
                  <input type="radio" name="wear_glasses" id="wear_glasses1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="wear_glasses" id="wear_glasses2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
            
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Do you currently wear Contacts:</b></label><br>
                  <input type="radio" name="wear_contacts" id="wear_contacts1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="wear_contacts" id="wear_contacts2" value="No">&nbsp;No&nbsp;
                </div>
                <div class="col-md-6">
                  <label><b>What kind?</b></label>
                  <input type name="what_kind" id="what_kind" class="form-control" placeholder="">
                </div> 
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Solution Used?</b></label>
                  <input type name="solution_used" id="solution_used" class="form-control" placeholder="">
                </div>
                
            <div class="col-md-6">
                  <label><b>Are you satiesfied with the vision,and comfort of your contact lenses?</b></label>
                   <input type="radio" name="satiesfied" id="satiesfied1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="satiesfied" id="satiesfied2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Would you prefer clear, or colored contacts?</b></label><br>
                   <input type="checkbox" name="clear[]" id="clear" class="form-check-inline" value="Clear">Clear&ensp;
                   <input type="checkbox" name="colored[]" id="colored" class="form-check-inline" value="Colored">Colored&ensp;
                   <input type="checkbox" name="both[]" id="both" class="form-check-inline" value="Both">Both&ensp;
                </div>                
                <div class="col-md-6">
                  <label><b>Do you use the computer?</b></label><br>

<input type="radio" name="computer" id="computer1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="computer" id="computer2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
               <div class="row pt-4"> 
            <div class="col-md-6">
                  <label><b>Approx.how many hours a day do you use the computer?</b></label>
                   <input type="number" name="hours" id="hours" value="" placeholder="" class="form-control">
                </div>
                <div class="col-md-6">
                  <label><b>Occupation:</b></label>
                   <textarea name="occupation" id="occupation" class="form-control" ></textarea>
                </div>
              </div>
              
               <div id="tool-placeholder"></div>
              <div class="row pt-2">
                <div class="col-md-12">
                <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageVisitors.php'" style="float: left;">
              <input type="submit" name="submit" value="Save" class="btn btn-primary" style="float: right;">
            </div>
              </div>
          </form>
			</div>
		  </div>




<div id="tabs-6">
		   
		    <div class="main-container ">
		<div class="pd-ltr-20">
			<!-- <div class="container mt-5"> -->
		<h3 align="center"><strong>BROOKWOOD EYE CARE</strong></h3>	<br>
		<h4 align="center"><u>OFFICE POLICIES</u></h4>	<br>
		<p align="justify">We look forward to providing all your vision care needs, and will go  above and beyond  to  provide excellent customer service. Please take a moment to review our policies. </p>
			<ol>
				<li>1.&ensp;All contact Lens and Spectacle Gla·sses orders are to be picked up within <u>60 days</u> from the date of purchase. Orders not picked up within <u>60 days</u> will be returned to the lab and any payments/deposits may be forfeited</li>
				<br> 
				<li>2.&ensp;<strong>Refunds</strong>: Glasses are individually fabricated so we are unable to accept requests for refunds. Therefore, <strong>All Sales are Final.</strong> Merchandise may be returned within <u>30 days</u> for exchange or store credit.</li>
					<br>
				<li>3.&ensp;<strong>Patient's own frame</strong>: We take great care of patient's frames. However, in the process of fitting new lenses into a customer's old frame, making adjustments or minor repairs, we will not be responsible for breakages during these processes.<strong>Please knoe that these are done at your own risk.</strong></li><br>
				<li>4.&ensp;There are <strong>no warranties on sale/ clearance frames</strong> unless purchased in addition. </li><br>
				<li>5.&ensp; Contact Lens prescriptions are <strong>valid for 1 year </strong>per FDA regulations. Evaluations are required annually.</li><br>
				<li>6.&ensp;All Contact Lens Exams also include a prescription for glasses.</li><br>
				<li>7.&ensp;All fittings for Contact Lens examinations are to be completed within <u>60 days </u>to prevent any additional fitting fees. </li><br>
				<li>8.&ensp;Doctor's prescription changes are done one time at no charge within <u>60 days </u> of initial order date. </li><br>
				<li>9.&ensp;All frames placed on hold will be returned back to the display case for sale after <u>two weeks</u>.</li><br>
			</ol>
					<p align="center"><b>Insurance Authorization</b></p><br>
					
			<form >
					<input type="checkbox" name="" value="" >&ensp; I authorize and request my 			insurance company to pay to the eye doctor benefits otherwise payable to 
						me. I understand that my insurance carrier may pay lgss than the act1.1al bill for service. . l agree to be responsible for the payment of all services rendered on my behalf or my dependants.<br><br>
					<input type="checkbox" name="" value="" >&ensp; I agree to all of the policies and services above. 
					<br><br>
					<div class="col-md-12 mb-4">
					<div class="row">
						<div class="col-md-6">					
							<label><strong>Signature:</strong> </label>
						<!-- <input type="text" name="sign" id="sign" class="form-control"> -->
						
					<!--  <textarea name="sign" id="sign" class="form-control" rows="1"></textarea>  -->


<div class="col-md-12">
<label class="" for="">Signature:</label>
<br/>
<div id="sig" ></div>
<br/>
<button id="clear">Clear Signature</button>
<textarea id="signature64" name="signed" style="display: none"></textarea>
</div>


					 </div>
						<div class="col-md-4">
						<label><strong>Date:</strong></label>
						<input type="text" name="date" id="date" class="form-control">
						</div>
					</div>
					</div>
					<h6>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</h6> <br>
					<div class="col-md-6">
						<label><strong>Patient's Signature:</strong></label>
					<!-- <input type="text" name="patient_sign" id="patient_sign" class="form-control"> -->
					 <textarea name="patient_sign" id="patient_sign" class="form-control" rows="1"></textarea>
					</div>&ensp;
					</form>
				</div>
			</div>
		  </div>



		  <div id="tabs-5">
		   
		    <div class="main-container ">
		<div class="pd-ltr-20">
			<!-- <div class="container mt-5"> -->
		<h3 align="center"><strong>BROOKWOOD EYE CARE</strong></h3>	<br>
		<h4 align="center"><u>OFFICE POLICIES</u></h4>	<br>
		<p align="justify">We look forward to providing all your vision care needs, and will go  above and beyond  to  provi de excellent customer service. Please take a moment to review our policies. </p>
			<ol>
				<li>1.&ensp;All contact Lens and Spectacle Gla·sses orders are to be picked up within <u>60 days</u> from the date of purchase. Orders not picked up within <u>60 days</u> will be returned to the lab and any payments/deposits may be forfeited</li>
				<br> 
				<li>2.&ensp;<strong>Refunds</strong>: Glasses are individually fabricated so we are unable to accept requests for refunds. Therefore, <strong>All Sales are Final.</strong> Merchandise may be returned within <u>30 days</u> for exchange or store credit.</li>
					<br>
				<li>3.&ensp;<strong>Patient's own frame</strong>: We take great care of patient's frames. However, in the process of fitting new lenses into a customer's old frame, making adjustments or minor repairs, we will not be responsible for breakages during these processes.<strong>Please knoe that these are done at your own risk.</strong></li><br>
				<li>4.&ensp;There are <strong>no warranties on sale/ clearance frames</strong> unless purchased in addition. </li><br>
				<li>5.&ensp; Contact Lens prescriptions are <strong>valid for 1 year </strong>per FDA regulations. Evaluations are required annually.</li><br>
				<li>6.&ensp;All Contact Lens Exams also include a prescription for glasses.</li><br>
				<li>7.&ensp;All fittings for Contact Lens examinations are to be completed within <u>60 days </u>to prevent any additional fitting fees. </li><br>
				<li>8.&ensp;Doctor's prescription changes are done one time at no charge within <u>60 days </u> of initial order date. </li><br>
				<li>9.&ensp;All frames placed on hold will be returned back to the display case for sale after <u>two weeks</u>.</li><br>
			</ol>
					<p align="center"><b>Insurance Authorization</b></p><br>
					
			<form >
					<input type="checkbox" name="" value="" >&ensp; I authorize and request my 			insurance company to pay to the eye doctor benefits otherwise payable to 
						me. I understand that my insurance carrier may pay lgss than the act1.1al bill for service. . l agree to be responsible for the payment of all services rendered on my behalf or my dependants.<br><br>
					<input type="checkbox" name="" value="" >&ensp; I agree to all of the policies and services above. 
					<br><br>
					<div class="col-md-12 mb-4">
					<div class="row">
						<div class="col-md-6">					
							<label><strong>Signature:</strong> </label>
						<!-- <input type="text" name="sign" id="sign" class="form-control"> -->
						
					<!--  <textarea name="sign" id="sign" class="form-control" rows="1"></textarea>  -->


<div class="col-md-12">
<label class="" for="">Signature:</label>
<br/>
<div id="sig" ></div>
<br/>
<button id="clear">Clear Signature</button>
<textarea id="signature64" name="signed" style="display: none"></textarea>
</div>

					 </div>
						<div class="col-md-4">
						<label><strong>Date:</strong></label>
						<input type="text" name="date" id="date" class="form-control">
						</div>
					</div>
					</div>
					<h6>My eye doctor provided me with a copy of my contact lens precription at the completion of my contact lens fitting.</h6> <br>
					<div class="col-md-6">
						<label><strong>Patient's Signature:</strong></label>
					<!-- <input type="text" name="patient_sign" id="patient_sign" class="form-control"> -->
					 <textarea name="patient_sign" id="patient_sign" class="form-control" rows="1"></textarea>
					</div>&ensp;
					</form>
				</div>
			</div>
		  </div>
		</div></div></div>
			</div>
		</div>
</div>
</form>

</body>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <script>
  $( function() {
    $( "#tabs" ).tabs({
      collapsible: true
    });
  } );


	// alert('hfi');
var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
$('#clear').click(function(e) {
e.preventDefault();
sig.signature('clear');
$("#signature64").val('');

});

  </script>

</html>