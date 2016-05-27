  @extends('layout')

@section('title')
  Projectinformatie
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/uitleg.css">
<body>

<div class="container col-md-12">

<div class="row bg-fase-even" id="fase1">

<style type="text/css">
    
    h2 {font-family:AntwerpREG, Verdana, sans-serif;}
    .fa-calendar {padding:0.2em 1em 0.2em 1em;}
    h6 {text-align: left;}
    h5 {margin-top:2em;}
    .bg-fase {min-height:350px;}
    .bg-fase:nth-child(even) {background-color: #b0b0b0;}

    .imgtile>img {width:65%; margin:3em;}

    .bg-fase {
    position:relative;
    min-height:320px !important;
    
}

    .bg-fase:after {
    content:'';
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -50px;
    width: 0;
    height: 0;
    border-top: solid 50px #b0b0b0;
    border-left: solid 50px transparent;
    border-right: solid 50px transparent;
}
.bg-fase-even {
    position:relative;
    min-height:320px !important;
    
    z-index: 10;
}

    .bg-fase-even:after {
    content:'';
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -50px;
    width: 0;
    height: 0;
    border-top: solid 50px #fff;
    border-left: solid 50px transparent;
    border-right: solid 50px transparent;
}
.col-md-8:nth-child(even) {
    margin-top:5em;
}
</style>    
    <div class="col-md-12" style="text-align: center;">
    <h2>Project Titel</h2>
    <h6><i class="fa fa-calendar fa-2x" aria-hidden="true"> </i>begindatum: 06/06/2016</h6>
    <h6><i class="fa fa-calendar fa-2x" aria-hidden="true"> </i>einddatum: 08/06/2016</h6>
    <h5>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5></div>
    </div>
    
    <div class="row bg-fase" id="fase1">
    <div class="col-md-4 imgtile Tile3"><img src="http://www.hotelfirean.com/wordpress/wp-content/gallery/antwerpen/hotelfirean_antwerpen_02.jpg"></div>
    <div class="col-md-8">
    <h2>Fase 1</h2>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>
    

    <div class="row bg-fase-even" id="fase2" >
    <div class="col-md-8">
    <h2>Fase 2</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="col-md-4 imgtile Tile4" ><img src="http://www.hotelfirean.com/wordpress/wp-content/gallery/antwerpen/hotelfirean_antwerpen_02.jpg"></div>
    </div>


     <div class="row bg-fase" id="fase3">
    <div class="col-md-4 imgtile Tile3"><img src="http://www.hotelfirean.com/wordpress/wp-content/gallery/antwerpen/hotelfirean_antwerpen_02.jpg"></div>
    <div class="col-md-8">
    <h2>Fase 3</h2>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>
    

    <div class="row bg-fase-even" id="fase4" >
    <div class="col-md-8">
    <h2>Fase 4</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    <div class="col-md-4 imgtile Tile4" ><img src="http://www.hotelfirean.com/wordpress/wp-content/gallery/antwerpen/hotelfirean_antwerpen_02.jpg"></div>
    </div> 


    <div class="row bg-fase" id="fase5">
    <div class="col-md-4 imgtile Tile3"><img src="http://www.hotelfirean.com/wordpress/wp-content/gallery/antwerpen/hotelfirean_antwerpen_02.jpg"></div>
    <div class="col-md-8">
    <h2>Fase 5</h2>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
    </div>
    

   

</div>

<script type="text/javascript">    
var d = document.getElementById("info");
d.className += " active";
</script>


</body>
@stop
