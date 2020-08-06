
								<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
                                    <div class="col-sm-7">
                                        <div id="map" style="height: 500px;"></div>

                                    </div>
                                <div class="col-sm-5">
                                    <form action="" method="post">
										<label for="nm_kota">Kota :</label>
										<input type="text" class="form-control" placeholder="Kota" name="nm_kota" value="<?= $data_kota['nm_kota']; ?>">
										<small class="form-text text-danger"><?= form_error('nm_kota'); ?></small>
										<br>
										<label for="nm_kab"> Kabupaten :</label>
										<input type="text" class="form-control" placeholder="Kabupaten" name="nm_kab" value="<?= $data_kota['nm_kab']; ?>">
										<small class="form-text text-danger"><?= form_error('nm_kab'); ?></small>
                                        <br>
										<label for="nm_kec"> Kecamatan :</label>
										<input type="text" class="form-control" placeholder="Kecamatan" name="nm_kec" value="<?= $data_kota['nm_kec']; ?>">
										<small class="form-text text-danger"><?= form_error('nm_kec'); ?></small>
                                        <br>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Latitude :</label>
										<input type="text" id="Latitude" class="form-control" placeholder="Latitude" name="latitude" value="<?= $data_kota['latitude']; ?>" readonly>
										<small class="form-text text-danger"><?= form_error('latitude'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Longitude :</label>
										<input type="text" id="Longitude" class="form-control" placeholder="Longitude" name="longitude" value="<?= $data_kota['longitude']; ?>" readonly>
										<small class="form-text text-danger"><?= form_error('longitude'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Radius :</label>
										<select name="radius" id="" class="form-control">
												<option value="">Pilih Radius</option>
												<?php foreach ($radius as $radius) :?>
												<?php if ($radius == $data_kota['radius']) : ?>
													<option value="<?= $radius ?>" selected><?= $radius ?></option>
													<?php else : ?>
													<option value="<?= $radius ?>"><?= $radius ?></option>
													<?php endif; ?>
											<?php endforeach; ?>
										</select>
										<small class="form-text text-danger"><?= form_error('radius'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for="Jumlah Positif"> Warna :</label>
										<select name="warna" id="" class="form-control">
												<option value="">Pilih Zona Warna</option>
												<?php foreach ($warna as $warna) :?>
												<?php if ($warna == $data_kota['warna']) : ?>
													<option value="<?= $warna ?>" selected><?= $warna ?></option>
													<?php else : ?>
													<option value="<?= $warna ?>"><?= $warna ?></option>
													<?php endif; ?>
											<?php endforeach; ?>
										</select>
										<small class="form-text text-danger"><?= form_error('warna'); ?></small>
                                        <br>
										</div>
										<input type="hidden" name="kd_provinsi" value="<?= $this->session->userdata('kd_provinsi') ?>">
										<input type="hidden" name="id" value="<?= $data_kota['id'] ?>">
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                                    </form>
                                </div>
                            </div>
<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[-6.850179, 107.406483];	
}

var map = L.map('map').setView([-6.850179, 107.406483], 8);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			id: 'mapbox/streets-v11'
}).addTo(map);

map.attributionControl.setPrefix(false);

var marker = new L.marker(curLocation, {
	draggable:'true'
});

marker.on('dragend', function(event) {
var position = marker.getLatLng();
marker.setLatLng(position,{
	draggable : 'true'
	}).bindPopup(position).update();
	$("#Latitude").val(position.lat);
	$("#Longitude").val(position.lng).keyup();
});

$("#Latitude, #Longitude").change(function(){
	var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
	marker.setLatLng(position, {
	draggable : 'true'
	}).bindPopup(position).update();
	map.panTo(position);
});
map.addLayer(marker);
</script>
