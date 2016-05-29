   @extends('layout')

@section('title')
  Projectinformatie
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/uitleg.css">
<body>

<style type="text/css">
    
    h2 {    font-family: Open Sans;
    font-weight: bold;
    font-size: 30px;}
    .fa-calendar {padding:0.2em 1em 0.2em 1em;}
    h6 {    font-family: Droid Serif, serif;
    color: #7f8c97;
    font-size: 15px;}
    h5 {    font-family: Droid Serif, serif;
    color: #7f8c97;
    font-size: 15px;}
    h3 {
            font-family: Droid Serif, serif;
    color: #7f8c97;
    font-size: 15px;
    }
    .fase-text {
        margin-top:50px;
    }
    
    
    .bg-fase:nth-child(even) {background-color: #DBDBDB;
        margin-left: -381px;
    margin-right: -381px;}

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
    border-top: solid 50px #DBDBDB;
    border-left: solid 50px transparent;
    border-right: solid 50px transparent;
}
.bg-fase:nth-child(odd):after {
     border-top: solid 50px #fff;
    border-left: solid 50px transparent;
    border-right: solid 50px transparent;
    z-index:10;
}
.bg-fase:last-child {
    
     margin-bottom:50px;
}
.bg-fase:last-child:after {
    
     display: none;;
}
.project-info {
    min-height:50vh;
}

</style> 
<div class="container">

    <div class="row ">
        <div class="col-md-12 project-info" style="text-align: center;">
            <h2>Projectinformatie</h2>
            <h5><i class="fa fa-calendar-check-o"> </i>Begindatum: {{  $project->start_date    }}</h5>
            <h5><i class="fa fa-calendar-times-o"> </i>Einddatum:  {{  $project->end_date      }}</h5>
            <h5><i class="fa fa-map-marker"> </i>Locatie:    {{  $project->location      }}</h5>
            <h5><i class="fa fa-location-arrow"></i> 
Postcode:   {{  $project->postalcode    }}</h5>

            <br>
            
            <span>{{ $project->info }}</span>   
        </div>
    </div>

    @foreach($projectfases as $key=>$fase)
        <div class="row  bg-fase" id="fase{{$key + 1}}">
            <!-- <div class="col-md-4 imgtile Tile3"> -->
                <div class="col-md-12 fase-text">
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