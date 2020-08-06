
								<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
                                    <form action="" method="post">
										<div>
										<label for="Username"> Username :</label>
										<input type="text" id="Username" class="form-control" placeholder="Username" name="username">
										<small class="form-text text-danger"><?= form_error('username'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Password"> Password :</label>
										<input type="password" id="sembuh" class="form-control" placeholder="Password" name="password1">
										<small class="form-text text-danger"><?= form_error('password1'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="password"> Confirm Password :</label>
										<input type="password" id="password" class="form-control" placeholder="Password" name="password2">
										<small class="form-text text-danger"><?= form_error('password'); ?></small>
                                        <br>
										</div>
										<select name="provinsi" id="" class="form-control"> 
											<option value="">Pilih Provinsi</option>
											<?php  foreach ($provinsi as $provinsi) :?>
											<option value="<?= $provinsi['kd_provinsi'] ?>"><?= $provinsi['nm_provinsi'] ?></option>
											<?php endforeach; ?>
										</select>
										<input type="hidden" name="status" value="0"><br>
										<input type="hidden" name="avatar" value="default.png"><br>
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                                    </form>
                            </div>
