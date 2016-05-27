@extends('layout')

 @section('title')
   Nieuwe quizvraag
 @stop

 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 <div class="col-md-offset-3 col-md-6">
 	@if(Session::has('questionadded'))
    <div class="alert alert-success">
        <p>{{ Session::get('questionadded')}}</p>
    </div>
    @endif
 	<form method="post" action="" class="OpninionQuestionFrom">
		{!! csrf_field() !!}
		<h5>Alle quizvragen die nu gebruikt worden: </h5>
		<ul>
			@foreach($questions as $question)
				<li>{{$question->questionbody}}</li>
			@endforeach
		</ul>
      <label for="questionbody">Vul hier een quizvraag in voor dit project:</label>
		<input type="text" name="questionbody" id="addOpinionQuestion">
		<input type="submit" value="Toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>
@stop