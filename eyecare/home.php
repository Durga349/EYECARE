<?php include "includes/header.php";?>

<body>  

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <?php include "includes/navbar.php"; ?>

  <?php include "includes/sidebar.php"; 
include "includes/modals.php";?>

  <div class="mobile-menu-overlay"></div>

  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
      <div class="card-box mb-30">
        <div class="pb-20">
          <div class = "card-body">
            <div class = row>
              <div class = "col-12 table-responsive">
                <div class="pd-18">
                  <div class="row">
                    <?php 
                    $general_hel_show = "SELECT distinct(city) FROM visitors WHERE WEEKOFYEAR(date) = WEEKOFYEAR(NOW())";
                    $show_data = $crud->getData($general_hel_show);
                    foreach($show_data as $row){
                      $general_hel_show1 = "SELECT distinct(patient_Id) FROM visitors WHERE city='".$row['city']."' and  WEEKOFYEAR(date) = WEEKOFYEAR(NOW())";

                      $show_data1 = $crud->getData($general_hel_show1); 

                      $customers= count($show_data1);

                      $entry .= "['" . $row['city'] . "'," . $customers . "],";

                    }

                    $general_hel_showm = " SELECT distinct(city) FROM visitors WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW())";
                    $show_datam = $crud->getData($general_hel_showm);

                    foreach($show_datam as $rowm){
                      $general_hel_show1m = "SELECT distinct(patient_Id) FROM visitors WHERE city='".$rowm['city']."' and  YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW())";
                      $show_data1m = $crud->getData($general_hel_show1m); 

                      $customersm= count($show_data1m);

                      $entrym .= "['" . $row['city'] . "'," . $customersm . "],";

                    }

                     ?>
                     <div class="col-md-5 mt-3">
                      <div id="columnchart12" style="width: 500px; height: 500px;"></div>
                    </div>
                    <div class="col-md-5 mt-3">
                      <div id="columnchart13" style="width: 500px; height: 500px;"></div>
                    </div>
                    
                     
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <?php include "includes/footer.php"; ?>
    </div>
  </div>

  <script type="text/javascript">
 

 google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['City', 'Customers'],
          <?php echo $entry ?>
        ]);

        var options = {
          title: 'Weekly Customer Visitors By Their City'
        };

        var chart = new google.visualization.PieChart(document.getElementById('columnchart12'));

        chart.draw(data, options);
      }

 google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
          ['City', 'Customers'],
          <?php echo $entrym ?>
        ]);

        var options = {
          title: 'Monthly Customer Visitors By Their City'
        };

        var chart = new google.visualization.PieChart(document.getElementById('columnchart13'));

        chart.draw(data, options);
      }

    </script>

