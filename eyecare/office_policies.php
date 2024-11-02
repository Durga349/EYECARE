<?php 
	include "includes/header.php"; 
	include "includes/navbar.php";
	include "includes/sidebar.php";
?>

	<div class="mobile-menu-overlay"></div>
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
	<!-- js -->
	<!-- Footer -->
			<?php include "includes/footer.php"; ?>
<script type="text/javascript">
	//alert('hfi');
var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
$('#clear').click(function(e) {
e.preventDefault();
sig.signature('clear');
$("#signature64").val('');

});
</script>