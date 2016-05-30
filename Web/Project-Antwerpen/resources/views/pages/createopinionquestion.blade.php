@extends('layout')

 @section('title')
   Nieuwe meningvraag
 @stop

 @section('scripts')
 <link rel="stylesheet" href="/css/donut-graph.css">
 @stop
 @section('content')
 <div class="col-md-offset-3 col-md-6">
 	   @if(Session::has('opinionquestionadded'))
      <div class="alert alert-success flashmessage">
          <p>{{ Session::get('opinionquestionadded')}}</p>
      </div>
    @endif
 	<h1 class="createtitle">Meningvragen</h1>
 	<table class="table customtable">
			@foreach($questions as $question)
				<tr>
					<td>{{$question->opinionquestionbody}}</td>
				</tr>
			@endforeach
		</table>
 	<form method="post" action="" class="OpninionQuestionFrom">
		{!! csrf_field() !!}
	    <label for="Project_names">Kies je project: </label><select class="c-select form-control input-md" id="Project_names" name="Project_names" alt="Kies een project waaraan u een mening wilt toevoegen" value="{{old('project->projectname')}}">
	        @foreach ($projects as $projectnaam)
	          	<option value="{{$projectnaam->id}}" alt="Project: {{$projectnaam->project_name}}">   {{$projectnaam->project_name}}   </option>
		    @endforeach
	    </select>
      <label for="opinionquestionbody">Vul hier een meningvraag in voor dit project:</label>
		<input type="text" name="opinionquestionbody" id="addOpinionQuestion">
		<input type="submit" value="Meningvraag toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>
@stop
