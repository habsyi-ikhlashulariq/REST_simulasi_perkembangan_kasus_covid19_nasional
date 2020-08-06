<?php if ($this->session->flashdata('message') ):?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>
<form class="navbar-form navbar-right" method="post" action="">
											<div class="input-group">
												<input type="text" value="" class="form-control" placeholder="Cari Kasus" name="keyword">
												<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
											</div>
										</form>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
									<a href="<?= base_url('kasus/tambah') ?>" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Tambah Kasus</span></a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#NO</th>
												<th>Provinsi</th>
												<th>Positif</th>
												<th>Sembuh</th>
												<th>Meninggal</th>
												<th>Dirawat</th>
												<th>PDP</th>
												<th>ODP</th>
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
                                        <?php  $no = 1; foreach ($data_kasus as $kasus) :?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $kasus['nm_provinsi'] ?></td>
                                                <td><?= $kasus['positif'] ?></td>
                                                <td><?= $kasus['sembuh'] ?></td>
                                                <td><?= $kasus['meninggal'] ?></td>
                                                <td><?= $kasus['dirawat'] ?></td>
                                                <td><?= $kasus['pdp'] ?></td>
                                                <td><?= $kasus['odp'] ?></td>
												<td>
													<a href="<?= base_url() ?>kasus/edit/<?= $kasus['id_kasus'] ?>" class="btn btn-warning"><i class="lnr lnr-sync"></i> <span>Update</span></a>

													<a href="<?= base_url() ?>kasus/hapus/<?= $kasus['id_kasus'] ?>" class="btn btn-danger"  onclick="return confirm('Yakin Mau Di Hapus');"><i class="lnr lnr-trash"></i> <span>Delete</span></a>
												</td>
                                            </tr>
                                        <?php  endforeach; ?>
										</tbody>
									</table>
