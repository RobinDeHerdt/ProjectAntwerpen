@extends('layout')
@section('title')
  Projectlocatie
@stop
@extends('navigation-layout')
@section('scripts')
<script src="http://maps.googleapis.com/maps/api/js"></script>
@stop
@section('content')
<script>
var d = document.getElementById("kaart");
d.className += " active";

function initialize() {
	var LatLng = new google.maps.LatLng({{$project->xcoord}},{{$project->ycoord}});

	var mapProp = {
		center: LatLng,
		zoom:12,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	var marker=new google.maps.Marker({
		position:LatLng,
	});

	marker.setMap(map);

	var infowindow = new google.maps.InfoWindow({
        content:"<h4>{{$project->project_name}}</h4><p>{{$project->info}}</p>"
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="projectdiv">
	<div id="googleMap" style="width:100%;height:85vh;"></div>
</div>
@stop
