
var defaultLocation = new google.maps.LatLng(24.64670169330329, 46.65560080895057)

var mapOptions = {
    zoom: 5,
    center: defaultLocation
};

var searchMap = new google.maps.Map(
    document.getElementById('searchMap'), mapOptions);

var searchMarker = new google.maps.Marker({
    position: defaultLocation,
    map: searchMap
});

google.maps.event.addListener(searchMap, 'click', function(event) {
    placeMarker(searchMap, event.latLng, searchMarker);
});

function placeMarker(map, location, marker) {

    marker.setPosition(location);

    document.getElementById("lat").value = marker.getPosition().lat();
    document.getElementById("lng").value = marker.getPosition().lng();

}

