
								<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
                                    <form action="" method="post">
										<div>
										<label for="nama"> Nama :</label>
										<input type="text" id="nama" class="form-control" placeholder="Nama" name="nama">
										<small class="form-text text-danger"><?= form_error('nama'); ?></small>
                                        <br>
										</div>
										<div>
										<label for="email"> Email :</label>
										<input type="text" id="email" class="form-control" placeholder="Email" name="email">
										<small class="form-text text-danger"><?= form_error('email'); ?></small>
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
										<input type="hidden" name="avatar" value="default.png"><br>
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                                    </form>
                            </div>
