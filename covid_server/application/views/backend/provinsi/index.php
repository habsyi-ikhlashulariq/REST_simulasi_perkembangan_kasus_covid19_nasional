<?php if ($this->session->flashdata('message') ):?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>
<form class="navbar-form navbar-right" method="post" action="">
											<div class="input-group">
												<input type="text" value="" class="form-control" placeholder="Cari Provinsi" name="keyword">
												<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
											</div>
										</form>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
									<a href="<?= base_url('provinsi/tambah') ?>" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Tambah Data Provinsi</span></a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#NO</th>
												<th>Nama Provinsi</th>
												<th>Latitude</th>
												<th>Longitude</th>
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
                                        <?php  $no = 1; foreach ($data_wilayah as $wilayah) :?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $wilayah['nm_provinsi'] ?></td>
                                                <td><?= $wilayah['latitude'] ?></td>
                                                <td><?= $wilayah['longitude'] ?></td>
												<td>
													<a href="<?= base_url() ?>provinsi/edit/<?= $wilayah['kd_provinsi'] ?>" class="btn btn-warning"><i class="lnr lnr-sync"></i> <span>Update</span></a>

													<a href="<?= base_url() ?>provinsi/hapus/<?= $wilayah['kd_provinsi'] ?>" class="btn btn-danger"  onclick="return confirm('Yakin Mau Di Hapus');"><i class="lnr lnr-trash"></i> <span>Delete</span></a>
												</td>
                                            </tr>
                                        <?php  endforeach; ?>
										</tbody>
									</table>
