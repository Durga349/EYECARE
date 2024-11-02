$(function() {
  
  $("form[name='addform']").validate({    
   
    rules: {         
       document_no            : "required",
       department             : "required",
       flow_classify          : "required",       
       gate_ent_type          : "required",       
       weighment_type         : "required",
       weighment_req          : "required",
       weigh_bridge           : "required",
       weighing_type          : "required",       
       material_trans         : "required",
       material_type          : "required",
       gate_status            : "required",
       gate                   : "required",
       vendor_name            : "required",
       ven_name_village       : "required",
       staff_name             : "required",
       visitor_name           : "required",
       agent                  : "required",
       vehicle                : "required",
       
      
    },
    // Specify validation error messages
    messages: {         
       document_no            : "Please Enter Document No.",
       department             : "Please Enter Department Name",   
       flow_classify          : "Please Enter Flow Classsify",      
       gate_ent_type          : "Please Enter Gate Entry Type.",
       weighment_type         : "Please Enter Weighment Type",
       weighment_req          : "Please Enter Weighment Requirement",
       weigh_bridge           : "Please Enter Weigh Bridge",
       weighing_type          : "Please Enter Weighing Type",
       agent                  : "Please Enter Weighment Requirement",       
       material_trans         : "Please Enter Material Transaction",
       material_type          : "Please Enter Material Type",
       gate_status            : "Please Enter Gate Status",
       gate                   : "Please Enter The Gate",
       vendor_name            : "Please Enter Gate In",
       ven_name_village       : "Please Enter Vendor Village Name",
       staff_name             : "Please Enter Staff Name",
       visitor_name           : "Please Enter Visitor Name",
       agent                  : "Please Enter Agent",
       vehicle                : "Please Enter Vehicle",

              
      
    },
    
    submitHandler: function(form) {
      //alert('hii');
        let formdata = new FormData();
        let x = $('#addform').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'dropdown_save');      
       
        $.ajax({
          type: "POST",
          url: "actions.php",
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          data: formdata,
          success: function (data) {
            if (data.trim() == 'true'){
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "add_Dropdowns.php";
              },1000);
            }
            else{
              toastr.error(data);
            }
          }
        });
      }
  });
});


