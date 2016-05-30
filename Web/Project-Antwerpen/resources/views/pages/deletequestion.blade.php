@extends('layout')

@section('title')
  Verwijder quizvraag
@stop
@section('scripts')
 <link rel="stylesheet" href="/css/donut-graph.css">
@stop
@section('content')
@if(Session::has('questiondeleted'))
  <div class="alert alert-success removeflash">
      <p>{{ Session::get('questiondeleted')}}</p>
  </div>
@endif
<div class="col-md-offset-3 col-md-6">
    <h1 class="createtitle">Quizvraag verwijderen</h1>
    <table class="table customtable"> 
      @foreach ($questions as $question)
      <tr>
        <td value="{{$question->question_id}}" alt="Vraag: {{$question->questionbody}}">{{$question->questionbody}}  </td> 
        <td>
        <form method="post" action="/verwijderquizvraag/{{$question->question_id}}" class="OpninionQuestionFrom">
            {!! csrf_field() !!}
            <input type="submit" value="Verwijderen" class="btn btn-danger">
        </form>
        </td>
      </tr>
      @endforeach
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
<script src="/js/deleteopinionquestion.js" ></script>
@stop