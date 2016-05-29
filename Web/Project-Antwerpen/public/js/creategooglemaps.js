function displayMap()
{
    document.getElementById('googleMap').style.display="block";
    initialize();
}
function initialize() {
    var initLat = 51.220269043488635;
    var initLng = 4.401529439178489;

    if (document.getElementById('lng').value != 0) 
    {
        initLat = parseFloat(document.getElementById('lat').value);
        initLng = parseFloat(document.getElementById('lng').value);
    }
    else 
    {
        document.getElementById('lng').value = initLng;
        document.getElementById('lat').value = initLat;
    }

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