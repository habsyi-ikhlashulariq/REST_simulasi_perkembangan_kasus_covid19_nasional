
<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
                                    <form action="" method="post">
										<label for="nm_provinsi">Nama Provinsi :</label>
										<select name="provinsi" id="" class="form-control">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($provinsi as $provinsi) :?>
												<?php if ($kasus['kd_provinsi']==$provinsi['kd_provinsi']):?>
												<option value="<?= $provinsi['kd_provinsi'] ?>" selected><?= $provinsi['nm_provinsi'] ?></option>
												<?php else : ?>
												<option value="<?= $provinsi['kd_provinsi'] ?>"><?= $provinsi['nm_provinsi'] ?></option>
												<?php endif; endforeach; ?>
										</select>
										<small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
										<br>
										<div class="col-sm-6">
										<label for="Positif"> Positif :</label>
										<input type="text" id="Positif" class="form-control" placeholder="Positif" name="positif" value="<?= $kasus['positif'] ?>">
										<small class="form-text text-danger"><?= form_error('positif'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Sembuh :</label>
										<input type="text" id="sembuh" class="form-control" placeholder="Sembuh" name="sembuh" value="<?= $kasus['sembuh'] ?>">
										<small class="form-text text-danger"><?= form_error('sembuh'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Positif"> Meninggal :</label>
										<input type="text" id="meninggal" class="form-control" placeholder="Meninggal" name="meninggal" value="<?= $kasus['meninggal'] ?>">
										<small class="form-text text-danger"><?= form_error('meninggal'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Dirawat :</label>
										<input type="text" id="Dirawat" class="form-control" placeholder="Dirawat" name="dirawat" value="<?= $kasus['dirawat'] ?>">
										<small class="form-text text-danger"><?= form_error('dirawat'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Positif"> PDP :</label>
										<input type="text" id="PDP" class="form-control" placeholder="PDP" name="pdp" value="<?= $kasus['pdp'] ?>">
										<small class="form-text text-danger"><?= form_error('pdp'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> ODP :</label>
										<input type="text" id="ODP" class="form-control" placeholder="ODP" name="odp" value="<?= $kasus['odp'] ?>">
										<small class="form-text text-danger"><?= form_error('odp'); ?></small>
                                        <br>
										</div>
										<input type="hidden" name="id_kasus" value="<?= $kasus['id_kasus'] ?>">
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                                    </form>
                            </div>
