
var locationsCount = document.getElementById('locationsCount').value;
var icon = document.getElementById('icon').value;

if(locationsCount > 0) {

    var mapOptions = {center: new google.maps.LatLng(
            document.getElementById('lat1').value,
            document.getElementById('lng1').value
        ),
        zoom: 10
    };

    map = new google.maps.Map(document.getElementById('departmentMap'), mapOptions);

    for (var i = 1; i <= locationsCount; i++) {

        var rate = ``;
        var rateValue = document.getElementById('rate'+i).value;
        var star1;
        var star2;
        var star3;
        var star4;
        var star5;

        if(rateValue >= 1){
            star1 = `<i class="fa fa-star  filled-star-selected"></i>`;
        }else{
            star1 = `<i class="fa fa-star"></i>`;
        }
        if(rateValue >= 2){
            star2 = `<i class="fa fa-star  filled-star-selected"></i>`;
        }else{
            star2 = `<i class="fa fa-star"></i>`;
        }
        if(rateValue >= 3){
            star3 = `<i class="fa fa-star  filled-star-selected"></i>`;
        }else{
            star3 = `<i class="fa fa-star"></i>`;
        }
        if(rateValue >= 4){
            star4 = `<i class="fa fa-star  filled-star-selected"></i>`;
        }else{
            star4 = `<i class="fa fa-star"></i>`;
        }
        if(rateValue >= 5){
            star5 = `<i class="fa fa-star  filled-star-selected"></i>`;
        }else{
            star5 = `<i class="fa fa-star"></i>`;
        }

        var windowContent = `
        <img class="d-inline-block mr-2 ml-2 mt-2" src="`+document.getElementById('image'+i).value+`" style="width: 60px; height: 60px; border-radius: 50%;float: right">
        <div class="info-window-text mt-2"  style="float: right;font-size: 18px;">
             <span style="color: #2386c9;">`+document.getElementById('specialty'+i).value+`</span><br>
             `+document.getElementById('name'+i).value+`<br>
             <ul class="stars pr-0">
             `+star1+``+star2+``+star3+``+star4+``+star5+`
             </ul>
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



