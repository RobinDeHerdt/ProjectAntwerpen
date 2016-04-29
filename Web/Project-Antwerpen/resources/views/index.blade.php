@extends('layout')

@section('title')
  Home
@stop

@section('content')
  <div class="container allTiles">
      <div class="row">
        <div class="col-md-12">
          <h1><strong>Dit zijn project Tiles</strong></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="imgtile Tile1 expand">
            <a href="#">
          <div class="tile purple">
            <h3 class="title">Mas vernieuwing</h3>

          </div>
          </a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile2 expand">
            <a href="#">
          <div class="tile red">
            <h3 class="title">Parking kaaien</h3>

          </div>
          </a>
            </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile3 expand">
            <a href="#">
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
            <a href="#">
          <div class="tile green">
            <h3 class="title">Steen rondleidng</h3>

          </div>
          </a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile5 expand">
            <a href="#">
          <div class="tile blue">
            <h3 class="title">Nieuwe sporen</h3>
          
          </div>
        </div>
        </a>
        </div>
      </div>
    </div>
@stop
