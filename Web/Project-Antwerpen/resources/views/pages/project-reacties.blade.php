@extends('layout')

@section('title')
  Home
@stop
@extends('navigation-layout')
@section('content')
	
	@foreach ($project->comments as $key=>$comment) 
	<div class="comment_body">
		<h3>{{ $comment->user->firstname }}</h3>
		<hr>
		<p>{{ $comment->comment_body }}</p>
	</div>
	@endforeach

<script type="text/javascript">
var d = document.getElementById("reacties");
d.className += " active";
</script>
@stop