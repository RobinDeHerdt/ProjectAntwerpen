  @extends('layout')

@section('title')
  Projectinformatie
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/uitleg.css">
<body>

<div class="container">

    <div class="row top-buffer" id="fase1">
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
        <div class="row top-buffer" id="fase{{$key + 1}}">
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
