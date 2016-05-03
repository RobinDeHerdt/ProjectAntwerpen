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

          <div class="col-sm-4 sort"  data-theme={{$project->thema}} data-date={{$project->start_date}}>
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



          <div class="col-sm-4 sort" data-date="2016-03-10" data-theme="sport">
              <div class="col-sm-12 thumbnail text-center expand">
                  <img alt="" class="img-responsive" src=
                  "img/kathedraal.jpg">
                    <a class="captionlink" href="{{ url('/tijdlijn') }}">
                    <div class="caption red">
                        <h4>cooolio</h4>
                    </div>
                  </a>
              </div>
          </div>
          <div class="col-sm-4 sort" data-date="2016-07-10" data-theme="a">
            <div class="col-sm-12 thumbnail text-center expand">
                <img alt="" class="img-responsive" src=
                "img/kaaien.jpg">
                <a class="captionlink" href="{{ url('/tijdlijn') }}">
                  <div class="caption orange">
                      <h4>badaboom</h4>
                  </div>
                </a>
            </div>
        </div>
          <div class="col-sm-4">
            <div class="col-sm-12 thumbnail text-center expand">
                <img alt="" class="img-responsive" src=
                "img/kaaien.jpg">
                <a class="captionlink" href="{{ url('/tijdlijn') }}">
                  <div class="caption blue">
                      <h4>pikachu</h4>
                  </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="col-sm-12 thumbnail text-center expand">
                <img alt="" class="img-responsive" src=
                "img/kaaien.jpg">
                <a class="captionlink" href="{{ url('/tijdlijn') }}">
                  <div class="caption green">
                      <h4>Lorem ipsum dolor sit amet, consectetur</h4>
                  </div>
                </a>
            </div>
        </div>






      </div>
    </div>
@stop
