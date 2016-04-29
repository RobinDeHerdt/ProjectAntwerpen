  @extends('layout')

@section('title')
  Home
@stop
@extends('navigation-layout')
@section('content')

<body>

<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row top-buffer">
    <h1 style="text-align:center">Project uitleg</h1>
    <div class="col-md-4 imgtile Tile1" style="height:250px"></div>
    <div class="col-md-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>
    

    <div class="row top-buffer">
    <div class="col-md-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="col-md-4 imgtile Tile2" style="height:250px"></div>
    </div>
    </div>
</div>

<style type="text/css">
.top-buffer { 
	margin-bottom:40px;
	padding-bottom:40px;
	border-bottom: 1px solid black;
	}</style>



</body>
@stop
