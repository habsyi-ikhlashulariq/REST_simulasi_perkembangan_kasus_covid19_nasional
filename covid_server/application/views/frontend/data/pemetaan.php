<div class="col-sm-12">
<div id="mapid" style="height: 600px;"></div>
</div>


<script>
var mymap = L.map('mapid').setView([-3.987131, 114.007273], 5);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1
}).addTo(mymap);
//latitude y longitude x
<?php foreach ($pemetaan as $pemetaan): ?>
    L.marker([<?= $pemetaan['latitude'] ?>, <?= $pemetaan['longitude'] ?>]).addTo(mymap)
    .bindPopup("Provinsi : <?= $pemetaan['nm_provinsi'] ?><br>"+
    "Positif :  <?= $pemetaan['positif']?><br>"+
    "Sembuh :  <?= $pemetaan['sembuh'] ?><br>"+
    "Meninggal :  <?= $pemetaan['meninggal'] ?><br>"
    );

<?php endforeach; ?>


</script>