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

      Milestonefases.push(this.NewStone);
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
