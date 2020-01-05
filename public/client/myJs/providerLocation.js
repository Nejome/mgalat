var latitude = document.getElementById('latitude').value;
var longitude = document.getElementById('longitude').value;

var mapOptions = {
    scrollwheel: false,
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(latitude, longitude)
};

map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

var pos = new google.maps.LatLng(latitude, longitude);
marker = new google.maps.Marker({
    position: pos,
    animation: google.maps.Animation.DROP,
    map: map
});
