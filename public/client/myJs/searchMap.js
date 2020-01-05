
var locationsCount = document.getElementById('locationsCount').value;
var icon = document.getElementById('icon').value;

if(locationsCount > 0) {

    var mapOptions = {center: new google.maps.LatLng(
            document.getElementById('lat1').value,
            document.getElementById('lng1').value
            ),
        zoom: 10
    };

    map = new google.maps.Map(document.getElementById('searchMap'), mapOptions);

    for (var i = 1; i <= locationsCount; i++) {

        var windowContent = `
                        <div class="marker-window">
                            <div class="marker-window-image-container" style="width: 30%; text-align: right; float: right;">
                                <img src="`+document.getElementById('image'+i).value+`" style="width: 50px; height: 50px; border-radius: 50%;">
                            </div>
                            <div style="width: 70%; float: right;text-align: right;">
                                <p class="marker-window-text">`+document.getElementById('name'+i).value+`</p>
                            </div>
                        </div>
`;

        var infowindow =  new google.maps.InfoWindow({
            content: ""
        });

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(document.getElementById('lat'+i).value, document.getElementById('lng'+i).value),
            icon: icon,
            map: map
        });

        bindInfoWindow(marker, map, infowindow, windowContent);

    }

    function bindInfoWindow(marker, map, infowindow, description) {
        marker.addListener('click', function () {
            infowindow.setContent(description);
            infowindow.open(map, this);
        });
    }

}



