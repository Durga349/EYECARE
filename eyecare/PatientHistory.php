
<?php include "includes/header.php"; ?>
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
          <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12">
              <div class="title">
                <h4>Patient Eye History</h4>
              </div>
            </div>
          <div class="col-md-3 col-sm-12">
              <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Patient</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <!-- Default Basic Forms Start -->
        <div class="pd-20 card-box mb-30" style="">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="text-blue h4">Add Patient</h4><br>
              <!-- <p class="mb-30">All bootstrap element classies</p> -->
            </div>
            
          </div>
          <form name="addformpage" id="addformpage"  autocomplete="off" method="post" enctype="multipart/form-data">
            
              <div class="row">
                <div class="col-md-6">
                  <label><b>Date of last eye exam:</b></label>  
                  <input type="date" name="date" id="date" class="form-control" placeholder="">
                </div>
                
              <div class="col-md-6">
                  <label><b>Do you currently wear glasses:</b></label><br>
                  <input type="radio" name="wear_glasses" id="wear_glasses1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="wear_glasses" id="wear_glasses2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
            
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Do you currently wear Contacts:</b></label><br>
                  <input type="radio" name="wear_contacts" id="wear_contacts1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="wear_contacts" id="wear_contacts2" value="No">&nbsp;No&nbsp;
                </div>
                <div class="col-md-6">
                  <label><b>What kind?</b></label>
                  <input type name="what_kind" id="what_kind" class="form-control" placeholder="">
                </div> 
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Solution Used?</b></label>
                  <input type name="solution_used" id="solution_used" class="form-control" placeholder="">
                </div>
                
            <div class="col-md-6">
                  <label><b>Are you satiesfied with the vision,and comfort of your contact lenses?</b></label>
                   <input type="radio" name="satiesfied" id="satiesfied1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="satiesfied" id="satiesfied2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-6">
                  <label><b>Would you prefer clear, or colored contacts?</b></label><br>
                   <input type="checkbox" name="clear[]" id="clear" class="form-check-inline" value="Clear">Clear&ensp;
                   <input type="checkbox" name="colored[]" id="colored" class="form-check-inline" value="Colored">Colored&ensp;
                   <input type="checkbox" name="both[]" id="both" class="form-check-inline" value="Both">Both&ensp;
                </div>                
                <div class="col-md-6">
                  <label><b>Do you use the computer?</b></label><br>

<input type="radio" name="computer" id="computer1" value="Yes">&nbsp;Yes&nbsp;
                  <input type="radio" name="computer" id="computer2" value="No">&nbsp;No&nbsp;
                </div>
            </div>
               <div class="row pt-4"> 
            <div class="col-md-6">
                  <label><b>Approx.how many hours a day do you use the computer?</b></label>
                   <input type="number" name="hours" id="hours" value="" placeholder="" class="form-control">
                </div>
                <div class="col-md-6">
                  <label><b>Occupation:</b></label>
                   <textarea name="occupation" id="occupation" class="form-control" ></textarea>
                </div>
              </div>
              
               <div id="tool-placeholder"></div>
              <div class="row pt-2">
                <div class="col-md-12">
                <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location = 'manageVisitors.php'" style="float: left;">
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