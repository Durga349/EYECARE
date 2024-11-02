<?php 
	include "includes/header.php"; 
	include "includes/navbar.php";
	include "includes/sidebar.php";
	$qryGeneralHealth=
	"select * from ocularsymptoms where dispStatus=1  
	 order by priority";
	$resGeneralHealth=$crud->getData($qryGeneralHealth);
	//print_r($resGeneralHealth);
?>

	<!-- Sidebar -->
	

	<div class="mobile-menu-overlay"></div>

	<div class="main-container h-100">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-200-p mb-30">
				<table border="1" class="table table-bordered">
					<tr>
							<th>S.No</th>
							<th>Symptom Name</th>
							<th>&nbsp;</th>
					</tr>
				<?php $i=1;foreach($resGeneralHealth as $key=>$value){ 
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
	</div>
	<!-- js -->
	<!-- Footer -->
			<?php //include "includes/footer.php"; ?>