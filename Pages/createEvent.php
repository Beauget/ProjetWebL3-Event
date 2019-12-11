<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>



<?php
if (!empty($_GET['error'])) {
    $error = '<div style="color:red;">' . $_GET['error'] . "</div>";
}
?>
<form method="post" action="./Controllers/createEventController.php">
    <form>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="formGroupExampleInput">Nom de l'évenement</label>
                <input type="text" class="form-control " placeholder="Nom" required>
            </div>
            <div class="form-group col-md-2">
                <label for="formGroupExampleInput">Ville</label>
                <input type="text" class="form-control " id="ville" placeholder="Ville" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Date</label>
                <input type="date" class="form-control " placeholder="Date">
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput">Rue</label>
                <input type="text" class="form-control" id="rue" placeholder="Rue" required>
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput">Numéro de rue</label>
                <input type="number" class="form-control" id="numerorue" placeholder="Numéro" required>
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput">Code postal</label>
                <input type="number" class="form-control" id="codepostal" placeholder="Code postal" required>
            </div>
            <div class="form-group col-md-2">
                <label for="formGroupExampleInput">Effectif minimum</label>
                <input type="number" class="form-control " placeholder="First name" required>
            </div>
            <div class="form-group col-md-2">
                <label for="formGroupExampleInput">Effectif maximum</label>
                <input type="number" class="form-control " placeholder="First name" required>
            </div>
            <div class="form-group col-md-2">
                <label for="formGroupExampleInput">Longitude</label>
                <input type="text" class="form-control " id="longitude" placeholder="First name" required>
            </div>
            <div class="form-group col-md-2">
                <label for="formGroupExampleInput">Latitude</label>
                <input type="text" class="form-control " id="latitude" placeholder="First name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Limite : 150 caractères"></textarea>
            </div>
        </div>
    </form>
<style type="text/css">
    #map {
        height: 400px;
    }
</style>


<div id="map">
</div>
<script>
    var carte = L.map('map').setView([48.852969, 2.349903], 10);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        minZoom: 8,
        id: 'mapbox/streets-v11',
        accessToken: 'pk.eyJ1IjoicGVudGhlb3MiLCJhIjoiY2szeXJuNDBvMGNpazNtdXMxMHE3YnJjdiJ9.OzT5veeoEvj6boiJIwwb9Q'
    }).addTo(carte);

    var marker = L.marker();

    carte.on('click', onMapClick);


    function onMapClick(e) {
        marker.setLatLng(e.latlng);
        marker.addTo(carte);
        document.getElementById("inputLat").value = e.latlng.lat;
        document.getElementById("inputLon").value = e.latlng.lng;
        addrByPositionOnMap(e.latlng.lat, e.latlng.lng);
    }

    function addrByPositionOnMap(lat, lon) {
        jQuery.getJSON('http://nominatim.openstreetmap.org/reverse?format=json&addressdetails=1&lat=' + lat + '&lon=' + lon, function(data) {
            var adress = data.address;
            typeof(adress.city) !== 'undefined' ? document.getElementById("ville").value = adress.city: document.getElementById("ville").value = adress.county;
            typeof(adress.postcode) !== 'undefined' ? document.getElementById("codePostal").value = adress.postcode: document.getElementById("codePostal").value = '';
            typeof(adress.road) !== 'undefined' ? document.getElementById("nomRue").value = adress.road: document.getElementById("nomRue").value = '';
            typeof(adress.house_number) !== 'undefined' ? document.getElementById("numRue").value = adress.house_number: document.getElementById("numRue").value = '';
        });
    }
</script>
