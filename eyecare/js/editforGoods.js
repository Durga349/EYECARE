 
   $(function() {
  
  $("form[name='addform']").validate({  	
   
    rules: {         
       document_no            : "required",
       department             : "required",
       flow_classify      	  : "required",
       gate_ent_type          : "required",
       weighment_type	        : "required",
       material_trans         : "required",
       agent                  : "required",
       weighment_req          : "required",
       vendor_name            : "required",
       gate_in_date           : "required",
       gate_out_date          : "required",
       gate_status            : "required",
       narration              : "required",
       date                   : "required",
       gate                   : "required",
       weigh_bridge           : "required",
       weighing_type          : "required",
       material_type          : "required",
       vehicle                : "required",
       outside_vehi			      : "required",
       ven_name_village       : "required",
       gate_in_time           : "required",
       gate_out_time          : "required",
       scanner_time           : "required",
      
    },
    // Specify validation error messages
    messages: {         
       document_no            : "Please Select Document No.",
       department             : "Please Select Department Name",
       flow_classify          : "Please Select Flow Classsify",
       gate_ent_type          : "Please Select Gate Entry Type.",
       weighment_type         : "Please Select Weighment Type",
       material_trans         : "Please Select Material Transaction",
       agent                  : "Please Select Agent",
       weighment_req          : "Please Select Is Weighment Required",
       vendor_name            : "Please Select Vendor Name",
       gate_in_date           : "Please Enter Gate In Date",
       gate_out_date          : "Please Enter Gate Out Date",
       gate_status            : "Please Enter Gate Status",
       narration              : "Please Enter Narration",
       date                   : "Please Enter The Date",
       gate                   : "Please Enter The Gate",
       weigh_bridge           : "Please Select Weigh Bridge",
       weighing_type          : "Please Select Weighing Type",
       material_type          : "Please Select Material Type",
       vehicle                : "Please Select Vehicle",
       outside_vehi	          : "Please Select Outside Vehicle",
       ven_name_village       : "Please Select Vendor Name In Village",
       gate_in_time           : "Please Select Gate In Time",
       gate_out_time          : "Please Select Gate Out Time",
       scanner_time           : "Please Select Scanner Time",       
      
    },
    
    submitHandler: function(form) {
      //alert('hii');
        let formdata = new FormData();
        let x = $('#addform').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'update_for_goods');

        let vehi_photo = $('#vehi_photo')[0].files;
        if (vehi_photo.length > 0){
          formdata.append('vehi_photo' , vehi_photo[0]);
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
              toastr.success('updated successfully...!');
              setTimeout(function (){
                location.href = "manageforGoods.php";
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
 

vehi_photo.onchange = evt => {
  const [file] = vehi_photo.files
  if (file) {
    // document.getElementById("previewImgpreviewImg").style.display ="";
    document.getElementById("previewImg").style.display = "";
    previewImg.src = URL.createObjectURL(file)
  }
} 