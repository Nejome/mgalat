var lat = document.getElementById('lat').value;
var lng = document.getElementById('lng').value;

var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(lat, lng)
};

map = new google.maps.Map(document.getElementById("providerLocatiolnMap"), mapOptions);

var pos = new google.maps.LatLng(lat, lng);
var icon = document.getElementById('icon').value;

var image = document.getElementById('image').value;
var city = document.getElementById('city').value;

var windowContent = `
                        <div class="marker-window">
                            <div class="marker-window-image-container" style="width: 30%; text-align: right; float: right;">
                                <img src="`+image+`" style="width: 50px; height: 50px; border-radius: 50%;">
                            </div>
                            <div style="width: 70%; float: right;text-align: right;">
                                <p class="marker-window-text"> مدينة `+city+`</p>
                            </div>
                        </div>
`;

var infowindow = new google.maps.InfoWindow({
    content: windowContent
});

marker = new google.maps.Marker({
    position: pos,
    icon: icon,
    animation: google.maps.Animation.DROP,
    map: map
});

marker.addListener('click', function() {
    infowindow.open(map, marker);
});
