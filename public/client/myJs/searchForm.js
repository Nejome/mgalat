
var defaultLocation = new google.maps.LatLng(24.64670169330329, 46.65560080895057)

var mapOptions = {
    zoom: 5,
    center: defaultLocation
};

var map = new google.maps.Map(
    document.getElementById('searchMap'), mapOptions);

var marker = new google.maps.Marker({
    position: defaultLocation,
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
