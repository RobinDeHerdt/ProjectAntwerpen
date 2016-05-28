@extends('layout')

 @section('title')
   Nieuwe quizvraag
 @stop

 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 <div class="col-md-offset-3 col-md-6">
 	@if(Session::has('questionadded'))
    <div class="alert alert-success flashmessage">
        <p>{{ Session::get('questionadded')}}</p>
    </div>
    @endif
		<h1 class="createtitle">Quizvragen </h1>
		<table class="table">
			@foreach($questions as $question)
				<tr>
					<td>{{$question->questionbody}}</td>
					<td>
						@if ($question->correctanswer)
							Correct
						@else
							Fout
						@endif
					</td>
				</tr>
			@endforeach
		</table>
	<form method="post" action="" class="OpninionQuestionFrom">
		{!! csrf_field() !!}
      	<label for="addOpinionQuestion">Vul hier een quizvraag in voor dit project:</label>
		<input type="text" name="questionbody" id="addOpinionQuestion">
		<label for="correctanswer">Juiste antwoord:</label>
		<input class="radio" type="radio" name="correctanswer" value="1" id="correctanswer"> <label for="correctanswer">Correct</label>
  		<input class="radio" type="radio" name="correctanswer" value="0" id="correctanswer"> <label for="correctanswer">Fout</label>
		<input type="submit" value="Toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>
@stop
