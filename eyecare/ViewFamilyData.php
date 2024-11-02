<?php include "includes/header.php"; 


 $patient_no = $_GET['patient_no'] && $_GET['patient_no'] != '' ? $_GET['patient_no'] : 0;

   $users_show = "SELECT rd.towhom,pi.* FROM `personal_information` as pi left join relations_details as rd on pi.toWhom =rd.id  where patient_number = '".$patient_no."' order by pi.id asc;";

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
                <h4>Users</h4>
              </div>
              
            </div>
            <div class="col-md-3 col-sm-12 text-right">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <input type="reset" name="cancel" value="Back" class="btn btn-danger" onclick="history.back()" style="float:right;margin-top: -6px;margin-left: 150px;">
                 <!--  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li> -->
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
            <div class="col-md-2 mt-3">
              <!-- Button trigger modal -->
     <!--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generalhealth">
       <i class="fa-sharp fa-solid fa-plus"></i>
       </button> -->
        <!-- Button trigger modal -->

       <!--  <a class="btn btn-primary float-right" href="recent_users.php" style="margin-right: 5px;">Recent Users
      </a> -->
            </div>
            </div>
            <!-- <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
          </div>
          <!-- <div class="pb-20"> -->
            <div class = "card-body">
                        <div class = row>
                          <div class = "col-12 table-responsive">
                <table width="100%" align="center" id="addform" class="table table-striped">
                                <thead>
                                  <tr>
                                  <th scope="col">S.no</th>
                                  <th scope="col">Patient No</th>
                                  
                                  <th scope="col">First Name</th>
                                  <th scope="col">Last Name</th>
                                  <th scope="col">Contact</th>            
                                  <th scope="col">Zip Code</th>
                                 <th scope="col">Action</th> 
                              </tr>
                                </thead>

                                <tbody>
                                  <?php $i=1 ;
                                   foreach ($show_data as $key => $value) {
                                    ?>
                                  <tr>
                                    
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value['patient_number']; ?></td>
                                    
                                    <td><?php echo $value['patientFname']; ?></td>
                                    <td><?php echo $value['plasLtname']; ?></td>
                                    <td><?php echo $value['cell']; ?></td>
                                    <td><?php echo $value['zipCode']; ?></td>
                                    <td class="text-center"><a href="ViewPersonData.php?patient_no=<?php echo $value['patient_number'] ?>" title="Edit"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                   
                                  </tr>
                                  <?php $i++; } ?>
                                </tbody>
                              </table>
          </div>
        </div>
      </div>
    </div>
        <!-- Simple Datatable End -->
        <!-- multiple select row Datatable start -->
        
        <!-- multiple select row Datatable End -->
        <!-- Checkbox select Datatable start -->
        
        <!-- Checkbox select Datatable End -->
        <!-- Export Datatable start -->
        
        <!-- Export Datatable End -->
      </div>
      <?php include "includes/footer.php"; ?>

    </div>
  </div>
 
  

  