

						<?php if ($this->session->flashdata('message') ):?>
								<?= $this->session->flashdata('message'); ?>
							</div>
						<?php endif; ?>

					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="<?= base_url() ?>assets/img/<?= $user['avatar']; ?>" class="img-circle" alt="Avatar">
										
									</div>
									<div class="profile-stat">
										<div class="row">
										<h3 class="name"><?= $user['username']; ?></h3>
										<span class="online-status status-available">Available</span>
										
										</div>
										
									</div>
								</div>
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading"></h4>
										<ul class="list-unstyled list-justify" style="text-align: center;">
											<li><a href="<?= base_url('') ?>profile/changePass/<?= $user['kd_user']; ?>" class="btn btn-primary">Change Password</a></li>
										</ul>
									</div>
								</div>
								
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right" style="height: 310px;">
							<!-- AWARDS -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading" style="margin-top: -50px;"><?= $judul; ?></h4>
										<ul class="list-unstyled list-justify">
											<li>Username <span><?= $user['username']; ?></span></li>
											<li>Password <span>***</span></li>
											<li>Provinsi <span><?= $user['kd_provinsi']; ?></span></li>
										</ul>
									</div>
								</div>
								<!-- END AWARDS -->
								
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
		