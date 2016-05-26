@extends('layout')
 
 @section('title')
   Nieuwe meningvraag
 @stop
 
 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 <div class="col-md-offset-3 col-md-6">
 	<h1>{{$project->project_name}}</h1>
 	<form method="post" action="">
		{!! csrf_field() !!}
		<input type="text" name="opinionquestionbody" id="addOpinionQuestion">
		<input type="submit" value="Meningvraag toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>
 
<script type="text/javascript">
	var d = document.getElementById("meningen");
	d.className += " active";
</script>
@stop