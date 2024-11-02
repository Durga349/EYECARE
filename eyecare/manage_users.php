<?php include "includes/header.php"; ?>
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
              <div class="col-md-10">
            <!-- <h4 class="text-blue h4">General Health</h4> -->
            </div>
            <div class="col-md-2 mt-3">
              <!-- Button trigger modal -->
     <!--   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generalhealth">
       <i class="fa-sharp fa-solid fa-plus"></i>
       </button> -->
        <!-- Button trigger modal -->

        <a class="btn btn-primary float-right" href="recent_users.php" style="margin-right: 5px;">Recent Users
      </a>
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
                  <th >S.No</th>
                  <th>Last Name</th>
                  <th>DOB</th>
                  <th>Contact</th>
                  <th>ToWhom</th> 
                  <th>City</th>
                  <th>State</th>
                  <th class="datatable-nosort">Actions</th>
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
    
    function loadData() {
  
    $("#Form_Table").dataTable().fnDestroy();
    var table=$('#Form_Table').DataTable(
    {
        "processing" : true,
        "serverSide" : false,
        "pagingType" : "full_numbers",
        "ajax"       : {
            url      : "save_users.php",
            type     : 'post',
            data     : { 'action' : 'show'},
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
            { "data" : "plasLtname" },
            { "data" : "dob" },            
            { "data" : "cell" },
            { "data" : "towhom" },
            { "data" : "city" },
            { "data" : "state" },
         
            { "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                let bnTd = '';
                // bnTd = `<div class="dropdown">
                //       <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                //         <i class="dw dw-more"></i>
                //       </a>
                //       <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                //         <a class="dropdown-item" href="edit_view_generalhealth.php?type=view&Id=${oData.columnId}"><i class="dw dw-eye"></i>View</a>
                //         <a class="dropdown-item" href="edit_view_generalhealth.php?type=edit&Id=${oData.columnId}"><i class="dw dw-edit2"></i>Edit</a>
                //         <a class="dropdown-item" href="#" onclick="RemoveAccount(${oData.columnId})"><i class="dw dw-delete-3"></i> Delete</a>
                //       </div>
                //     </div> `;
           
                        $(nTd).html(bnTd);
                }
              }
        ],
        //dom: 'lBfrtip',
        select: true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
            { className: 'text-center', targets: [0,1,2,3,4,5] },

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
      //alert('hiii');
  loadData();
});


function RemoveAccount(columnId) {
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
    $.ajax({
      url  : "savegeneral_health.php",
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


// function Statusenable(id,status) {
//   let check = confirm('Are You Sure You want To Change the Status.?');
//   if(check) {
//     $.ajax({
//       url  : "saveAbout.php",
//       type : "post",
//       data : { id:id, 'action' : 'statusyes','status':status },
//       success: function(data) {
//         if(data == 'true') {
//           toastr.success('Status successfully changed ...!');
//           setTimeout(function (){
//                loadData();
//               },1000);
//         }       
//       }
//     });
//   }
//   return false;
// }
  
  </script>
  

  