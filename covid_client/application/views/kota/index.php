<?php if ($this->session->flashdata('message') ):?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>
<form class="navbar-form navbar-right" method="post" action="">
											<div class="input-group">
												<input type="text" value="" class="form-control" placeholder="Cari Kota" name="keyword">
												<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
											</div>
										</form>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
										<a href="<?= base_url('kota/tambah') ?>" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Tambah Data Kota</span></a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#NO</th>
												<th>Nama Kota</th>
												<th>Nama Kabupaten</th>
												<th>Nama Kecamatan</th>
												<th>Zona Warna</th>
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
                                        <?php  $no = 1; foreach ($sub_provinsi as $sub_provinsi) :?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $sub_provinsi['nm_kota'] ?></td>
                                                <td><?= $sub_provinsi['nm_kab'] ?></td>
                                                <td><?= $sub_provinsi['nm_kec'] ?></td>
                                                <td><?= $sub_provinsi['warna'] ?></td>
												<td>
													
													<a href="<?= base_url() ?>kota/edit/<?= $sub_provinsi['id'] ?>" class="btn btn-warning"><i class="lnr lnr-trash"></i> <span>Update</span></a>
												</td>
                                            </tr>
                                        <?php  endforeach; ?>
										</tbody>
									</table>
