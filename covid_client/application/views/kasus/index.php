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
												<th>Tools</th>
											</tr>
										</thead>
										<tbody>
                                        <?php  $no = 1; foreach ($data_kasus as $kasus) :?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $kasus['positif'] ?></td>
                                                <td><?= $kasus['sembuh'] ?></td>
                                                <td><?= $kasus['meninggal'] ?></td>
                                                <td><?= $kasus['dirawat'] ?></td>
                                                <td><?= $kasus['pdp'] ?></td>
                                                <td><?= $kasus['odp'] ?></td>
												<td>
													<a href="<?= base_url() ?>kasus/edit/<?= $kasus['kd_provinsi'] ?>" class="btn btn-warning"><i class="lnr lnr-sync"></i> <span>Update</span></a>
												</td>
                                            </tr>
                                        <?php  endforeach; ?>
										</tbody>
									</table>
