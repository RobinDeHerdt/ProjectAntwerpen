   @extends('layout')

@section('title')
  Projectinformatie
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" type="text/css" href="/css/uitleg.css">
<link rel="stylesheet" type="text/css" href="/css/projectinfo.css">
<div class="projectdiv">

<div class="container">

    <div class="row ">
        <div class="col-md-12 project-info" style="text-align: center;">
            <h2>Projectinformatie</h2>

            <br>

            <h5><i class="fa fa-calendar-check-o">  </i> Begindatum: {{  $project->start_date    }}</h5>
            <h5><i class="fa fa-calendar-times-o">  </i> Einddatum:  {{  $project->end_date      }}</h5>
            <h5><i class="fa fa-map-marker">        </i> Locatie:    {{  $project->location      }}</h5>
            <h5><i class="fa fa-location-arrow">    </i> Postcode:   {{  $project->postalcode    }}</h5>

            <br>
            
            <span>{{ $project->info }}</span>   
        </div>
    </div>

    @foreach($projectfases as $key=>$fase)
        <div class="row  bg-fase" id="fase{{$key + 1}}">
                <div class="col-md-12 fase-text">
                    <h2>{{ $fase->milestone_title}}</h2>
                    <h5 class="fase-date"><i class="fa fa-calendar-check-o">  </i> Begindatum: {{  $fase->start_date    }}&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-times-o">  </i> Einddatum:  {{  $fase->end_date      }}</h5>
           
                    
                    <p class="info">{{ $fase->milestone_info }}</p>
                </div>
        </div>
    @endforeach
</div>

<script type="text/javascript">    
var d = document.getElementById("info");
d.className += " active";
</script>


</body>
@stop