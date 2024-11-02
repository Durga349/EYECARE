<?php include "includes/header.php"; 

$columnId=$_REQUEST['vid'];
$sel_qry="select * from familyhistory where columnId ='".$columnId."'";
$result=$crud->getData($sel_qry);

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
    <div class="card-header text-center"><h3>view Family/Medical Histroy</h3></div>
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
        <label>Priority</label>
        <input type="text" name="type" id="type" class="form-control" value="<?php echo $result[0]['priority'];?>"readonly>
       </div>
     <!--   <div class="col-md-6">
        <label>Type Values</label>
        <input type="text" name="typevalues" id="typevalues" class="form-control"value="<?php echo $result[0]['whom'];?>" readonly>
       </div> -->
       <div class="col-md-6">
        <label>Status</label>
        <input type="text" name="dispStatus" id="dispStatus" class="form-control"value="<?php echo $result[0]['dispStatus'];?>" readonly>
       </div>
       
      </div>
                           <br>
       <input type="reset" name="back" value="Back" class="btn btn-danger" onclick="window(location.href='display_familyhistroy.php');">

     </div>
    
   </div>
   </div>
  </div>
</form>
	</div>
	<!-- js -->
	<!-- Footer -->
			<?php include "includes/footer.php"; ?>