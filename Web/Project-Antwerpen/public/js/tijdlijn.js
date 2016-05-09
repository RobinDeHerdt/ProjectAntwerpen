(function() {
  var app = angular.module('FaseApp', [], function($interpolateProvider){
      $interpolateProvider.startSymbol('<%');
     $interpolateProvider.endSymbol('%>');
  });

  app.controller('FasenController', function(){
    this.Fasen = Milestonefases;


    this.pushmilestone = function(Fasetitle, FaseIcon, FaseStart, FaseEnd, FaseInfo ) {
      this.NewStone = {
        title:Fasetitle,
        icon: FaseIcon,
        startdate:FaseStart,
        enddate:FaseEnd,
        info:FaseInfo
      };

      Milestonefases.push(this.NewStone);
      console.log(Milestonefases);
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
