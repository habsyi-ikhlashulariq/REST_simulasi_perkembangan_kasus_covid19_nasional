<?php
date_default_timezone_set('Asia/Jakarta');

$date = new DateTime('now');
$tgl_skrng = $date->format('Y-m-d H:i:s');

?>
<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
                                    <form action="" method="post">
										<div class="col-sm-6">
										<label for="Positif"> Positif :</label>
										<input type="text" id="Positif" class="form-control" placeholder="Positif" name="positif" value="<?= $kasus[0]['positif'] ?>">
										<small class="form-text text-danger"><?= form_error('positif'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Sembuh :</label>
										<input type="text" id="sembuh" class="form-control" placeholder="Sembuh" name="sembuh" value="<?= $kasus[0]['sembuh'] ?>">
										<small class="form-text text-danger"><?= form_error('sembuh'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Positif"> Meninggal :</label>
										<input type="text" id="meninggal" class="form-control" placeholder="Meninggal" name="meninggal" value="<?= $kasus[0]['meninggal'] ?>">
										<small class="form-text text-danger"><?= form_error('meninggal'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Dirawat :</label>
										<input type="text" id="Dirawat" class="form-control" placeholder="Dirawat" name="dirawat" value="<?= $kasus[0]['dirawat'] ?>">
										<small class="form-text text-danger"><?= form_error('dirawat'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Positif"> PDP :</label>
										<input type="text" id="PDP" class="form-control" placeholder="PDP" name="pdp" value="<?= $kasus[0]['pdp'] ?>">
										<small class="form-text text-danger"><?= form_error('pdp'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> ODP :</label>
										<input type="text" id="ODP" class="form-control" placeholder="ODP" name="odp" value="<?= $kasus[0]['odp'] ?>">
										<small class="form-text text-danger"><?= form_error('odp'); ?></small>
                                        <br>
										</div>
										<input type="hidden" name="kd_provinsi" value="<?= $kasus[0]['kd_provinsi'] ?>">
										<input type="hidden" name="update_at" value="<?= $tgl_skrng; ?>">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </form>
                            </div>
