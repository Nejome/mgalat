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
var specialty = document.getElementById('specialty').value;
var name = document.getElementById('name').value;

var rate = ``;
var rateValue = document.getElementById('rate').value;
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
        <img class="d-inline-block mr-2 ml-2 mt-2" src="`+image+`" style="width: 60px; height: 60px; border-radius: 50%;float: right">
        <div class="info-window-text mt-2"  style="float: right;font-size: 18px;">
             <span style="color: #2386c9;">`+specialty+`</span><br>
             `+name+`<br>
             <ul class="stars pr-0">
             `+star1+``+star2+``+star3+``+star4+``+star5+`
             </ul>
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
