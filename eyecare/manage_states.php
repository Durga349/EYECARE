<?php include "includes/header.php";
 ?>

<body>
  

<?php include "includes/navbar.php"; ?>

  
<?php include "includes/sidebar.php"; ?>
<style type="text/css">
  
  #s1 {
    color: red;
  }

  #s2{
    color: red;
  }
</style>
  
<!-- save Role Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add State</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row form-group">
          <div class="col-4">
          <label for="inputName" style="font-size: 20px;">State Name</label>
            </div>
             <div class="col-8">
                <input type="text" id="state_name" name="state_name" class="form-control" placeholder="Enter City Name">
                <span id="s1"></span>
              </div>
              </div>
            </div>
              
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
           <button type="button" name="save" id="save" class="btn btn-primary"  onclick="save()">Save</button>
        </div>
        
      </div>
    </div>
  </div>
  <!----------------- save role Modal End ----------------->

<!-- Edit Role Modal Start -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Edit Form</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row form-group">
                <div class="col-4">
                  <label for="inputName">State Name</label>
                </div>
                <div class="col-8">
                  <input type="hidden" name="edit_hdnid" id="edit_hdnid">
                  <input type="text" id="edit_state_name" name="edit_state_name" class="form-control" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
                  <span id="s2"></span>
              </div>
            </div>
          </div>

          <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="update()">Update</button>
            </div>
    </div>
  </div>
</div>
<!-- Edit Role Modal End -->
<!-- Delete Role Modal start -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Item</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        <div class="modal-body">
         <div class="row form-group">
          <div class = "col-12">
                    <input type = "hidden" id = "del_id"/>
                    Do you want to delete the Data?
                </div>
              </div>       
            </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" 
          onclick="deleteval()">Delete</button>
        </div>
      </div>    
    </div>
  </div>

  <!-- Delete Role Modal End -->

  <div class="mobile-menu-overlay"></div>

  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <div class="title">
                <h4>States Data</h4>
              </div>
              
            </div>
            <div class="col-md-3 col-sm-12 text-right">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                  <li class="breadcrumb-item active" aria-current="page">States Data</li>
                </ol>
              </nav>  
            </div>
          </div>
        </div>
        <!-- Simple Datatable start -->
        <div class="card-box mb-30">
          <div class="pd-20">

            <div class="row">
              <div class="col-md-10">
            <h4 class="text-blue h4">States Data</h4>
            </div>
            <div class="col-md-2">
            <!-- <button type="button" ></button> -->
             <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add State</a>
            </div>
            </div>
         
          
          </div>
          <!-- <div class="pb-20"> -->
            <div class = "card-body">
                        <div class = row>
                          <div class = "col-12 table-responsive">
            <table class="data-table table stripe hover nowrap" width="100%" align="center" id="Form_Table">
              <thead>
                <tr>
                  <th >S.No</th>
                  <th class="table-plus datatable-nosort">State Name</th>
                  <th class="datatable-nosort">Actions</th>
                </tr>
              </thead>
              
            </table>
          </div>
        </div>
      </div>
    </div>
       
        
        
      </div>
      <?php include "includes/footer.php"; ?>

    </div>
  </div>
  <!-- js -->
 <script>
 	function loadData() {
  
    $("#Form_Table").dataTable().fnDestroy();
    var table=$('#Form_Table').DataTable(
    {
        "processing" : true,
        "serverSide" : false,
        "pagingType" : "full_numbers",
        "ajax"       : {
            url      : "saveStates.php",
            type     : 'post',
            data     : { 'action' : 'show'},
        },

        "columns": [
            /*{
              "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                 $(nTd).html(`<input type="checkbox" name="uniqueId[]" id="trxn_chk${oData.id}" value="${oData.id}">`);
                  }
            },*/
            {
              render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
              }
            },
            { "data" : "state_name",className : 'text-center' },
            
            { "data" : "id",
              fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                let bnTd = '';
                         bnTd = `<a href="#" onclick="edit(${oData.id})" style="color:blue;font-size:18px;"><i class="dw dw-edit2"></i></a>
                        <a href="#" onclick="jFDelete(${oData.id})" style="color:red;font-size:18px;"><i class="dw dw-delete-3"></i></a> `;

                
                        $(nTd).html(bnTd);
                }
              }
        ],
        //dom: 'lBfrtip',
        select: true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        columnDefs: [
            { className: 'text-center', targets: [0,2] },

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


/*save modal*/

function save() {

    let state_name = $('#state_name').val();        
    
    if(state_name==''){ 
        $('#s1').html('Please Enter Role Name'); 
        $('#state_name').focus(); 
        return false; 

    }
    else{ 
      // return true; 

  let arr = [];
  let formData = new FormData();
  formData.append('state_name', $('#state_name').val());
  formData.append('action','save');
 
 $.ajax({
        url : 'saveStates.php',
        type : 'POST',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        success : function(data){
          $('#save').attr('disabled',true)
          // console.log(data);
            if (data.trim() == 'true'){
              
              toastr.success("Saved successfully...!");
               setTimeout(function (){
                location.href = "manage_states.php";
              },1000);
               
            }
            else{
              $('#save').attr('disabled',false);
              toastr.error('error');
            }
        }
    });
}    
} 

/*edit Modal*/
function edit(id) {
 $.ajax({
        url : 'saveStates.php',
        type : 'POST',
        data : {'action' : 'edit', 'id' : id},
        success : function(data){
            if (data){
              let edit_data = JSON.parse(data);

                $('#edit_state_name').val(edit_data[0]['state_name']);
                
                $('#edit_hdnid').val(edit_data[0]['id']);
                
                $('#editModal').modal('show');
            }
            else{
              toastr.error('error');
            }
        }
    });
}
/*update modal*/
function update() {

   let edit_state_name = $('#edit_state_name').val();        

if(edit_state_name==''){ 
    $('#s2').html('Please Enter City Name'); 
    $('#edit_state_name').focus(); 
    return false; 

}
else{ 
  // return true; 


  let arr1 = [];
  let formData = new FormData();
  formData.append('state_name', $('#edit_state_name').val());
  formData.append('hdn_id',$('#edit_hdnid').val());
  formData.append('action','update'); 
 
 $.ajax({
        url : 'saveStates.php',
        type : 'POST',
        data : formData,
         cache: false,
          contentType: false,
          processData: false,
        success : function(data){
          //console.log(data);
            if (data.trim() == 'true'){
              toastr.success("Roles Updated successfully...!");
            setTimeout(function (){
              window.location.href = "manage_states.php";
              },1000);
            }
            else{
              toastr.error('error');
            }
        }
    });
}
}
/*delete modal*/
function jFDelete(id){
    $('#del_id').val(id);
    $('#deleteModal').modal('show');
}
function deleteval() {
  let del_id = $('#del_id').val()
    $.ajax({
      url  : "saveStates.php",
      type : "post",
      data : { id : del_id, 'action' : 'delete' },
      success: function(data) {
        if(data.trim() == 'true') {
          
          toastr.success('deleted successfully...!');
          
           $('#deleteModal').modal('hide');
          loadData();
        }       
      }
    });
  return false;
  }

  /*validation modal*/

  function validation() 
  {     
    let state_name = $('#state_name').val();        
    
    if(state_name=='')
    { 
        $('#s1').html('Please Enter Role Name'); 
        $('#state_name').focus(); 
        return false; 
    }
      else
      { 
      return true; 
      } 
  }


 </script>
