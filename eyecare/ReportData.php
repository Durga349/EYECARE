<?php include "includes/header.php"; 
$patientNo= $_GET['patient_no'] && $_GET['patient_no'] != '' ? $_GET['patient_no'] : 0;


// echo $users_show = "SELECT pr.date,pi.* FROM `personal_information` as pi left join patient_reportdata pr  on pi.patient_Id = pr.date where pi.patient_Id = '".$patientID."' order by pi.id asc";
// $show_data = $crud->getData($users_show);  

 $users_show = "SELECT DISTINCT pr.date, pi.patientFname,pi.patient_number,pi.cell,pi.city,pi.codeval FROM `patient_reportdata` as pr left join personal_information as pi on pi.patient_number =pr.patient_number where pr.patient_number ='".$patientNo."';";
$show_data = $crud->getData($users_show);  

?>
<body>  
  <?php include "includes/navbar.php"; ?> 
<?php include "includes/sidebar.php"; 
include "includes/modals.php";?>
  <div class="mobile-menu-overlay"></div>
  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <div class="title">
                <h4>Report Data</h4>
              </div>
              
            </div>
            <div class="col-md-3 col-sm-12 text-right">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <input type="reset" name="cancel" value="Back" class="btn btn-danger" onclick="history.back()" style="float:right;margin-top: -6px;margin-left: 150px;">
                </ol>
              </nav>  
            </div>
          </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
          <div class="pd-18">
            <div class="row">
              <div class="col-md-10">
            <!-- <h4 class="text-blue h4">General Health</h4> -->
            </div>
            </div>
          </div>
          <!-- <div class="pb-20"> -->
            <div class = "card-body">
               <div class = row>
                  <div class = "col-12 table-responsive">
                    <table width="100%" align="center" id="addform" class="table table-striped">
                      <thead>
                          <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Date</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Contact</th>            
                            <th scope="col">City</th>
                           <th scope="col">Action</th> 
                        </tr>
                       </thead>

                        <tbody>
                          <?php $i=1 ;
                           foreach ($show_data as $key => $value) {
                            ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($value['date'])); ?></td>
                            <td><?php echo $value['patientFname']; ?></td>
                            <td><?php echo $value['cell']; ?></td>
                            <td><?php echo $value['city']; ?></td>
                            <td class="text-center"><a href="javascript:void(0)" download title = "Generate PDF" style="font-size:22px;" onclick="jFPDF('<?php echo $value['patient_number'];?>','<?php echo $value['date'];?>')"><i class="dw dw-file-154"></i></a></td>
                          </tr>
                          <?php $i++; } ?>
                         </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </div>
    </div>
</body>
  <?php include "includes/footer.php"; ?>

  <script type="text/javascript">

    function jFPDF(patient_number,date) {
  // alert(patient_number);
  // alert(date);
  // alert(date);
    $.ajax({
        method: "POST",
        url: "pdf_generation.php",
        data: { 'type': 'pdf', 'patient_number': patient_number,'date':date}
    })
       .done(function (msg) {
        window.open(msg, "_blank");
    });
}
  </script>
  

  