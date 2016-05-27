$(document).ready ( function () {
  var currentpage = 0;
  var allprojectpages = ["tijdlijn", "info", "kaart", "meningen","reacties" ]
    $(document).on ("click", "#navmobile", function () {
          $( "#navbar li" ).toggle( "slow" );
          $('#navmobile').toggleClass("img2");
    });

});
