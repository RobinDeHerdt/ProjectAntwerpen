  @extends('layout')

@section('title')
  Home
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/uitleg.css">
<body>

<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row top-buffer" id="fase1">
    <details>
    <summary style="text-align:center">Fase 1</summary>
    <div class="col-md-4 imgtile Tile1" style="height:250px"></div>
    <div class="col-md-8">
    <h2>Fase 1</h2>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </details>
    </div>






    <div class="row top-buffer" id="fase2">
    <details>
    <summary style="text-align:center">Fase 2</summary>
    <div class="col-md-8">
    <h2>Fase 2</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="col-md-4 imgtile Tile2" style="height:250px"></div>
    </details>
    </div>


    <div class="row top-buffer" id="fase3">
    <div class="col-md-4 imgtile Tile3" style="height:250px"></div>
    <div class="col-md-8">
    <h2>Fase 3</h2>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>


    <div class="row top-buffer" id="fase4" >
    <div class="col-md-8">
    <h2>Fase 4</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="col-md-4 imgtile Tile4" style="height:250px" id="fase4"></div>
    </div>

    <div class="row top-buffer" id="fase5">
    <div class="col-md-4 imgtile Tile5" style="height:250px"></div>
    <div class="col-md-8">
    <h2>Fase 5</h2>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>


    <div class="row top-buffer" id="fase6" >
    <div class="col-md-8">
    <h2>Fase 6</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="col-md-4 imgtile Tile6" style="height:250px" ></div>
    </div>



</div>

<script type="text/javascript">
    
var d = document.getElementById("info");
d.className += " active";

</script>


</body>
@stop
