(function() {
  var app = angular.module('FaseApp', [], function($interpolateProvider){
      $interpolateProvider.startSymbol('<%');
      $interpolateProvider.endSymbol('%>');
  });

  app.controller('FasenController', function($filter){
    
    var savedMilestones = document.getElementById("remembertimeline").value;

    if(savedMilestones.length != 0)
    {
        var obj = JSON.parse(savedMilestones);
        Milestonefases = obj;
    }

    this.Fasen = Milestonefases;
   
    

    this.countmilestones = function()
    {
        if(Milestonefases.length == 0)
        {
          this.faseCount = true;
        }
        else 
        {
          this.faseCount = false;
        }
    }

    this.countmilestones();

    this.deletemilestone =function(obj) {
      var index = obj.target.getAttribute("data");
      Milestonefases.splice(index, 1);

      this.MilestoneToJson();
      this.countmilestones();
    }
    this.pushmilestone = function(Fasetitle, FaseIcon, FaseStart, FaseEnd, FaseInfo ) {
      this.NewStone = {
        title:Fasetitle,
        icon: FaseIcon,
        startdate:FaseStart,
        enddate:FaseEnd,
        info:FaseInfo
      };

      if(Fasetitle != null && FaseIcon != null && FaseInfo != null && FaseStart != null && FaseEnd != null)
      {
        console.log(FaseStart + ' ' + FaseEnd);
        if(FaseStart < FaseEnd)
        {
          Milestonefases.push(this.NewStone);
        }
        else
        {
          console.log('ERROR');
        }
      }
      this.MilestoneToJson();
      this.countmilestones();
    }
    this.fases = angular.toJson(Milestonefases);

    this.MilestoneToJson = function () {
      if (Milestonefases.length >= 2)
      {
        Milestonefases.sort(function(a,b){
          var date1 = $filter('date')(new Date(a["startdate"]), 'yyyy-MM-dd');
          date1 = date1.split('-');
          date1 = date1[0] + date1[1] + date1[2];
          
          var date2  = $filter('date')(new Date(b["startdate"]), 'yyyy-MM-dd');
          date2 = date2.split('-');
          date2 = date2[0] + date2[1] + date2[2];

          return date1 > date2 ? 1 : -1;
        })
      }
      this.fases = angular.toJson(Milestonefases);
    };
  });

    var Milestonefases = [];
    if (document.getElementById('existingMilestones') != null) {

    var json = document.getElementById('existingMilestones').value;
    var parsedJson = JSON.parse(json);

    for (var i = 0; i < parsedJson.length; i++) {
      Milestonefases[i] = {};
      Milestonefases[i]['title']      = parsedJson[i].milestone_title;
      Milestonefases[i]['info']       = parsedJson[i].milestone_info
      Milestonefases[i]['icon']       = parsedJson[i].milestone_image
      Milestonefases[i]['startdate']  = parsedJson[i].start_date
      Milestonefases[i]['enddate']    = parsedJson[i].end_date;
    }
  };
})();
