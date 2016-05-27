@extends('layout')

 @section('title')
   Verwijder quizvraag
 @stop
 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
  @if(Session::has('questiondeleted'))
  <div class="alert alert-success">
      <p>{{ Session::get('questiondeleted')}}</p>
  </div>
@endif
 <div class="col-md-offset-3 col-md-6">
    <ul>
		  @foreach ($questions as $question)
        <li value="{{$question->question_id}}" alt="Vraag: {{$question->questionbody}}">{{$question->questionbody}}   
          <form method="post" action="/verwijderquizvraag/{{$question->question_id}}" class="OpninionQuestionFrom">
            {!! csrf_field() !!}
            <input type="submit" value="Verwijderen">
          </form>
        </li>
      @endforeach
	  </ul>



<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
<script src="/js/deleteopinionquestion.js" ></script>
	
</div>
@stop
