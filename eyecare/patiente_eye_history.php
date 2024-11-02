<?php include "includes/header.php"; 

?>


  <?php include "includes/navbar.php"; ?>

  <?php include "includes/sidebar.php"; ?>
  
<style>
    .error{
      color: red;
    }
  </style>

  <div class="mobile-menu-overlay"></div>

  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-9 col-sm-12">
              <div class="title">
                <h4>Patient</h4>
              </div>
              
            </div>
          <div class="col-md-3 col-sm-12">
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Visitor</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30" style="">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="text-blue h4">Patient Eye History</h4><br>
              <!-- <p class="mb-30">All bootstrap element classies</p> -->
            </div>
            
          </div>
          <form name="addformpage" id="addformpage"  autocomplete="off" method="post" enctype="multipart/form-data">
            
              <div class="row">
                <div class="col-md-6">
                  <label>Date of Last eye exam.</label>  
             

                  <input type="date" name="eye_exam" id="eye_exam" class="form-control" >
                </div>
                
              <div class="col-md-6">
                  <label>Department</label>
              <select name="department" id="department" class="form-control">
                    <option value="">Choose Department</option>
                    <?php foreach($dropdowns_data as $value){ ?>  
                     <option value="<?php echo $value['id']?>"><?php echo $value['department']?></option>
                     <?php }?>
                  </select> 
                </div>
            </div>
            
            <div class="row pt-2">
                <div class="col-md-6">
                  <label>Gate Entry Type</label>
                   <select class="custom-select col-12" name="gate_entry_type" id="gate_entry_type">
                  <option value="">Choose Gate Entry Type</option>
                   <?php foreach($dropdowns_data as $key=> $value){ ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['gate_ent_type']; ?></option>
                <?php } ?>
                </select>
                  
                </div>
                
            
                <div class="col-md-6">
                  <label>Visitor</label>
                  <select class="custom-select col-12" name="visitor" id="visitor">
                     <option value="">Choose Visitor</option>
                  <?php foreach($dropdowns_data as $key=> $value){ ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['visitor_name']; ?></option>
                <?php } ?>
                </select>
                  
                </div>
                
              
            </div>
            
            
            <div class="row pt-2">
                <div class="col-md-6">
                  <label>Gate In Date</label>
                   <input type="date" name="gate_in_date" id="gate_in_date" class="form-control">
                  
                </div>
                
            <div class="col-md-6">
                  <label>Gate Out Date</label>
                   <input type="date" name="gate_out_date" id="gate_out_date" class="form-control">
                  
                </div>
                
              
            </div>
            <div class="row pt-2">
                <div class="col-md-6">
                  <label>Gate Status</label>
                   <select class="custom-select col-12" name="gate_status" id="gate_status">
                  <option value="">Choose Gate Status</option>
                  <?php foreach($dropdowns_data as $key=> $value){ ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['gate_status']; ?></option>
                <?php } ?>
                </select>
                  
                </div>                
           
            </div>
            <div class="row pt-2">
                <div class="col-md-6">
                  <label>Date</label>
                   <input type="date" name="tdate" id="tdate" class="form-control">
                  
                </div>
                
            <div class="col-md-6">
                  <label>Gate</label>
                   <select class="custom-select col-12" name="gate" id="gate">
                  <option value="">Choose Gate</option>
                  <?php foreach($dropdowns_data as $key=> $value){ ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['gate']; ?></option>
                <?php } ?>
                </select>
                </div>
                
              
            </div>
            <div class="row pt-2">
                <div class="col-md-6">
                  <label>Gate In</label>
                   <input type="time" name="gate_in" id="gate_in" class="form-control">
                  
                </div>
                
            <div class="col-md-6">
                  <label>Gate Out</label>
                   <input type="time" name="gate_out" id="gate_out" class="form-control">
                </div>
                
              
            </div>            
            <div class="row pt-2">
            <div class="col-md-6">
                  <label>Narration</label>
                  <textarea name="narration" id="narration" class="form-control" ></textarea>
                  
                </div>
              
              </div>
              
               <div id="tool-placeholder"></div>
              <div class="row pt-2">
                <div class="col-md-6">
                <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageVisitors.php'" style="float: left;">
              </div>
              <div class="col-md-6">
              <input type="submit" name="submit" value="Save" class="btn btn-primary" style="float: right;">
            </div>
              </div>
          </form>
          
        </div>
        <!-- Default Basic Forms End -->

        
      </div>
      
    </div>
  </div>
  <!-- Footer -->
      <?php include "includes/footer.php"; ?>
