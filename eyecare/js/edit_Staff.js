$(function() {
  
  $("form[name='addform']").validate({    
   
    rules: {         
       document_no            : "required",
       department             : "required",       
       gate_entry_type        : "required",
       staff_name             : "required",
       gate_in_date           : "required",
       gate_out_date          : "required",
       gate_status            : "required",
       narration              : "required",
       tdate                  : "required",
       gate                   : "required",
       gate_in                : "required",
       gate_out               : "required",
       veh_img                : "required",
       
       
      
    },
    // Specify validation error messages
    messages: {         
       document_no            : "Please Select Document No.",
       department             : "Please Select Department Name",      
       gate_entry_type        : "Please Select Gate Entry Type.",
       staff_name             : "Please Select Staff Name",
       gate_in_date           : "Please Enter Gate In Date",
       gate_out_date          : "Please Enter Gate Out Date",
       gate_status            : "Please Enter Gate Status",
       narration              : "Please Enter Narration",
       tdate                  : "Please Enter The Date",
       gate                   : "Please Enter The Gate",
       gate_in                : "Please Select Gate In",
       gate_out               : "Please Select Gate Out",
       veh_img                : "Please Select Image",

              
      
    },
    
    submitHandler: function(form) {
      //alert('hii');
        let formdata = new FormData();
        let x = $('#addform').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'staff_update');
        let veh_img = $('#veh_img')[0].files;
        if (veh_img.length > 0){
          formdata.append('veh_img' , veh_img[0]);
        } 
       
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
              toastr.success('Updated Successfully...!');
              setTimeout(function (){
                location.href = "manageStaff.php";
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


veh_img.onchange = evt => { 
  const [file] = veh_img.files 
  if (file) { 
    // document.getElementById("previewImgpreviewImg").style.display =""; 
    document.getElementById("previewImg").style.display = ""; 
    previewImg.src = URL.createObjectURL(file) 
  } 
}