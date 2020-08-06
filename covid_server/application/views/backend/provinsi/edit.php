<div class="panel-heading">
										<h3 class="panel-title"><?= $judul; ?></h3><br>
								</div>
								<div class="panel-body">
<div class="col-sm-7">
    <div id="map" style="height: 500px;">
</div>

</div>
<div class="col-sm-5">
                                    <form action="" method="post">
										<label for="nm_provinsi">Nama Provinsi :</label>
										<input type="text" class="form-control" placeholder="Nama provinsi" name="nm_provinsi" value="<?=$provinsi['nm_provinsi']; ?>">
										<small class="form-text text-danger"><?= form_error('nm_provinsi'); ?></small>
										<br>
										<div class="col-sm-6">
										<label for=""> Latitude :</label>
										<input type="text" id="Latitude" class="form-control" placeholder="Latitude" name="latitude" value="<?=$provinsi['latitude']; ?>" readonly>
										<small class="form-text text-danger"><?= form_error('latitude'); ?></small>
                                        <br>
										</div>
										<div class="col-sm-6">
										<label for=""> Longitude :</label>
										<input type="text" id="Longitude" class="form-control" placeholder="Longitude" name="longitude" value="<?=$provinsi['longitude']; ?>" readonly>
										<small class="form-text text-danger"><?= form_error('longitude'); ?></small>
                                        <br>
										</div>
                                        <input type="hidden" name="kd_provinsi" value="<?=$provinsi['kd_provinsi']; ?>">
                                        <input type="submit" class="btn btn-primary" value="Simpan Data">
                                    </form>
</div>
</div>
<script>
var curLocation=[0,0];
if (curLocation[0]==0 && curLocation[1]==0) {
	curLocation =[-3.987131, 114.007273];	
}

var map = L.map('map').setView([-3.987131, 114.007273], 5);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
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
