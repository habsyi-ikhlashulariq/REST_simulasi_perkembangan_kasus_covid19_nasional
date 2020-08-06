<?php if ($this->session->flashdata('message') ):?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>
<form class="navbar-form navbar-right" method="post" action="">
											<div class="input-group">
												<input type="text" value="" class="form-control" placeholder="Cari User" name="keyword">
												<span class="input-group-btn"><button type="submit" class="btn btn-primary">Cari</button></span>
											</div>
										</form>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
									<a href="<?= base_url('user/tambah') ?>" class="btn btn-primary"><i class="lnr lnr-plus-circle"></i> <span>Tambah Data User</span></a>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#NO</th>
												<th>Nama</th>
												<th>Email</th>
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
                                        <?php  $no = 1; foreach ($user as $user) :?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $user['nama'] ?></td>
                                                <td><?= $user['email'] ?></td>
												<td>
													<a href="<?= base_url() ?>user/hapus/<?= $user['kd_user'] ?>" class="btn btn-danger"  onclick="return confirm('Yakin Mau Di Hapus');"><i class="lnr lnr-trash"></i> <span>Delete</span></a>
												</td>
                                            </tr>
                                        <?php  endforeach; ?>
										</tbody>
									</table>
