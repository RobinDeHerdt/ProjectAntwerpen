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


    }, {
      title: 'Verbouwings werken',

    }, {
      title: 'Nazorg',

    }
  ];


})();
