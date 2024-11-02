<?php include "includes/header.php"; 
?>
	<?php include "includes/navbar.php";?>
	<!-- Sidebar -->
	<?php include "includes/sidebar.php";?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container h-100 ">
    <form method="POST" action="savegeneral_health.php">
		<div class="row justify-content-center mt-5">
			<div class="col-md-9">
			<div class="card">
				<div class="card-header text-center "><h3>General Health</h3></div>
					<div class="card-body">
	<div class="row">
		<div class="col-md-6">
			<label>Field Name</label>
			<input type="text" name="fieldName" id="fieldName" class="form-control">
		</div>
		<div class="col-md-6">
			<label>Display Field Name</label>
			<input type="text" name="displayFieldName" id="displayFieldName" class="form-control">
		</div>
		<div class="col-md-6 mt-3">
			<label>Type</label>
			<input type="text" name="type" id="type" class="form-control">
		</div>
		<div class="col-md-6 mt-3">
			<label>Type Values</label>
			<input type="text" name="typevalues" id="typevalues" class="form-control">
		</div>
		<div class="col-md-6 mt-3">
			<label>Status</label>
			<input type="text" name="dispStatus" id="dispStatus" class="form-control">
		</div>


	</div>
	<div class="row mt-3">
		<div class="col-md-12">
			<input type="submit" name="save" value="Save" class="btn btn-primary float-right" onclick="return validation()">
			<input type="reset" name="cancel" id="cancel" class="btn btn-danger" value="Back"  onclick="window(location='view_generalHealth.php')">
		</div>
	</div>
</div>
				
			</div>
			</div>
		</div>
</form>
	</div>
	<!-- js -->
	<!-- Footer -->
			<?php include "includes/footer.php"; ?>
			<script type="text/javascript">
			function validation() {
					if (document.getElementById('fieldName').value=="") {
						alert("Please Enter Field Name");
						return false;
					}else if (document.getElementById('displayFieldName').value=="") {
						alert("Please Enter Display Field Name");
						return false;
					}
					else if (document.getElementById('type').value=="") {
						alert("Please Enter Type");
						return false;
					}
					else if (document.getElementById('typevalues').value=="") {
						alert("Please Enter Type Values");
						return false;
					}else if (document.getElementById('dispStatus').value=="") {
						alert("Please Enter Status");
						return false;
					}

				}	
			</script>