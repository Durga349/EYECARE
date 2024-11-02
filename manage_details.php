<?php
 session_start();
 $codeval = $_SESSION['codeval'];
 //print_r($_SESSION);

?>
<body>

 <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
  <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

  <!-- toastr -->
  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  
  
  <div class="mobile-menu-overlay"></div>

  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <!-- <div class="page-header">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <div class="title">
                <h4>Details</h4>
              </div>
              
            </div>
            <div class="col-md-3 col-sm-12 text-right">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
              </nav>  
            </div>
          </div>
        </div> -->
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
          <div class="pd-20 ">
            <div class="row">
            <div class="col-md-9 ml-2">
            <img src="Brookwood.png" width="100" height="100">
            <h4 class="text-blue h4"></h4>
            </div>
            <div class="col-md-2">
            <!-- <button type="button" ></button> -->
            <!-- <a href="add_family_member.php" class="btn" style="margin-top:80px;margin-left:-50px;border-radius: 20px;background-color:#0BA1C2;border-color:#0BA1C2;color: white;" onclick="addfam_mem()">Add Family Members</a>  -->
            
            <a href="index.php" class="btn" style="margin-top:80px;margin-right:-25px;border-radius: 20px;background-color:#0BA1C2;border-color:#0BA1C2;color: white;">Back</a>
            </div>
            </div>
            <!-- <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
          </div>
          <!-- <div class="pb-20"> -->
            <div class = "card-body" style="width:90%;margin-left: 50px;">
                        <div class = row>
                          <div class = "col-12 table-responsive">
            <table class="data-table table stripe hover nowrap" width="100%" align="center" id="Form_Table">
              <thead>
                <tr>
                  <th >S.No</th>
                  <th >Patient Number</th>
                  <th class="table-plus datatable-nosort">First Name</th>
                  <th class="table-plus datatable-nosort">Last Name</th>
                  <th>Contact</th>
                   <th>DOB</th>
                  <!-- <th>To Whom</th> -->
                  <th>Zip Code</th>
                  <th>City</th>
                  <!-- <th>State</th> -->
                  <th class="datatable-nosort">Action</th>
                </tr>
              </thead>
              
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
     

    </div>
  </div>  


<script src="vendors/scripts/core.js"></script>
  <script src="vendors/scripts/script.min.js"></script>
  <script src="vendors/scripts/process.js"></script>
  <script src="vendors/scripts/layout-settings.js"></script>
  <script src="src/plugins/apexcharts/apexcharts.min.js"></script>
  <script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
  <script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
  <script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
  <script src="vendors/scripts/dashboard.js"></script>
  
  <!-- toaster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   
<script type="text/javascript">
  function loadData() {
  
    $("#Form_Table").dataTable().fnDestroy();
    var table=$('#Form_Table').DataTable(
    {
        "processing" : true,
        "serverSide" : false,
        "pagingType" : "full_numbers",
        "ajax"       : {
            url      : "showData.php",
            type     : 'post',
            data     : { 'action' : 'show_data'},
        },

        "columns": [
            /*{
              "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                 $(nTd).html(<input type="checkbox" name="uniqueId[]" id="trxn_chk${oData.id}" value="${oData.id}">);
                  }
            },*/
            {
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { "data" : "patient_Id" },
            { "data" : "patientFname" },
            { "data" : "plasLtname" },
            
            { "data" : "cell" },
            {
              "data": "patDob",
              render: function (data, type, row, meta) {
                var dob = new Date(data);
                var formattedDate = ("0" + dob.getDate()).slice(-2) + "-" + ("0" + (dob.getMonth() + 1)).slice(-2) + "-" + dob.getFullYear();

                return formattedDate;
              }
            },
            { "data" : "zipCode" }, 
            { "data" : "city" }, 
            // { "data" : "city" },
            // { "data" : "state" },
            { "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
              let bnTd = '';               
                bnTd += ` <a  href="edit_details.php?type=view&codeval=${oData.codeval}&patient_Id=${oData.patient_Id}" style="font-size:22px;" title="&ensp;View"><i class="dw dw-eye"></i></a>&ensp;
                <a  href="edit_details.php?type=edit&codeval=${oData.codeval}&patient_Id=${oData.patient_Id}" style="font-size:22px;" title="Edit"><i class="dw dw-edit2"></i></a>&ensp; 
                <a href="javascript:void(0)" download title = "Generate PDF" style="font-size:22px;" onclick="jFPDF('${oData.codeval}', '${oData.patient_Id}')"><i class="dw dw-file-154"></i></a>`
                $(nTd).html(bnTd);                      
                        
                }
                
              },

        ],
        //dom: 'lBfrtip',
        select: true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
            { className: 'text-center', targets: [0,1,2,3,4,5,6] },

            {
              width: 200, targets: 1
            },
          ],
        //"order": [[ 1, "asc" ]],
        aoColumnDefs : [{'bSortable' : false, 'aTargets' : ['no-sort']}], // make the actions column unsortable
        sPaginationType : 'full_numbers',
    } );
}


    $(document).ready(function() {

  loadData();

});

function RemoveAccount(pid, pwhom) { 
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
    $.ajax({
      url  : "saveData.php",
      type : "post",
      data : { pid : pid, pwhom : pwhom, 'action' : 'delete' },
      success: function(data) {        
        if(data.trim() == 'true') {
          loadData();
          toastr.success('Deleted Successfully...!');          
        }else{
          loadData();
          toastr.error('Parent Record Cannot be Deleted');
        }     
      }
    });
  }
  return false; 
}

function jFPDF(codeval, patient_Id) {
  //alert(codeval);
    $.ajax({
        method: "POST",
        url: "pdf_gen.php",
        data: { 'type': 'pdf', 'codeval': codeval, 'patient_Id':patient_Id}
    })
    .done(function (msg) {
        window.open(msg, "_blank");
    });
}

</script>

<!--<a href="javascript:void(0)" download title = "Generate PDF" style="font-size:22px;" onclick="jFPDF('${oData.codeval}', '${oData.patient_Id}')"><i class="dw dw-file-154"></i></a>-->