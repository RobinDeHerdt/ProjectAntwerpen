var maploaded = false;

function displayMap()
{
    document.getElementById('googleMap').style.display="block";
    initialize();
}
function initialize() {
    var initLat = parseFloat(document.getElementById('lat').value);
    var initLng = parseFloat(document.getElementById('lng').value);

    if (document.getElementById('saveLng').value != 0 && document.getElementById('saveLat').value != 0 && !maploaded)
    {
        var savedLat = parseFloat(document.getElementById('saveLat').value);
        var savedLng = parseFloat(document.getElementById('saveLng').value); 
        
        initLat = savedLat;
        initLng = savedLng;

        maploaded = true;
    }

    document.getElementById('lat').value = initLat;
    document.getElementById('lng').value = initLng;

    var mapProp = {
        center:new google.maps.LatLng(initLat,initLng),
        zoom:12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
        position: {lat: initLat, lng: initLng},
        map: map,
        draggable: true,
    });

    
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });

    google.maps.event.addListener(marker, "drag", function(event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();

        document.getElementById('lng').value = lng;
        document.getElementById('lat').value = lat;
    });
}