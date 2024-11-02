<?php include "includes/header.php";
$crud= new crud();

$columnId=$_REQUEST['vid'];
 $selquery="select * from ocularsymptoms where columnId='".$columnId."'";
$result=$crud->getData($selquery);
?>
	<?php include "includes/navbar.php";?>
	<!-- Sidebar -->
	<?php include "includes/sidebar.php";?>
	<div class="mobile-menu-overlay"></div>
	<div class="main-container h-100">
		<form>	
		<div class="row">
			<div class="col-md-9">
			<div class="card">
				<div class="card-header text-center"><h3>View Ocular Symptoms </h3></div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<label>Field Name</label>
								<input type="text" name="fieldName" id="fieldName" class="form-control" value="<?php echo $result[0]['fieldName'];?>" readonly>
							</div>
							<div class="col-md-6">
								<label>Display Field Name</label>
								<input type="text" name="displayFieldName" id="displayFieldName" class="form-control" value="<?php echo $result[0]['displayFieldName'];?>" readonly>
							</div>
							<div class="col-md-6">
								<label>Type</label>
								<input type="text" name="type" id="type" class="form-control" value="<?php echo $result[0]['type'];?>"readonly>
							</div>
							<div class="col-md-6">
								<label>Type Values</label>
								<input type="text" name="typevalues" id="typevalues" class="form-control"value="<?php echo $result[0]['typevalues'];?>" readonly>
							</div>
							<div class="col-md-6">
								<label>Status</label>
								<input type="text" name="dispStatus" id="dispStatus" class="form-control"value="<?php echo $result[0]['dispStatus'];?>" readonly>
							</div>
					
						</div>
                           <br>
							<input type="reset" name="back" value="Back" class="btn btn-danger" onclick="window(location.href='view_ocularSymptoms.php');">

					</div>
				
			</div>
			</div>
		</div>
</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<!-- js -->
	<!-- Footer -->
			<?php include "includes/footer.php"; ?>