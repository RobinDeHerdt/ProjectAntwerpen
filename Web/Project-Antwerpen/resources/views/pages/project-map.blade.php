@extends('layout')

@section('title')
  Home
@stop
@extends('navigation-layout')
@section('content')

  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2499.1022632989943!2d4.419058851572484!3d51.21719177948828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3f703e7404c69%3A0x270b07bbe1f68aa6!2sAntwerpen-Centraal!5e0!3m2!1snl!2sbe!4v1461764810465" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var d = document.getElementById("kaart");
d.className += " active";


function initialize() {
	var LatLng = new google.maps.LatLng({{$project->xcoord}},{{$project->ycoord}});
	console.log(LatLng);
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
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap" style="width:100%;height:79vh;"></div>
@stop
