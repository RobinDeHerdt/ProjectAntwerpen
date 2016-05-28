@extends('layout')

@section('title')
  Projecttijdlijn
@stop
@extends('navigation-layout')
@section('content')
<html lang="en" class="no-js">
<head>

	<link rel="stylesheet" href="\css/reset.css"> 
	<link rel="stylesheet" href="\css/timeline-style.css"> 
	<script src="\js/timeline-modernizr.js"></script>


</head>
  <div class="projectdiv">
	@if(!$project->milestones->isEmpty())
		<section id="cd-timeline" class="cd-container">
			@foreach ($project->milestones as $key=>$milestone)
				<div class="cd-timeline-block">
					<div class="cd-timeline-img cd-movie">
						<img src={{$milestone->milestone_image}} alt="icoontje">
					</div>

					<div class="cd-timeline-content">
						<h2>{{$milestone->milestone_title}}</h2>
						<p>{{ str_limit( $milestone->milestone_info, 110) }}</p>
						<a href="info#fase{{$key+1}}" class="cd-read-more top-buffer" >Lees meer</a>
						<span class="cd-date">{{$milestone->start_date}}</span>
					</div>
				</div>
			@endforeach
		</section>
	@else
		<h3 id="notimeline">Er is nog geen tijdlijn aangemaakt voor dit project.</h3>
	@endif
</div>
<script type="text/javascript">
var d = document.getElementById("tijdlijn");
d.className += " active";
</script>

<script type="text/javascript"> var $nav_home ;</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="\js/timeline-main.js"></script> <!-- Resource jQuery -->
</body>
</html>


@stop
