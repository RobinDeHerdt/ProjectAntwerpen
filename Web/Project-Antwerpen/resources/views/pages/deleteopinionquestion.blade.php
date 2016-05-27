@extends('layout')

 @section('title')
   Nieuwe meningvraag
 @stop

 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 <div class="col-md-offset-3 col-md-6">
   <div ng-app="questionapp">
     <div ng-controller="questionController as Qcont">
     	<form method="post"  class="OpninionQuestionFrom">

    		{!! csrf_field() !!}
    	    <label for="Project_names">Kies u project: </label>
          <select ng-model="projects"class="c-select form-control input-md"  ng-click="Qcont.updateid()" id="Project_names" name="Project_names" alt="Kies een project waaraan u een mening wilt toevoegen" value="{{old('project->projectname')}}">

          <option ng-repeat="projectname in Qcont.projectnames" data="<% projectname.id %>" alt="Project: <% projectname.name %>" ><% projectname.name %></option>


    	    </select>
          <div ng-repeat="projectquestion in Qcont.projectquestions" ng-if="projectquestion.id == Qcont.projectID">
            <table class="table">


        


              <td class="deletequestion" data="<%projectquestion.id%>" ><%projectquestion.body%></td>

             <!--  <a href="/verwijdermeningvraag/<% $index + 1 %>" class="btn btn-danger">delete</a> -->
              <td><button class="questionbutton btn btn-danger" ng-click="Qcont.submitme(projectquestion.Qid)">Verwijderen</button></td>


              </table>
          </div>






              <input type="hidden" id="hiddenprojects" name="name" value="{{$projects}}">
              <input type="hidden" id="hiddenquestions" name="name" value="{{$questions}}">

        </div>

      </div>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
    <script src="/js/deleteopinionquestion.js" ></script>
	</form>
</div>
@stop
