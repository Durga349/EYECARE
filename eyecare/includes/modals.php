
<!-- ================================GeneralHealth============================================ -->

<!-- Modal -->
<div class="modal fade" id="generalhealth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">General Health</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
    <div class="col-md-6">
      <label>Field Name</label>
      <input type="text" name="fieldName" id="fieldName" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Display Field Name</label>
      <input type="text" name="displayFieldName" id="displayFieldName" class="form-control">
    </div>
    <div class="col-md-6 mt-3">
      <label>Type</label>
      <input type="text" name="type" id="type" class="form-control">
    </div>
    <div class="col-md-6 mt-3">
      <label>Type Values</label>
      <input type="text" name="typevalues" id="typevalues" class="form-control">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right:66%;">Close</button>
        <button type="button" class="btn btn-primary" onclick="savedata()">Save</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   function savedata() {
// alert('HAI'); 
let fieldName        = $('#fieldName').val();
let displayFieldName = $('#displayFieldName').val();
let type             = $('#type').val();
let typevalues       = $('#typevalues').val();

let formData         = new FormData();

      formData.append('fieldName', $('#fieldName').val());
      formData.append('displayFieldName', $('#displayFieldName').val());
      formData.append('type', $('#type').val());
      formData.append('typevalues', $('#typevalues').val());

      formData.append('action','submit');
 
 $.ajax({
        url : 'savegeneral_health.php',
        type : 'POST',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
         success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
               $('#generalhealth').modal('hide');
               location.reload();
              },1000);
              setTimeout(function() {
                 $('#generalhealth').removeAttr('disabled');
            }, 2000);
            }
            else{
              toastr.error(data);
            }
          }
    });

}
</script>

 <!-- -------------------------OcularSymptoms-------------------------------- -->
  <!-- Modal -->
<div class="modal fade" id="OcularSymptoms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ocular Symptoms</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
    <div class="col-md-6">
      <label>Field Name</label>
      <input type="text" name="Name" id="Name" class="form-control">
    </div>
    <div class="col-md-6">
      <label>Display Field Name</label>
      <input type="text" name="FieldName" id="FieldName" class="form-control">
    </div>
    <div class="col-md-6 mt-3">
      <label>Type</label>
      <input type="text" name="type1" id="type1" class="form-control">
    </div>
    <div class="col-md-6 mt-3">
      <label>Type Values</label>
      <input type="text" name="typevalue" id="typevalue" class="form-control">
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right:66%;">Close</button>
        <button type="button" class="btn btn-primary" onclick="Symptoms()">Save</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   function Symptoms() {
// alert('HAI'); 
let Name       = $('#Name').val();
let FieldName  = $('#FieldName').val();
let type1      = $('#type1').val();
let typevalue  = $('#typevalue').val();

let formData         = new FormData();
      formData.append('Name', $('#Name').val());
      formData.append('FieldName', $('#FieldName').val());
      formData.append('type1', $('#type1').val());
      formData.append('typevalue', $('#typevalue').val());

      formData.append('action','save');
 
 $.ajax({
        url : 'saveOcularSymptoms.php',
        type : 'POST',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
         success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
               $('#OcularSymptoms').modal('hide');
               location.reload();
              },1000);
              setTimeout(function() {
                 $('#OcularSymptoms').removeAttr('disabled');
            }, 2000);
            }
            else{
              toastr.error(data);
            }
          }
    });

}
</script>
 
