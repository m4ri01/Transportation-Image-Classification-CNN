<?php
include 'koneksi.php';
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
  }
// $temp1 = mysqli_query($conn,"SELECT temp FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
// $humid2 = mysqli_query($conn,"SELECT humid FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
// $pm253 = mysqli_query($conn,"SELECT pm25 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
// $pm104 = mysqli_query($conn,"SELECT pm10 FROM ( SELECT * FROM data ORDER BY reading_time DESC LIMIT 1) Var1 ORDER BY reading_time ASC");
$hasil = mysqli_query($conn,"SELECT golongan FROM datakendaran WHERE golongan IS Not NULL GROUP  BY golongan ORDER  BY COUNT(*) DESC LIMIT 1");
$max = mysqli_fetch_assoc($hasil);
$result = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran`");
$total = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../images/icons/barrier.png"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    DE-TOL
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="../assets/js/plugins/jquery-latest.js"></script> 
  <script type="text/javascript" src="../assets/js/plugins/mdb.min.js"></script>
<script>
var refreshId = setInterval(function()
{
    $('#responsecontainer').load('datagraph.php');
}, 3000);
</script>
<script>
  var refreshId = setInterval(function()
{
    $('#atas').load('atas.php');
}, 3000);
  </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../images/icons.png">
          </div>
        </a>
        <a href="dashboard.php" class="simple-text logo-normal">
          DE-TOL
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="#">
             <!--  <i class="nc-icon nc-pin-3"></i> -->
              <p></p>
            </a>
          </li>
          <li>
            <a href="./tables.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Data Table</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">DE-TOL</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content">
        <div class="row">
        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-bus-front-12 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Golongan Terbanyak</p>
                      <p class="card-title"><?php echo "Golongan "; echo $max['golongan']; ?>
                        <p>
                    </div>
                  </div>
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
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-bus-front-12 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Total Kendaraan</p>
                      <p class="card-title"><?php echo $total['total']; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i> Tunggu beberapa saat
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="row">
          <div id="atas">
          </div>
           <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h2 class="card-title text-center">DETOL WEB BASED</h2>
              </div>
            </div>
           </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">DE-teksi TOL Monitoring</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
              <div id="responsecontainer">
               <!--  <canvas id=myChart width="400" height="100"></canvas>
            -->   </div>
              </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/jquery-3.4.1.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!-- <script>
    $(function(){

  //get the line chart canvas
  var ctx = $("#myChart");

  //line chart data
  var data = {
    labels: ["match1", "match2", "match3", "match4", "match5"],
    datasets: [
      {
        label: "TeamA Score",
        data: [10, 50, 25, 70, 40],
        backgroundColor: "blue",
        borderColor: "lightblue",
        fill: false,
        lineTension: 0,
        radius: 5
      },
      {
        label: "TeamB Score",
        data: [20, 35, 40, 60, 50],
        backgroundColor: "green",
        borderColor: "lightgreen",
        fill: false,
        lineTension: 0,
        radius: 5
      }
    ]
  };

  //options
  var options = {
    responsive: true,
    title: {
      display: true,
      position: "top",
      text: "Line Graph",
      fontSize: 18,
      fontColor: "#111"
    },
    legend: {
      display: true,
      position: "bottom",
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    }
  };

  //create Chart class object
  var chart = new Chart(ctx, {
    type: "line",
    data: data,
    options: options
  });
});
  </script> -->
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script type="text/javascript">
    setTimeout(function(){
   $( "#mytable" ).load( "your-current-page.html #mytable" );
}, 2000);
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
