

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $countPositif; ?><sup style="font-size: 20px"></sup></h3>

                <p>Positif</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $countSembuh; ?><sup style="font-size: 20px"></sup></h3>

                <p>Sembuh</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $countMeninggal; ?><sup style="font-size: 20px"></sup></h3>

                <p>Meninggal</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $countDirawat; ?><sup style="font-size: 20px"></sup></h3>

                <p>Di Rawat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Per Provinsi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="text-center">
                  <tr>
                    <th># No</th>
                    <th>Provinsi</th>
                    <th>Positif</th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no =1; foreach ($data_kasus as $data_kasus): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><a href="<?= base_url('kasus/') ?>"><?= $data_kasus['nm_provinsi']; ?></a> </span></td>
                    <td class="text-center"><span class="badge badge-warning"><?= $data_kasus['positif'] ?></span></td>
                    <td class="text-center"><span class="badge badge-success"><?= $data_kasus['sembuh'] ?></span></td>
                    <td class="text-center"><span class="badge badge-danger"><?= $data_kasus['meninggal'] ?></span></td>
                 </tr>
                  <?php endforeach; ?>
                  </tbody>
                  </table>
                </div>
            </div>
            </div>
