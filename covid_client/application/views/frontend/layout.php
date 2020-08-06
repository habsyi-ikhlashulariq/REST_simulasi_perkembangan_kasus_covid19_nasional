<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <title>UNBIN CORONA</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#">
    <img src="<?= base_url() ?>temp/assets/img/unbin.png" width="200px" >
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#updateKasus">Update Kasus</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#pemetaan">Peta Penyebaran</a>
      </li>
    </ul>
  </div>
</nav>


        <div class="content-wrapper" style="margin-top:95px">
        <img src="<?= base_url() ?>temp/assets/img/corona.jpeg" width="1349px" >
        </div>       
        <marquee>Habsyi Ikhlashul Ariq 14180057 , Muhammad Fadil Zamali 14180019 , Rizqi Nur Robby 14180045</marquee>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-12" id="updateKasus">
                    <h1 class="text-center">Update Corona</h1>
                </div>
                <div class="row my-3">
                <div class="card-deck">
                <div class="card text-center text-white bg-danger mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">POSITIF </h5>
                            <?php echo $jumlah['positif']; ?>
                        </div>
                    </div>

                    <div class="card text-center text-white bg-warning mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">SEMBUH</h5>
                            <?php echo $jumlah['sembuh']; ?>
                        </div>
                    </div>

                     <div class="card text-center text-white bg-primary mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">MENINGGAL</h5>
                            <?php echo $jumlah['meninggal']; ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-12">
                    <h1 class="text-center">Data Terbaru</h1>
            </div>

            
          <div class="col-lg-12 col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Kota</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="text-center">
                  <tr>
                    <th class="text-white bg-danger mb-3"># No</th>
                    <th class="text-white bg-danger mb-3">Kota</th>
                    <th class="text-white bg-danger mb-3">Kabupaten</th>
                    <th class="text-white bg-danger mb-3">Kecamatan</th>
                    <th class="text-white bg-danger mb-3">Zona</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($data_kota as $data) {
                    
                  
                  ?>
                  <tr>
                    <td><a href=""></a> <?php echo $no++; ?></span></td>
                    <td class="text-center"><?php echo $data['nm_kota'] ?></td>
                    <td class="text-center"><?php echo $data['nm_kab'] ?></td>
                    <td class="text-center"><?php echo $data['nm_kec'] ?></td>
                    <td class="text-center"><?php echo $data['warna'] ?></td>
                 </tr>
                 <?php } ?>
                  
                  </tbody>

                  </table>
                </div>
            </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-12" id="pemetaan">
                    <h1 class="text-center">Peta Penyebaran</h1>
                </div>
            </div>
            <div class="col-sm-12">
<div id="mymap" style="height: 600px;"></div>
</div>

<script>
    var mymap = L.map('mymap').setView([-6.850179, 107.406483], 8);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    id: 'mapbox/dark-v10',
    tileSize: 512,
    zoomOffset: -1
        }).addTo(mymap);
        //latitude y longitude x

        <?php foreach ($data_kota as $data_kota): ?>
                                        
        L.circle([<?= $data_kota['latitude']; ?>,<?= $data_kota['longitude']; ?>], {
            radius: <?= $data_kota['radius']; ?>,
              color: '<?= $data_kota['warna']; ?>',
	            fillColor: '<?= $data_kota['warna']; ?>',
	            fillOpacity: 0.5,
                                          
         }).bindPopup("<b>Kota :<?= $data_kota['nm_kota'] ?></b>").addTo(mymap);
        <?php endforeach; ?>
        
</script>

        </div>


        <footer class="main-footer mt-5">
    <!-- To the right -->
    <div class="d-none d-sm-inline">
    </div>
      <center>  &copy; Progamming Language 2 &copy;</center> 
    <!-- Default to the left -->
  </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
  </body>
</html>