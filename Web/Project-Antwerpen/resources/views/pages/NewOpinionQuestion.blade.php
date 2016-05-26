@extends('layout')

 @section('title')
   Nieuwe meningvraag
 @stop

 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 <div class="col-md-offset-3 col-md-6">
 	<form method="post" action="" class="OpninionQuestionFrom">
		{!! csrf_field() !!}
	    <label for="Project_names">Kies u project: </label><select class="c-select form-control input-md" id="Project_names" name="Project_names" alt="Kies een project waaraan u een mening wilt toevoegen" value="{{old('project->projectname')}}">
	        @foreach ($projects as $projectnaam)
	          	<option value="{{$projectnaam->id}}" alt="Project: {{$projectnaam->project_name}}">   {{$projectnaam->project_name}}   </option>
		    @endforeach
	    </select>
      <label for="opinionquestionbody">Vul hier u vraag in: </label>
		<input type="text" name="opinionquestionbody" id="addOpinionQuestion">
		<input type="submit" value="Meningvraag toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>
@stop
