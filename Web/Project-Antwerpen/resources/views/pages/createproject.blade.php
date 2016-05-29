<?php
  //set headers to NOT cache a page
  header("Content-Type: application/json");
?>
<!DOCTYPE html>
<html>
<head>
   @extends('layout')

@section('title')
  Nieuw project
@stop

@section('content')
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
<script src="js/currentstep.js"></script>
<script src="js/createprojecttijdlijn.js"></script>
<script src="js/creategooglemaps.js"></script>
<link rel="stylesheet" type="text/css" href="\css/template.css">

<div class="container ProjectFrom">
<form role="form" method="POST" action="{{ url('/nieuwproject') }}" novalidate="" enctype="multipart/form-data">
{!! csrf_field() !!}
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row">
    <h1>Project aanmaken</h1>
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
       
            <strong>Je hebt nog geen naam aan het project gegeven.</strong>
            <br>
        
    @endif
    @if ($errors->has('project_info'))
        
            <strong>Je hebt nog geen uitleg over het project gegeven. </strong>
            <br>
        
    @endif
    @if ($errors->has('project_thema'))
       
            <strong>Je hebt nog geen thema voor het project gekozen.</strong>
            <br>
    @endif
    @if ($errors->has('project_location'))
       
            <strong>Je hebt de locatie van het project nog niet opgegeven.</strong>
            <br>
    @endif
    @if ($errors->has('project_postalcode'))
       
            <strong>Je hebt de postcode nog niet ingegeven.</strong>
            <br>
    @endif
    @if ($errors->has('project_startdate'))
       
            <strong>Je hebt nog geen startdatum voor het project ingesteld.</strong>
            <br>
    @endif
    @if ($errors->has('project_enddate'))
       
            <strong>Je hebt nog geen einddatum voor het project ingesteld.</strong>
            <br>
    @endif
    @if ($errors->has('project_color'))
       
            <strong>Je hebt het project nog geen kleur toegekend.</strong>
            <br>
    @endif
    @if ($errors->has('headerimage'))
       
            <strong>Je hebt nog geen headerimage geupload.</strong>
            <br>
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

                    <select class="c-select form-control input-md" id="project_thema" name="project_thema" alt="Kies een thema voor dit project" value="{{old('project_thema')}}">
                        <option disabled>Thema</option>
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
                    <label>Projectkleur</label>
                    @if ($errors->has('project_color'))
                        <span class="help-block validationerror">
                            <strong>{{ $errors->first('project_color') }}</strong>
                        </span>
                    @endif
                    <select class="c-select form-control input-md" name="project_color" id="project_color" alt="Kies een kleur voor dit project" value="{{old('project_color')}}">
                        <option disabled>Projectkleur</option>
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
               <input type="hidden" id="lat" name="lat"></input>
               <input type="hidden" id="lng" name="lng"></input>
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
                   <input type="button" value="Projectfase toevoegen" class="btn btn-width btn-success btn-lg" id="btn-button-milestone" onclick="" alt="open form mijlpaal">
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
                    <label class="control-label">Titel van de projectfase</label>
                    <input ng-model="milestone.title" type="text" name="titel_mijlpaal" id="titel_mijlpaal" class="form-control input-md" placeholder="Titel" alt="Vul hier het titel van de mijlpaal in." value="{{old('titel_mijlpaal')}}" required>
                </div>
                 <div class="form-group">
                    <label>Icoontje</label>
                    <select ng-model="milestone.icon" class="c-select form-control input-md" id="milestone_image" name="milestone_image" alt="Kies een icoon voor deze milestone" value="{{old('milestone_image')}}">
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
              <input type="hidden" id="remembertimeline" value="{{old('milestone_json')}}">
              <input type="text" name="milestone_json" id="milestone_json" class="form-control input-md hidden" alt="Vul hier de einddatum van de mijlpaal in." value="<% FaseCon.fases %>">

              <div id="milestoneButtonTogle">

                <div class="form-group">
                <input ng-click="FaseCon.pushmilestone(milestone.title,milestone.icon,milestone.startdate, milestone.enddate, milestone.milestoneInfo )" value="Projectfase toevoegen" class="btn btn-width btn-success btn-lg"  alt="Submit mijlpaal">
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
</div>
<script type="text/javascript">
    document.getElementById("project_thema").value = "{{old('project_thema')}}";
    document.getElementById("project_color").value = "{{old('project_color')}}";
</script>
@stop
