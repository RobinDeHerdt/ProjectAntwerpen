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
          <div class="imgtile Tile1">
            <a href="#">
          <div class="tile purple">
            <h3 class="title">Mas vernieuwing</h3>
            <p>De oude expotities worden verangen door gloednieuwe</p>
          </div>
          </a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile2">
            <a href="#">
          <div class="tile red">
            <h3 class="title">Parking kaaien</h3>
            <p>Binnekort word de parking op de kaaien uitgebreid</p>
          </div>
          </a>
            </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile3">
            <a href="#">
          <div class="tile orange">
            <h3 class="title">Kathedraal renovatie</h3>
            <p>Hello Orange, this is a colored tile.</p>
          </div>
          </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="imgtile Tile4">
            <a href="#">
          <div class="tile green">
            <h3 class="title">Steen rondleidng</h3>
            <p>Binnekort zulen er gratis rondleiding zijn voor het steen</p>
          </div>
          </a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="imgtile Tile5">
            <a href="#">
          <div class="tile blue">
            <h3 class="title">Nieuwe sporen</h3>
            <p>Er komen 3 nieuwe sporen in centraal station</p>
          </div>
        </div>
        </a>
        </div>
      </div>
    </div>
@stop
