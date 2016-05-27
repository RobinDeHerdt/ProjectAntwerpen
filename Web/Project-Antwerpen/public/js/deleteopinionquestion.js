
(function() {
  var app = angular.module('questionapp', [], function($interpolateProvider){
      $interpolateProvider.startSymbol('<%');
     $interpolateProvider.endSymbol('%>');
  });
  var projects = JSON.parse(document.getElementById("hiddenprojects").value);
  var questions = JSON.parse(document.getElementById("hiddenquestions").value);
  var ddl = document.getElementById("Project_names");
  var projectid = ddl.options[ddl.selectedIndex].getAttribute("data")-1;
  var projectnamen = [];
  var questionbody = [];
  for(index in projects){
    var json = { name : projects[index].project_name , id :  projects[index].id};
    projectnamen.push(json);
  }
  for(index in questions){
    var json = { body : questions[index].opinionquestionbody, id :  questions[index].project_id, Qid :questions[index].opinionquestion_id };
    questionbody.push(json);
  }

  app.controller('questionController', function($http){
    this.projectID = projectid;
    this.projectnames = projectnamen;
    this.projectquestions = questionbody;


    this.updateid = function() {
     ddl = document.getElementById("Project_names");
     projectid = ddl.options[ddl.selectedIndex].getAttribute("data");
     this.projectID = projectid;
     }


     this.submitme = function(id){
        $http({method: 'POST', url: 'verwijdermeningvraag/'+id}).
          success(function(data, status, headers, config) {
            
          }). 
          error(function(data, status, headers, config) {
            
          });
     }
  });

})();
