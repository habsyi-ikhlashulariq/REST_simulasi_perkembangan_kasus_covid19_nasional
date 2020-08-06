<?php if ($this->session->flashdata('message') ):?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>
									<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#NO</th>
												<th>Positif</th>
												<th>Sembuh</th>
												<th>Meninggal</th>
												<th>Dirawat</th>
												<th>PDP</th>
												<th>ODP</th>
												<th>Tanggal Diperbarui</th>
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
                                        <?php  $no = 1; foreach ($kasus_harian as $kasus) :?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $kasus['positif'] ?></td>
                                                <td><?= $kasus['sembuh'] ?></td>
                                                <td><?= $kasus['meninggal'] ?></td>
                                                <td><?= $kasus['dirawat'] ?></td>
                                                <td><?= $kasus['pdp'] ?></td>
                                                <td><?= $kasus['odp'] ?></td>
                                                <td><?= $kasus['update_at'] ?></td>
												<td>
                                                <a href="<?= base_url() ?>kasusharian/hapus/<?= $kasus['id'] ?>" class="btn btn-danger"  onclick="return confirm('Yakin Mau Di Hapus');"><i class="lnr lnr-trash"></i> <span>Delete</span></a>
												</td>
                                            </tr>
                                        <?php  endforeach; ?>
										</tbody>
									</table>
