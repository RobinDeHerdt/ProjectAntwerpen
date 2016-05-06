<!DOCTYPE html>
<html>
<head>
   @extends('layout')

@section('title')
  Home
@stop

@section('content')

    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function displayMap() 
{
    document.getElementById('googleMap').style.display="block";
    initialize(); 
}
function initialize() {
    var initLat = 51.220269043488635;
    var initLng = 4.401529439178489;
    var mapProp = {
        center:new google.maps.LatLng(51.2240454,4.3982035),
        zoom:12,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
  
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
        position: {lat: initLat, lng: initLng},
        map: map,
        draggable: true,
    });

    

    // Inital value
    document.getElementById('lng').value = initLng;
    document.getElementById('lat').value = initLat;

    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    });

    google.maps.event.addListener(marker, "drag", function(event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();

        document.getElementById('lng').value = lng;
        document.getElementById('lat').value = lat;
    });
}
</script>
<body>

<div class="container">


<form role="form" method="POST" action="{{ url('/template') }}" novalidate="" enctype="multipart/form-data">
{!! csrf_field() !!}
<!-- Steps Progress and Details - START -->
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
    <h1 style="text-align:center">Project aanmaken</h1>
    <h1></h1>
        <div class="progress" id="progress1">
            <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
            </div>
            
            <span class="progress-completed">0%</span>
        </div>
    </div>
    @if($errors->all())
        @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
    @endif
    <div class="row">
        <div class="row step">
            <div id="div1" class="col-md-2 activestep" onclick="javascript: resetActive(event, 0, 'step-1');">
                <span class="fa fa-pencil-square-o"></span>
                <p>Projectnaam</p>
            </div>
            <div id="click2" class="col-md-2" onclick="javascript: resetActive(event, 20, 'step-2');">
                <span class="fa fa-pencil"></span>
                <p>Details</p>
            </div>
            <div id="click3" class="col-md-2" onclick="javascript: resetActive(event, 40, 'step-3');displayMap();">
                <span class="fa fa-globe"></span>
                <p>Map</p>
            </div>
            <div id="click4" class="col-md-2" onclick="javascript: resetActive(event, 60, 'step-4');">
                <span class="fa fa-arrows-h"></span>
                <p>Tijdlijn</p>
            </div>
            <div id="click5" class="col-md-2" onclick="javascript: resetActive(event, 80, 'step-5');">
                <span class="fa fa-camera"></span>
                <p>Afbeelding</p>
            </div>
            <div id="click6" class="col-md-2" onclick="javascript: resetActive(event, 100, 'step-6');">
                <span class="fa fa-floppy-o"></span>
                <p>Bevestigen</p>
            </div>
        </div>
    </div>
    <div class="row setup-content step activeStepInfo" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>Projectnaam</h1>
            
                <div class="form-group">
                    <input type="text" name="project_name" id="project_name" class="form-control input-md" placeholder="Projectnaam" required alt="Vul hier je projectnaam in" value="{{old('project_name')}}">
                </div>
                <div class="form-group">
                    <input value="Volgende" class="btn btn-danger btn-lg" onclick="triggerClick(2);" alt="Volgende knop">
               </div>

            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>Projectdetails</h1>
                
                 <div class="form-group">
                    <label class="control-label">Uitleg over het project</label>
                    <textarea class="form-control input-md" rows="5" id="project_info" placeholder="Uitleg over het project" alt="Vul project details in" name="project_info">{{old('project_info')}}</textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Thema</label>
                    <input type="text" name="project_thema" id="project_thema" class="form-control input-md" placeholder="Thema" alt="Vul hier het thema in." value="{{old('project_thema')}}">
                </div>

                <div class="form-group">
                    <label class="control-label">Locatie</label>
                    <input type="text" name="project_location" id="project_location" class="form-control input-md" placeholder="Locatie" alt="Vul hier de locatie van het project in." value="{{old('project_location')}}">
                </div>

                <div class="form-group">
                    <label class="control-label">Postcode</label>
                    <input type="text" name="project_postalcode" id="project_postalcode" class="form-control input-md" placeholder="2000" alt="Vul hier de postcode van de locatie in." value="{{old('project_postalcode')}}">
                </div>

                <div class="form-group">
                    <label class="control-label">Startdatum</label>
                    <input type="date" name="project_startdate" id="project_startdate" class="form-control input-md" alt="Vul hier de startdatum van het project in." value="{{old('project_startdate')}}">
                </div>

                <div class="form-group">
                    <label class="control-label">Einddatum</label>
                    <input type="date" name="project_enddate" id="project_enddate" class="form-control input-md" alt="Vul hier de einddatum van het project in." value="{{old('project_enddate')}}">
                </div>

                <div class="form-group">
                    <!-- <input type="text" name="project_color" id="project_color" class="form-control input-md" placeholder="Projectkleur" required alt="Kies hier een kleur voor het project"> -->
                    <label>Projectkleur</label>
                    <select class="c-select form-control input-md" name="project_color" alt="Kies een kleur voor dit project" value="{{old('project_color')}}">
                        <option selected disabled>Projectkleur</option>
                        <option value="orange"  alt="Oranje">   Oranje  </option>
                        <option value="purple"  alt="Paars">    Paars   </option>
                        <option value="green"   alt="Groen">    Groen   </option>
                        <option value="blue"    alt="Blauw">    Blauw   </option>
                        <option value="red"     alt="Rood">     Rood    </option>
                    </select>
                </div>

                <div class="form-group">
                        <input value="Volgende" class="btn btn-danger btn-lg" onclick="triggerClick(3);displayMap();" alt="Volgende knop">
                </div>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>Kaart</h1>
               <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2499.1022632989943!2d4.419058851572484!3d51.21719177948828!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3f703e7404c69%3A0x270b07bbe1f68aa6!2sAntwerpen-Centraal!5e0!3m2!1snl!2sbe!4v1461764810465" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
               <div id="googleMap"></div>
               <p>Sleep de marker naar de projectlocatie</p>
               <label>Lat:</label>
               <input type="text" id="lat" name="lat"></input>
               <label>Long:</label>
               <input type="text" id="lng" name="lng"></input>
                <div class="form-group">
                    <input value="Volgende" class="btn btn-danger btn-lg" onclick="triggerClick(4);" alt="Volgende knop">
               </div>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>Tijdlijn</h1>
                <h3 class="underline">Tijdlijn nog maken</h3>
                tijdlijn met aparte points in time 

                <div class="form-group">
                    <input value="Volgende" class="btn btn-danger btn-lg" onclick="triggerClick(5);" alt="Volgende knop">
               </div>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>Foto's</h1>
                
                <input type="file" name="headerimage">

                <div class="form-group">
                    <input value="Volgende" class="btn btn-danger btn-lg" onclick="triggerClick(6);" alt="Volgende knop">
               </div>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-6">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>Opslaan</h1>
                <h3 class="underline">Project toevoegen</h3>
                    Ben je zeker dat je dit project wil toevoegen?

                 <div class="form-group">
                    <input type="submit" value="Bevestig" class="btn btn-danger btn-lg" alt="Opslaan knop">
               </div>
            </div>
        </div>
    </div>
    </form>
</div>

<style>
#googleMap {
    width:100%;
    height:450px;
}

.hiddenStepInfo {
    display: none;
}

.activeStepInfo {
    display: block !important;
}

.underline {
    text-decoration: underline;
}

.step {
    margin-top: 27px;
}

.progress {
    position: relative;
    height: 25px;
}

.progress > .progress-type {
    position: absolute;
    left: 0px;
    font-weight: 800;
    padding: 3px 30px 2px 10px;
    color: rgb(255, 255, 255);
    background-color: rgba(25, 25, 25, 0.2);
}

.progress > .progress-completed {
    position: absolute;
    right: 0px;
    font-weight: 800;
    padding: 3px 10px 2px;
}

.step {
    text-align: center;
}

.step .col-md-2 {
    background-color: #fff;
    border: 1px solid #C0C0C0;
    border-right: none;
}

.step .col-md-2:last-child {
    border: 1px solid #C0C0C0;
}

.step .col-md-2:first-child {
    border-radius: 5px 0 0 5px;
}

.step .col-md-2:last-child {
    border-radius: 0 5px 5px 0;
}

.step .col-md-2:hover {
    color: #F44336 ;
    cursor: pointer;
}

.step .activestep {
    color: #F44336 ;
    height: 100px;
    margin-top: -7px;
    padding-top: 7px;
    border-left: 6px solid #F44336  !important;
    border-right: 6px solid #F44336  !important;
    border-top: 3px solid #F44336  !important;
    border-bottom: 3px solid #F44336  !important;
    vertical-align: central;
}

.step .fa {
    padding-top: 15px;
    font-size: 40px;
}
</style>

<script type="text/javascript">
 function triggerClick(number){

    $('#click'+number).click();
}
    function resetActive(event, percent, step) {
        $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
        $(".progress-completed").text(percent + "%");

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });

        if (event.target.className == "col-md-2") {
            $(event.target).addClass("activestep");
        }
        else {
            $(event.target.parentNode).addClass("activestep");
        }

        hideSteps();
        showCurrentStepInfo(step);
    }

    function hideSteps() {
        $("div").each(function () {
            if ($(this).hasClass("activeStepInfo")) {
                $(this).removeClass("activeStepInfo");
                $(this).addClass("hiddenStepInfo");
            }
        });
    }

    function showCurrentStepInfo(step) {        
        var id = "#" + step;
        $(id).addClass("activeStepInfo");
    }
   
</script>
<!-- <script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script> -->
<!-- Steps Progress and Details - END -->

</div>

</body>
</html>
@stop