 <?php
include 'koneksi.php';
$hasil = mysqli_query($conn,"SELECT golongan FROM datakendaran WHERE golongan IS Not NULL GROUP  BY golongan ORDER  BY COUNT(*) DESC LIMIT 1");
$max = mysqli_fetch_assoc($hasil);
$hasil2=mysqli_query($conn,"SELECT golongan FROM datakendaran WHERE golongan IS Not NULL GROUP  BY golongan ORDER  BY COUNT(*) ASC LIMIT 1");
$min = mysqli_fetch_assoc($hasil2);
$result = mysqli_query($conn,"SELECT COUNT(*) AS total FROM `datakendaran`");
$total = mysqli_fetch_assoc($result);
$result2 = mysqli_query($conn,"SELECT SUM(harga) AS total FROM `datakendaran`");
$harga = mysqli_fetch_assoc($result2);
?>
<style>
  #font{
    font-size: 1.2rem;
  }
  </style>
<div class="content">
<div class="row ml-2">
     <div class="col-lg-3 col-md-6 col-sm-6">
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
                      <p class="card-category">Golongan terbanyak</p>
                      <p class="card-title" id="font"><?php echo $max['golongan']; ?>
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
          <div class="col-lg-3 col-md-6 col-sm-6">
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
                      <p class="card-title" id="font"><?php echo $total['total']; ?>
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
          <div class="col-lg-3 col-md-6 col-sm-6">
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
                      <p class="card-category">Golongan tersedikit</p>
                      <p class="card-title" id="font"><?php echo $min['golongan']; ?>
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
          <div class="col-lg-3 col-md-6 col-sm-6">
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
                      <p class="card-category">Total Harga Masuk</p>
                      <p class="card-title" id="font"><?php echo "Rp"; echo $harga['total']; ?>
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
        </div>
        </div>
