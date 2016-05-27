   @extends('layout')

@section('title')
  Projectinformatie
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/uitleg.css">
<body>

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
<div class="container">

    <div class="row top-buffer">
        <div class="col-md-12" style="text-align: center;">
            <h2>Projectinformatie</h2>
            <h5>Begindatum: {{  $project->start_date    }}</h5>
            <h5>Einddatum:  {{  $project->end_date      }}</h5>
            <h5>Locatie:    {{  $project->location      }}</h5>
            <h5>Postcode:   {{  $project->postalcode    }}</h5>

            <br>
            
            <span>{{ $project->info }}</span>   
        </div>
    </div>

    @foreach($projectfases as $key=>$fase)
        <div class="row top-buffer bg-fase" id="fase{{$key + 1}}">
            <!-- <div class="col-md-4 imgtile Tile3"> -->
                <div class="col-md-12">
                    <h2>Fase {{ $key + 1 }}</h2>
                    <h3>{{ $fase->milestone_title}}</h3>
                    <p>{{ $fase->milestone_info }}</p>
                </div>
            <!-- </div> -->
        </div>
    @endforeach
</div>

<script type="text/javascript">    
var d = document.getElementById("info");
d.className += " active";
</script>


</body>
@stop