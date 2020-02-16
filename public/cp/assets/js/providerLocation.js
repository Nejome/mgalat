
var riyadh = {
    lat: parseFloat(document.getElementById("initLat").value),
    lng: parseFloat(document.getElementById("initLng").value)
};

var map = new google.maps.Map(
    document.getElementById('map'),
    {
        center: riyadh,
        zoom: 5
    });

var marker = new google.maps.Marker({
    position: riyadh,
    map: map
});

google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng, marker);
});

function placeMarker(map, location, marker) {

    marker.setPosition(location);

    document.getElementById("lat").value = marker.getPosition().lat();
    document.getElementById("lng").value = marker.getPosition().lng();

}
