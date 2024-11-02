
    function loadData() {
  
    $("#Form_Table").dataTable().fnDestroy();
    var table=$('#Form_Table').DataTable(
    {
        "processing" : true,
        "serverSide" : false,
        "pagingType" : "full_numbers",
        "ajax"       : {
            url      : "actions.php",
            type     : 'post',
            data     : { 'action' : 'staff_show'},
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
            { "data" : "document_no" },
            { "data" : "department" },            
            { "data" : "gate_in_date" },
            { "data" : "gate_out_date" },
            { "data" : "gate_status" },           

            { "data" : "veh_img",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                  $(nTd).html(`<img width="100%" height="100px" src="${oData.veh_img}"/>`);
                } 
              },
              { "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                let bnTd = '';                             

                  if (oData.status == '1'){

                  bnTd += `<button type="button" class="btn btn-primary">Approved</button>&nbsp;&nbsp;`
                }else if (oData.status == '0'){

                      bnTd += `<button type="button" class="btn btn-warning">Pending</button>`
                        }else if (oData.status == '2'){

                      bnTd += `<button type="button" class="btn btn-danger">Rejected</button>`
                        }
                        $(nTd).html(bnTd);                      
                        
                }
                
              },

            { "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                let bnTd = '';
                bnTd = `<div class="dropdown">
                      <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <i class="dw dw-more"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="edit_Staff.php?type=view&randomId=${oData.randomId}"><i class="dw dw-eye"></i> View</a>
                        <a class="dropdown-item" href="edit_Staff.php?type=edit&randomId=${oData.randomId}"><i class="dw dw-edit2"></i> Edit</a>
                        <a class="dropdown-item" href="#" onclick="RemoveAccount(${oData.id})"><i class="dw dw-delete-3"></i> Delete</a>
                      </div>
                    </div> `;

                  //                   <a href="#" title="Serial" onclick="ShowAccount(${oData.id})"><i class="fa-solid fa-plus"></i></a>&nbsp;&nbsp;
                 // data-toggle="modal" data-target="#myModal"
                
                /*<a href="#" title="Delete" onclick="RemoveAccount(${oData.id})"><i class="fas fa-trash"></i></a>&nbsp;&nbsp;

                  if (oData.status == '1'){

                  bnTd += <a href="#" title="Status" onclick="Statusenable(${oData.id},0)"><i class="fa fa-check" aria-hidden="true"></i></a>&nbsp;&nbsp;;
                }else{

                      bnTd += <a href="#" title="Status" onclick="Statusenable(${oData.id},1)"><i class="fa fa-times" aria-hidden="true"></i></a>;
                        }*/
                        $(nTd).html(bnTd);
                }
              }
        ],
        //dom: 'lBfrtip',
        select: true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
            { className: 'text-center', targets: [0,1,2,3,4,5,6,7] },

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


function RemoveAccount(id) {
  let check = confirm('Are You Sure You want To delete This Data..?');
  if(check) {
    $.ajax({
      url  : "actions.php",
      type : "post",
      data : { id : id, 'action' : 'staff_delete' },
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
  