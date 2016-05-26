@extends('layout')
 
 @section('title')
   Nieuwe meningvraag
 @stop
 
 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 
 
 <a href="/nieuwemeningvraag" class="btn btn-success meningbutton">Meningvraag toevoegen</a>
 
<script type="text/javascript">
	var d = document.getElementById("meningen");
	d.className += " active";
</script>
@stop