@extends('layout')

@section('title')
  Home
@stop

@section('content')
  <div class="container allTiles">
      <div class="sortnav">
    <div class="col-md-12">
      <fieldset>
        <div class="switch-toggle switch-candy-blue   switch-candy">
          <input id="Datum" name="view" type="radio" checked>
          <label for="Datum" onclick="" id="sort1">Datum</label>

          <input id="thema" name="view" type="radio">
          <label for="thema" onclick="" id="sort">Thema</label>
          <a></a>
        </div>
      </fieldset>
    </div>


      </div>
      <div class="sortwrapper">

          @foreach( $projects as $project)

          <div class="col-sm-4 sort"  data-theme="{{$project->thema}}" data-date="{{$project->start_date}}">
              <div class="col-sm-12 thumbnail text-center expand">
                  <img alt="" class="img-responsive" src=
                  {{$project->headerimage}}>
                  <a class="captionlink" href="{{ url('/tijdlijn') }}">
                    <div class="caption {{$project->color}}" >
                        <h4>{{$project->project_name}}</h4>
                    </div>
                  </a>
              </div>
          </div>

          @endforeach
      </div>
    </div>
@stop
