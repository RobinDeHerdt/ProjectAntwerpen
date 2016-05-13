(function() {
  var app = angular.module('FaseApp', [], function($interpolateProvider){
      $interpolateProvider.startSymbol('<%');
     $interpolateProvider.endSymbol('%>');
  });

  app.controller('FasenController', function(){
    this.Fasen = Milestonefases;

    this.deletemilestone =function(obj) {
      var index = obj.target.getAttribute("data");

       Milestonefases.splice(index, 1);
    }
    this.pushmilestone = function(Fasetitle, FaseIcon, FaseStart, FaseEnd, FaseInfo ) {
      this.NewStone = {
        title:Fasetitle,
        icon: FaseIcon,
        startdate:FaseStart,
        enddate:FaseEnd,
        info:FaseInfo
      };

      if(Fasetitle != null && FaseIcon != null && FaseInfo != null){
        Milestonefases.push(this.NewStone);
      }
    }
    this.fases;

    this.MilestoneToJson = function () {
      this.fases = JSON.stringify(Milestonefases);
    }


  });




  var Milestonefases = [
    {
      title: 'Opbouw',
      icon: '/img/cd-icon-picture.svg',
        startdate:'2015-05-17',
        enddate:'2015-06-30',
        info:'Opbouw info'

    }, {
      title: 'Verbouwingswerken',
        icon: '/img/cd-icon-movie.svg',
        startdate:'2015-08-02',
        enddate:'2015-09-30',
        info:'Verbouwingswerken info'
    }, {
      title: 'Nazorg',
      icon: '/img/cd-icon-location.svg',
        startdate:'2016-02-04',
        enddate:'2017-05-17',
        info:'Nazorg info'
    } 
  ];


})();
