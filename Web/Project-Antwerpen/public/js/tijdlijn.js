(function() {
  var app = angular.module('FaseApp', [], function($interpolateProvider){
      $interpolateProvider.startSymbol('<%');
     $interpolateProvider.endSymbol('%>');
  });

  app.controller('FasenController', function($filter){
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


      Milestonefases.sort(function(a,b){
        var date1 = $filter('date')(new Date(a["startdate"]), 'yyyy-MM-dd');
        date1 = date1.split('-');
        date1 = date1[0] +date1[1] -1 + date1[2];
        var date2  = $filter('date')(new Date(b["startdate"]), 'yyyy-MM-dd')
        date2= date2.split('-');
        date2= date2[0] +date2[1] -1 + date2[2];
        return date1 > date2 ? 1 : -1;
      })

      this.fases = JSON.stringify(Milestonefases);
    };


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
    }

  ];
})();
