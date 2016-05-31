@extends('layout')

 @section('title')
   Nieuwe quizvraag
 @stop

@section('scripts')
 <link rel="stylesheet" href="/css/donut-graph.css">
@stop
@section('content')
 <div class="col-md-offset-3 col-md-6">
 	@if(Session::has('questionadded'))
    <div class="alert alert-success flashmessage">
        <p>{{ Session::get('questionadded')}}</p>
    </div>
    @endif
    <div class="returnlink">
      <a href="/profiel#adminpaneel">   Adminpaneel</a>
      <a href="/overzicht"> Overzicht</a>
    </div>
		<h1 class="createtitle">Quizvragen </h1>
		<table class="table">
		@if(!$questions->isEmpty())
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
		@else
		<div class="noquestions">
			<p>Er zijn nog geen quizvragen.</p>
		</div>
		@endif
		</table>
	<form method="post" action="" class="OpninionQuestionFrom">
		{!! csrf_field() !!}
      	<label for="addOpinionQuestion">Vul hier een quizvraag in:</label>
		<input type="text" name="questionbody" id="addOpinionQuestion">
		<label for="correctanswer">Juiste antwoord:</label>
		<input class="radio" type="radio" name="correctanswer" value="1" id="correctanswer"> <label for="correctanswer">Correct</label>
  		<input class="radio" type="radio" name="correctanswer" value="0" id="correctanswer"> <label for="correctanswer">Fout</label>
		<input type="submit" value="Toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>
@stop
