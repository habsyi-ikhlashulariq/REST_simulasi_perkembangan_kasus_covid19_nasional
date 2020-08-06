
<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
                                    <form action="" method="post">
										<label for="nm_provinsi">Nama Provinsi :</label>
										<select name="provinsi" id="" class="form-control">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($provinsi as $provinsi) :?>
												<?php if ($sub_provinsi['kd_provinsi']==$provinsi['kd_provinsi']):?>
												<option value="<?= $provinsi['kd_provinsi'] ?>" selected><?= $provinsi['nm_provinsi'] ?></option>
												<?php else : ?>
												<option value="<?= $provinsi['kd_provinsi'] ?>"><?= $provinsi['nm_provinsi'] ?></option>
												<?php endif; endforeach; ?>
										</select>
										<small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
										<br>
										<div class="col-sm-4">
										<label for="Kota"> Kota :</label>
										<input type="text" id="Kota" class="form-control" placeholder="Kota" name="nm_kota" value="<?= $sub_provinsi['nm_kota'] ?>">
										<small class="form-text text-danger"><?= form_error('kota'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-4">
										<label for="Jumlah Positif"> Kabupaten :</label>
										<input type="text" id="Kabupaten" class="form-control" placeholder="Kabupaten" name="nm_kab" value="<?= $sub_provinsi['nm_kab'] ?>">
										<small class="form-text text-danger"><?= form_error('sembuh'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-4">
										<label for="Positif"> Kecamatan :</label>
										<input type="text" id="Kecamatan" class="form-control" placeholder="Kecamatan" name="nm_kec" value="<?= $sub_provinsi['nm_kec'] ?>">
										<small class="form-text text-danger"><?= form_error('Kecamatan'); ?></small>
                                        <br>
										</div>
										<input type="hidden" name="id" value="<?= $sub_provinsi['id'] ?>">
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                                    </form>
                            </div>
