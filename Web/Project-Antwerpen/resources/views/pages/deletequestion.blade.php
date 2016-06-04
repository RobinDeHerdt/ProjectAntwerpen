@extends('layout')

@section('title')
  Verwijder quizvraag
@stop
@section('scripts')
 <link rel="stylesheet" href="/css/donut-graph.css">
@stop
@section('content')
<div class="col-md-offset-3 col-md-6">
    @if(Session::has('questiondeleted'))
      <div class="alert alert-success removeflash">
        <p>{{ Session::get('questiondeleted')}}</p>
      </div>
    @endif
    <div class="returnlink">
      <a href="/nieuwequizvraag">  Maak quizvragen</a>
      <a href="/profiel#adminpaneel">   Adminpaneel</a>
      <a href="/overzicht"> Overzicht</a>
    </div>
    <h1 class="createtitle">Quizvragen verwijderen</h1>
    @if(!$questions->isEmpty())
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
    @else
      <div class="noquestions">
        <p>Er zijn nog geen quizvragen. Klik <a href="/nieuwequizvraag">hier</a> om quizvragen aan te maken</p>
      </div>
    @endif
</div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
<script src="/js/deleteopinionquestion.js" ></script>
@stop