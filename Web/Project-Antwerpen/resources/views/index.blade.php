@extends('layout')

@section('title')
  Home
@stop

@section('content')
  <div class="container allTiles">
      <div class="row sortnav">
    <div class="col-md-12">
      <fieldset>
        <div class="switch-toggle switch-candy-blue   switch-candy">
          <input id="Datum" name="view" type="radio" checked>
          <label for="Datum" onclick="">Datum</label>

          <input id="thema" name="view" type="radio">
          <label for="thema" onclick="">Thema</label>
          <a></a>
        </div>
      </fieldset>
    </div>


      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="imgtile Tile1 expand">
            <a href="{{ url('/tijdlijn') }}">
          <div class="tile purple">
            <h3 class="title">Mas vernieuwing</h3>

          </div>
          </a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile2 expand">
            <a href="{{ url('/tijdlijn') }}">
          <div class="tile red">
            <h3 class="title">Parking kaaien</h3>

          </div>
          </a>
            </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile3 expand">
            <a href="{{ url('/tijdlijn') }}">
          <div class="tile orange">
            <h3 class="title">Kathedraal renovatie</h3>

          </div>
          </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="imgtile Tile4 expand">
            <a href="{{ url('/tijdlijn') }}">
          <div class="tile green">
            <h3 class="title">Steen rondleidng</h3>

          </div>
          </a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile5 expand">
            <a href="{{ url('/tijdlijn') }}">
          <div class="tile blue">
            <h3 class="title">Nieuwe sporen</h3>

          </div>
        </div>
        </a>
        </div>
      </div>
    </div>
@stop
