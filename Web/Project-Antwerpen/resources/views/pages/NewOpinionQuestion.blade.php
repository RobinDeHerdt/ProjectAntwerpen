@extends('layout')

 @section('title')
   Nieuwe meningvraag
 @stop

 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 <div class="col-md-offset-3 col-md-6">
 	<form method="post" action="">
		{!! csrf_field() !!}
	    <select class="c-select form-control input-md" id="Project_names" name="projectname" alt="Kies een project waaraan u een mening wilt toevoegen" value="{{old('project->projectname')}}">
	        @foreach ($projects as $projectnaam)
	          	<option value="{{$projectnaam->id}}" alt="Project: {{$projectnaam->project_name}}">   {{$projectnaam->project_name}}   </option>
		    @endforeach
	    </select>
		<input type="text" name="opinionquestionbody" id="addOpinionQuestion">
		<input type="submit" value="Meningvraag toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>
@stop
