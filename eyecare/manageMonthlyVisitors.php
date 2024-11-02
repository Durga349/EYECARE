<?php include "includes/header.php"; 
$todate = date('Y-m');

$getCount ="select count(*) as count from personal_information where LEFT(date, 7) ='".$todate."'";
$resCount =$crud->getData($getCount);
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
                <!-- <h4>Users</h4> -->
                 <p><b>No.of Visitors:<?php echo $resCount[0]['count']; ?></b></p> 
              </div>
              
            </div>
            <!--   <div class="col-md-4  col-sm-12">
              
            </div> -->
            <div class="col-md-3 col-sm-12 text-right">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
              </nav>  
            </div>
          </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
          <div class="pd-18">
            <div class="row">
              <div class="col-md-4">
            <!-- <h4 class="text-blue h4">General Health</h4> -->
            </div>
            <div class="col-md-4 mt-3">
              <!-- Button trigger modal -->
     <!--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generalhealth">
       <i class="fa-sharp fa-solid fa-plus"></i>
       </button> -->
        <!-- Button trigger modal -->

            <input type="month" name="month" id="month" class="form-control" value="<?php echo $todate; ?>">

            </div>
            <div class="col-md-4 mt-3">
              <input type="submit" name="show" id="show" value="Show" class="btn btn-primary"  onclick="filterData()">
            </div>
            </div>
            <!-- <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
          </div>
          <!-- <div class="pb-20"> -->
            <div class = "card-body">
                        <div class = row>
                          <div class = "col-12 table-responsive">
            <table class="data-table table stripe hover nowrap" width="100%" align="center" id="Form_Table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Date</th>
                  <th>Patient Number</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>City</th>
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
      <?php include "includes/footer.php"; ?>

    </div>
  </div>
  <!-- js -->
  <script type="text/javascript" >
var month = "";

function filterData() {
  month = $('#month').val();
  loadData();
}

function loadData() {
  $("#Form_Table").dataTable().fnDestroy();

  var table = $('#Form_Table').DataTable({
    "processing": true,
    "serverSide": false,
    "pagingType": "full_numbers",
    "ajax": {
      url: "saveUsers.php",
      type: 'post',
      data: { 'action': 'showMonthData', 'month': month },
    },
    "columns": [
      {
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        }
      },
      {
        "data": "date",
        "render": function (data, type, row) {
          var dateObject = new Date(data);
          var day = dateObject.getDate().toString().padStart(2, '0');
          var month = (dateObject.getMonth() + 1).toString().padStart(2, '0');
          var year = dateObject.getFullYear();
          return day + '-' + month + '-' + year;
        }
      },
      { "data": "patient_number" },
      { "data": "patientFname" },
      { "data": "cell" },
      { "data": "city" },
      {
        "data": "id",
        fnCreatedCell: function (nTd, sData, oData) {
          let bnTd = `<a href="javascript:void(0)" download title="Generate PDF" style="font-size:22px;" onclick="jFPDF('${oData.patient_number}')"><i class="dw dw-file-154"></i></a>&nbsp;&nbsp;`;
          $(nTd).html(bnTd);
        }
      }
    ],
    select: true,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    columnDefs: [
      { className: 'text-center', targets: [0, 1, 2, 3, 4, 5] },
      { width: 200, targets: 1 },
    ],
    aoColumnDefs: [{ 'bSortable': false, 'aTargets': ['no-sort'] }],
    sPaginationType: 'full_numbers',
  });
}

$(document).ready(function () {
  month = $('#month').val();
  loadData();
});


function RemoveAccount(columnId) {
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
    $.ajax({
      url  : "saveUsers.php",
      type : "post",
      data : { columnId : columnId, 'action' : 'del' },
      success: function(data) {
        if(data == 'true') {
          toastr.success('deleted successfully...!');
          loadData();
        }       
      }
    });
  }
  return false;
}
  function jFPDF(patient_number) {
  // alert(codeval);
  // alert(patient_Id);
    $.ajax({
        method: "POST",
        url: "pdf_gen1.php",
        data: { 'type': 'pdf', 'patient_number': patient_number}
    })
    .done(function (msg) {
        window.open(msg, "_blank");
    });
}


  </script>
  

  