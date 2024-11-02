function getDetails(v) {
     let gate_info = v;
     $.ajax({
        url : 'actions.php',
        type : 'POST',
        data : {'action' : 'gate_tablesData','gate_info' : gate_info},
        success : function(data){
         // console.log(data);         
            if (data){            
               let res_data = JSON.parse(data);
               
              let view_data = res_data['data'];             

              $("#table_data").html("");
              
              var s=1;
            for(var i=0; i<view_data.length; i++)
            {              
              s=i;
            var id =view_data[i].randomId;          
            $("#table_data").append('<tr><td>'+(s+1)+'</td><td>'+ view_data[i].vehicle +'</td><td>'+view_data[i].department+'</td><td>'+view_data[i].gate_in_date+'</td><td>'+view_data[i].gate_status+'</td><td><a title="Status" onclick="Statusenable(id,0)">Enable</a></td><td><a>View</a></td></tr>');

            
          } 

            }
            
        }
    });
   } 

function Statusenable(id,status) {
  alert(id);
  let check = confirm('Are You Sure You want To Change the Status.?');
  if(check) {
    $.ajax({
      url  : "saveAbout.php",
      type : "post",
      data : { id:id, 'action' : 'statusyes','status':status },
      success: function(data) {
        if(data == 'true') {
          toastr.success('Status successfully changed ...!');
          setTimeout(function (){
               loadData();
              },1000);
        }       
      }
    });
  }
  return false;
}