<?php
  //set headers to NOT cache a page
  header("Content-Type: application/json");
?>
<!DOCTYPE html>
<html>
<head>
   @extends('layout')

@section('title')
  Home
@stop

@section('content')
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
    <script src="js/tijdlijn.js"></script>
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

<div class="container ProjectFrom">


<form role="form" method="POST" action="{{ url('/nieuwproject') }}" novalidate="" enctype="multipart/form-data">
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
    <!-- Start validation messages -->
    @if ($errors->all())
        <strong>Het project is nog niet helemaal af. Volgende zaken zijn nog niet helemaal in orde: </strong>
    @endif
    <ul>
    @if ($errors->has('project_name'))
        <li>
            <strong>Je hebt nog geen naam aan het project gegeven.</strong>
        </li>
    @endif
    @if ($errors->has('project_info'))
        <li>
            <strong>Je hebt nog geen uitleg over het project gegeven. </strong>
        </li>
    @endif 
    @if ($errors->has('project_thema'))
        <li>
            <strong>Je hebt nog geen thema voor het project gekozen.</strong>
        </li>
    @endif
    @if ($errors->has('project_location'))
        <li>
            <strong>Je hebt de locatie van het project nog niet opgegeven.</strong>
        </li>
    @endif
    @if ($errors->has('project_postalcode'))
        <li>
            <strong>Je hebt de postcode nog niet ingegeven.</strong>
        </li>
    @endif
    @if ($errors->has('project_startdate'))
        <li>
            <strong>Je hebt nog geen startdatum voor het project ingesteld.</strong>
        </li>
    @endif
    @if ($errors->has('project_enddate'))
        <li>
            <strong>Je hebt nog geen einddatum voor het project ingesteld.</strong>
        </li>
    @endif
    @if ($errors->has('project_color'))
        <li>
            <strong>Je hebt het project nog geen kleur toegekend.</strong>
        </li>
    @endif
    @if ($errors->has('headerimage'))
        <li>
            <strong>Je hebt nog geen headerimage geupload.</strong>
        </li>
    @endif
    </ul>

    <!-- End validation messages -->
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
                @if ($errors->has('project_name'))
                    <span class="help-block validationerror">
                        <strong>{{ $errors->first('project_name') }}</strong>
                    </span>
                @endif 
                <div class="form-group">
                    <input type="text" name="project_name" id="project_name" class="form-control input-md" placeholder="Projectnaam" required alt="Vul hier je projectnaam in" value="{{old('project_name')}}">
                </div>
                <div class="form-group">
                    <input value="Volgende" type="button" class="btn  btn-width btn-danger btn-lg" onclick="triggerClick(2);" alt="Volgende knop">
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
                    @if ($errors->has('project_info'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_info') }}</strong>
                        </span>
                    @endif
                    <textarea class="form-control input-md" rows="5" id="project_info" placeholder="Uitleg over het project" alt="Vul project details in" name="project_info">{{old('project_info')}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Thema</label>
                    @if ($errors->has('project_thema'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_thema') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="project_thema" id="project_thema" class="form-control input-md" placeholder="Thema" alt="Vul hier het thema in." value="{{old('project_thema')}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Locatie</label>
                     @if ($errors->has('project_location'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_location') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="project_location" id="project_location" class="form-control input-md" placeholder="Locatie" alt="Vul hier de locatie van het project in." value="{{old('project_location')}}">
                </div>
               
                <div class="form-group">
                    <label class="control-label">Postcode</label>
                    @if ($errors->has('project_postalcode'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_postalcode') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="project_postalcode" id="project_postalcode" class="form-control input-md" placeholder="2000" alt="Vul hier de postcode van de locatie in." value="{{old('project_postalcode')}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Startdatum</label>
                    @if ($errors->has('project_startdate'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_startdate') }}</strong>
                        </span>
                    @endif
                    <input type="date" name="project_startdate" id="project_startdate" class="form-control input-md" alt="Vul hier de startdatum van het project in." value="{{old('project_startdate')}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Einddatum</label>
                    @if ($errors->has('project_enddate'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_enddate') }}</strong>
                        </span>
                    @endif
                    <input type="date" name="project_enddate" id="project_enddate" class="form-control input-md" alt="Vul hier de einddatum van het project in." value="{{old('project_enddate')}}">
                </div>
                
                <div class="form-group">
                    <!-- <input type="text" name="project_color" id="project_color" class="form-control input-md" placeholder="Projectkleur" required alt="Kies hier een kleur voor het project"> -->
                    <label>Projectkleur</label>
                    @if ($errors->has('project_color'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_color') }}</strong>
                        </span>
                    @endif
                    <select class="c-select form-control input-md" name="project_color" alt="Kies een kleur voor dit project" value="{{old('project_color')}}">
                        <option selected disabled>Projectkleur</option>
                        <option value="orange"  alt="Oranje">   Oranje  </option>
                        <option value="purple"  alt="Paars">    Paars   </option>
                        <option value="green"   alt="Groen">    Groen   </option>
                        <option value="blue"    alt="Blauw">    Blauw   </option>
                        <option value="red"     alt="Rood">     Rood    </option>
                        <option value="yellow"  alt="Geel">     Geel    </option>
                    </select>
                </div>
                
                <div class="form-group">
                        <input value="Volgende" type="button" class="btn btn-width btn-danger btn-lg" onclick="triggerClick(3);displayMap();" alt="Volgende knop">
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
                    <input value="Volgende" type="button" class="btn  btn-width btn-danger btn-lg" onclick="triggerClick(4);" alt="Volgende knop">
               </div>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-4" ng-app="FaseApp">
        <div class="col-xs-12" ng-controller="FasenController as FaseCon">
            <div class="col-md-12 well text-center">
                <h1>Tijdlijn</h1>


              <div class="form-group">
                    <a href="#milestoneButtonTogle" ><input type="button" value="Mijlpaal toevoegen" class="btn btn-width btn-success btn-lg" id="btn-button-milestone" onclick="" alt="open form mijlpaal"></a>
             </div

             <form name="milestoneform" >
               <div ng-repeat="milestone in FaseCon.Fasen" class="CreatedMilestones">
                 <h2  class="inline"><%milestone.title%></h2>
                 <button  ng-click="FaseCon.deletemilestone($event)" class="btn  btn-danger btn-xs" type="button" name="button" ><span class="fa fa-btn fa-trash" data="<%$index%>"></span</button>


               </div>

              <div id="addMilestone" class="form-group">
                <div class="form-group hidden" id="error">
                  <p class="alert alert-danger">
                    Er is een inputveld niet ingevuld.
                  </p>
                </div>
                <div class="form-group">
                    <label class="control-label">Titel van de projectfase</label>
                    <input ng-model="milestone.title" type="text" name="titel_mijlpaal" id="titel_mijlpaal" class="form-control input-md" placeholder="Titel" alt="Vul hier het titel van de mijlpaal in." value="{{old('titel_mijlpaal')}}" required>
                </div>
                <div class="form-group">
                    <!-- <input type="text" name="project_color" id="project_color" class="form-control input-md" placeholder="Projectkleur" required alt="Kies hier een kleur voor het project"> -->
                    <label>Icon</label>
                    <select ng-model="milestone.icon" class="c-select form-control input-md" id="milestone_image" name="milestone_image" alt="Kies een icoon voor deze milestone" value="{{old('milestone_image')}}">
                        <option selected disabled>Icoontje</option>
                        <option value="/img/cd-icon-movie.svg"     alt="Camera">  Camera  </option>
                        <option value="/img/cd-icon-location.svg"  alt="locatie"> locatie </option>
                        <option value="/img/cd-icon-picture.svg"   alt="foto">    foto    </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Startdatum</label>
                    <input ng-model="milestone.startdate" type="date" name="milestone_startdate" id="milestone_startdate" class="form-control input-md" alt="Vul hier de startdatum van de mijlpaal in." value="{{old('milestone_startdate')}}">
                </div>
                <div class="form-group">
                    <label class="control-label">EindDatum</label>
                    <input ng-model="milestone.enddate" type="date" name="milestone_enddate" id="milestone_enddate" class="form-control input-md" alt="Vul hier de einddatum van de mijlpaal in." value="{{old('milestone_enddate')}}">
                </div>
                <div class="form-group">
                   <label class="control-label">Gedetailleerd uitleg over deze projectfase</label>
                   <textarea ng-model="milestone.milestoneInfo" class="form-control input-md" rows="5" id="mijlpaal_info" placeholder="Uitleg over het mijlpaal" alt="Vul info over de mijlpaal in" name="mijlpaal_info">{{old('mijlpaal_info')}}</textarea>
               </div>

              </div>
              <input type="text" name="milestone_json" id="milestone_json" class="form-control input-md hidden" alt="Vul hier de einddatum van de mijlpaal in." value="<% FaseCon.fases %>">

              <div id="milestoneButtonTogle">

                <div class="form-group">
                <input ng-click="FaseCon.pushmilestone(milestone.title,milestone.icon,milestone.startdate, milestone.enddate, milestone.milestoneInfo )" value="Mijlpaal toevoegen" class="btn btn-width btn-success btn-lg"  alt="Submit mijlpaal">
               </div>
               </form>
                <div class="form-group">
                    <input ng-click="FaseCon.MilestoneToJson()" type="button" value="Volgende" class="btn btn-width btn-danger btn-lg" onclick="triggerClick(5);" alt="Volgende knop">
               </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row setup-content step hiddenStepInfo" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1>Foto's</h1>

                <input type="file" name="headerimage">
                @if ($errors->has('headerimage'))
                    <span class="help-block validationerror">
                        <strong>{{ $errors->first('headerimage') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                    <input value="Volgende" class="btn btn-width btn-danger btn-lg" type="button" onclick="triggerClick(6);" alt="Volgende knop">
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
                    <input type="submit" value="Bevestig" class="btn btn-width btn-danger btn-lg" alt="Opslaan knop">
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
