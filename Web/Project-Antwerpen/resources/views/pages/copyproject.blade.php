<?php
  header("Content-Type: application/json");
?>
@extends('layout')

@section('title')
  Bewerk project
@stop

@section('scripts')
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
<script src="\js/editgooglemaps.js"></script>
<script src="\js/currentstep.js"></script>
<link rel="stylesheet" type="text/css" href="\css/template.css">
@stop
@section('content')
<div class="container ProjectFrom">
<form role="form" method="POST" action="/kopiërenproject/{{$project->id}}" novalidate="" enctype="multipart/form-data">
{!! csrf_field() !!}
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
    <h1 style="text-align:center">Project kopiëren</h1>
    <h1></h1>
        <div class="progress" id="progress1">
            <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">
            </div>
            <span class="progress-completed">0%</span>
        </div>
    </div>
    @if ($errors->all())
        <h4>Het project is niet helemaal af. Volgende zaken zijn nog niet in orde: </h4>
    @endif
    @if ($errors->has('project_name'))
        <span class="help-block">
            <strong>Je hebt nog geen naam aan het project gegeven.</strong>
        </span> 
    @endif
    @if ($errors->has('project_info'))
        <span class="help-block">
            <strong>Je hebt nog geen uitleg over het project gegeven. </strong>
        </span>
        
    @endif
    @if ($errors->has('project_thema'))
        <span class="help-block">
            <strong>Je hebt nog geen thema voor het project gekozen.</strong>
        </span>
    @endif
    @if ($errors->has('project_location'))
        <span class="help-block">
            <strong>Je hebt de locatie van het project nog niet opgegeven.</strong>
        </span>
    @endif
    @if ($errors->has('project_postalcode'))
        <span class="help-block">
            <strong>Je hebt de postcode nog niet ingegeven.</strong>
        </span>
    @endif
    @if ($errors->has('project_startdate'))
        <span class="help-block">
            <strong>{{ $errors->first('project_startdate') }}</strong>
        </span>
    @endif
    @if ($errors->has('project_enddate'))
        <span class="help-block">
            <strong>Je hebt nog geen einddatum voor het project ingesteld.</strong>
        </span>
    @endif
    @if ($errors->has('project_color'))
        <span class="help-block">
            <strong>Je hebt het project nog geen kleur toegekend.</strong>
        </span>
    @endif
    @if ($errors->has('headerimage'))
        <span class="help-block">
            <strong>Je hebt nog geen headerimage geupload.</strong>
        </span>
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
                    <input type="text" name="project_name" id="project_name" class="form-control input-md" placeholder="Projectnaam" required alt="Vul hier je projectnaam in" value="{{$project->project_name}}">
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
                    <textarea class="form-control input-md" rows="5" id="project_info" placeholder="Uitleg over het project" alt="Vul project details in" name="project_info">{{$project->info}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Postcode</label>
                    <input type="text" name="project_postalcode" id="project_postalcode" class="form-control input-md" placeholder="2000" alt="Vul hier de postcode van de locatie in." value="{{$project->postalcode}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Locatie</label>
                    <input type="text" name="project_location" id="project_location" class="form-control input-md" placeholder="Locatie" alt="Vul hier de locatie van het project in." value="{{$project->location}}">
                </div>
                <div class="form-group">
                    <label class="control-label">Startdatum</label>
                    <input type="date" name="project_startdate" id="project_startdate" class="form-control input-md" alt="Vul hier de startdatum van het project in." value="{{$project->start_date}}">
                </div>

                <div class="form-group">
                    <label class="control-label">Einddatum</label>
                    <input type="date" name="project_enddate" id="project_enddate" class="form-control input-md" alt="Vul hier de einddatum van het project in." value="{{$project->end_date}}">
                </div>

                <div class="form-group">
                    <label class="control-label">Thema</label>
                    <select class="c-select form-control input-md" id="project_thema" name="project_thema" alt="Kies een thema voor dit project">
                        <option value="fa-car"              alt="Mobiliteit">   Mobiliteit   </option>
                        <option value="fa-futbol-o"         alt="Sport">        Sport        </option>
                        <option value="fa-plane"            alt="Toerisme">     Toerisme     </option>
                        <option value="fa-puzzle-piece"     alt="Recreatie">    Recreatie    </option>
                        <option value="fa-industry"         alt="Industrie">    Industrie    </option>
                        <option value="fa-recycle"          alt="Milieu">       Milieu       </option>
                        <option value="fa-tree"             alt="Natuur">       Natuur       </option>
                        <option value="fa-bank"             alt="Architectuur"> Architectuur </option>
                        <option value="fa-users"            alt="Sociaal">      Sociaal      </option>
                        <option value="fa-graduation-cap"   alt="Educatie">     Educatie     </option>
                        <option value="fa-music"            alt="Cultuur">      Cultuur      </option>
                    </select>
                </div>           
                <div class="form-group">
                    <label>Projectkleur</label>
                    <select class="c-select form-control input-md" id="project_color" name="project_color" alt="Kies een kleur voor dit project" >
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
               <div id="googleMap"></div>
               <strong>Sleep de marker naar de projectlocatie</strong>
               <input type="hidden" id="lat" name="lat" value="{{$project->xcoord}}"></input>
               <input type="hidden" id="saveLat" value="{{old('lat')}}">
               <input type="hidden" id="lng" name="lng" value="{{$project->ycoord}}"></input>
               <input type="hidden" id="saveLng" value="{{old('lng')}}">
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
                    <input type="button" value="Projectfase toevoegen" class="btn btn-width btn-success btn-lg" id="btn-button-milestone" onclick="" alt="Maak een nieuwe projectfase">
             </div>

            <table class="table">
                    <tr ng-repeat="milestone in FaseCon.Fasen" class="CreatedMilestones">
                        <td><h3><%milestone.title%></h3></td>
                        <td><button ng-click="FaseCon.deletemilestone($event)" class="btn btn-danger btndeletemilestone" type="button" name="button" ><span class="fa fa-btn fa-trash" data="<%$index%>"></span></button></td>
                    </tr>
            </table>
            <h3 id="noFases" ng-show="FaseCon.faseCount">Er zijn nog geen fases aangemaakt voor dit project</h3>
              <div id="addMilestone" class="form-group">
                <div class="form-group hidden" id="error">
                  <p class="alert alert-danger">
                    Er is een inputveld niet ingevuld.
                  </p>
                </div>
                <div class="form-group">
                    <label class="control-label">Titel projectfase</label>
                    <input ng-model="milestone.title" type="text" name="titel_mijlpaal" id="titel_mijlpaal" class="form-control input-md" placeholder="Titel" alt="Vul hier het titel van de projectfase in." value="{{old('titel_mijlpaal')}}" required>
                </div>
                <div class="form-group">
                    <label>Icoontje</label>
                    <select ng-model="milestone.icon" class="c-select form-control input-md" id="milestone_image" name="milestone_image" alt="Kies een icoontje voor deze projectfase" value="{{old('milestone_image')}}">
                        <option value="/img/cd-icon-movie.svg"     alt="Camera">  Camera  </option>
                        <option value="/img/cd-icon-location.svg"  alt="locatie"> locatie </option>
                        <option value="/img/cd-icon-picture.svg"   alt="foto">    foto    </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Startdatum</label>
                    <input ng-model="milestone.startdate" type="date" name="milestone_startdate" id="milestone_startdate" class="form-control input-md" alt="Vul hier de startdatum van de projectfase in." value="{{old('milestone_startdate')}}">
                </div>
                <div class="form-group">
                    <label class="control-label">EindDatum</label>
                    <input ng-model="milestone.enddate" type="date" name="milestone_enddate" id="milestone_enddate" class="form-control input-md" alt="Vul hier de einddatum van de projectfase in." value="{{old('milestone_enddate')}}">
                </div>
                <div class="form-group">
                   <label class="control-label">Uitleg over de projectfase</label>
                   <textarea ng-model="milestone.milestoneInfo" class="form-control input-md" rows="5" id="mijlpaal_info" placeholder="Uitleg over projectfase" alt="Vul info over de projectfase in" name="mijlpaal_info">{{old('mijlpaal_info')}}</textarea>
               </div>

              </div>
              <input type="hidden" id="remembertimeline" value="{{old('milestone_json')}}">
              <input type="hidden" name="existingMilestones" id="existingMilestones" class="form-control input-md " alt="" value="{{$milestones}}">
              <input type="hidden" name="milestone_json" id="milestone_json" class="form-control input-md " alt="" value="<% FaseCon.fases %>">
              <div id="milestoneButtonTogle">

                <div class="form-group">
                <input ng-click="FaseCon.pushmilestone(milestone.title,milestone.icon,milestone.startdate, milestone.enddate, milestone.milestoneInfo)" value="Projectfase toevoegen" class="btn btn-width btn-success btn-lg"  alt="Voeg projectfase toe">
               </div>
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
                <strong>Dit is je huidige projectafbeelding: </strong>
                <img src="{{$project->headerimage}}" style="width:100%;height:auto">
                <strong>Je huidige afbeelding wordt behouden indien je geen andere afbeelding upload.</strong>
                <input type="file" name="headerimage">

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
                <h3>Project toevoegen?</h3>
                 <div class="form-group">
                    <input type="submit" value="Bevestigen" class="btn btn-width btn-danger btn-lg" alt="Opslaan knop">
               </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
<script type="text/javascript">
    document.getElementById("project_color").value = "{{$project->color}}";
    document.getElementById("project_thema").value = "{{$project->thema}}";
</script>
<script src="\js/tijdlijn.js"></script>
<script src="\js/MakeMilestones.js"></script>
@stop
