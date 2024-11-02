             /*   Parking Page*/

   $(function() {
  
  $("form[name='addformpage']").validate({
   
    rules: {         
       document_no            : "required",
       department        : "required",
       gate_ent_type        : "required",
       gate_in_date      : "required",
       gate_out_date     : "required",
       gate_status        : "required",
       newdate           : "required",
       narration         : "required",
       gate              : "required",
       vehicle           : "required",
       gateIn            : "required",
       gateout           : "required",
       //vehiclePhoto      : "required",
    },

    // Specify validation error messages
    messages: {         
       document_no       : "Please Enter Your Doc No",
       department    		 : "Please Enter Department",
       gate_ent_type     : "Please Enter Gate Entry",
       gate_in_date      : "Please Select Gate In Date",
       gate_out_date     : "Please Select Gate Out Date",
       gate_status       : "Please Enter Get Status",
       newdate           : "Please Select The Date",
       narration         : "Please Enter Your Address",
       gate    				   : "Please Select Your Gate",
       vehicle         	 : "Please Select Your Vehicle",
       gateIn            : "Please Select Your GateIn Time",
       gateout     			 : "Please Select Your Gateout Time ",
       //vehiclePhoto      : "Please Select Your Vehicle Photo",

      
    },
    
    submitHandler: function(form) {
      //alert('hii');
        let formdata = new FormData();
        let x = $('#addformpage').serializeArray();
        $.each(x, function(i, field){
          formdata.append(field.name,field.value);
        });
        formdata.append('action' , 'parking_update');

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
              toastr.success('saved successfully...!');
              setTimeout(function (){
                location.href = "manageparking.php";
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

         

