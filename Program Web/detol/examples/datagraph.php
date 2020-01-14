<?php
include 'koneksi.php';
?>

<?php
// $waktu = mysqli_query($conn,"SELECT reading_time FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
// $temp = mysqli_query($conn,"SELECT temp FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
// $humid = mysqli_query($conn,"SELECT humid FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
// $pm25 = mysqli_query($conn,"SELECT pm25 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
// $pm10 = mysqli_query($conn,"SELECT pm10 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 20) Var1 ORDER BY reading_time ASC");
$waktu = mysqli_query($conn,"SELECT waktu FROM ( SELECT * FROM datakendaran ORDER BY waktu DESC LIMIT 20) Var1 ORDER BY waktu ASC");
$query1 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran` WHERE golongan=1");
$golongan1 = mysqli_fetch_assoc($query1);
$query2 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran` WHERE golongan=2");
$golongan2 = mysqli_fetch_assoc($query2);
$query3 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran` WHERE golongan=3");
$golongan3 = mysqli_fetch_assoc($query3);
$query4 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran` WHERE golongan=4");
$golongan4 = mysqli_fetch_assoc($query4);
$query5 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran` WHERE golongan=5");
$golongan5 = mysqli_fetch_assoc($query5);
$query6 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran` WHERE golongan=6");
$golongan6 = mysqli_fetch_assoc($query6);
?>
             <canvas id=myChart class="ml-3" width="300" height="100" style="margin-left: -4%"></canvas>
              <div class="content">
        <div class="row">
          <div class="col-md-12">
              </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Tunggu beberapa saat
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="#" target="_blank">DE-TOL GRAPH</a>
                </li>
                <li>
                  <a href="#" target="_blank">Alifahmi 2019</a>
                </li>
                <li>
                  <a href="#" target="_blank">Support</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </footer>
<script>
	var canvas = document.getElementById('myChart');
        var data = {
            labels: ['Golongan 1','Golongan 2','Golongan 3','Golongan 4','Golongan 5','Golongan 6'],
            datasets: [
            {
                label: "Golongan",
                backgroundColor: "rgba(0, 0, 0, 0)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 1,
                pointBorderColor: "rgba(200, 99, 132, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php echo join($golongan1, ',') ?>, <?php echo join($golongan2, ',') ?>, <?php echo join($golongan3, ',') ?> , <?php echo join($golongan4, ',') ?>, <?php echo join($golongan5, ',') ?>, <?php echo join($golongan6, ',') ?>],
            }
            ]
        };

        var option = 
        {
          showLines: true,
          animation: {duration: 0}
        };
        
        var myLineChart = Chart.Line(canvas,{
          data:data,
          options:option
        });

</script>