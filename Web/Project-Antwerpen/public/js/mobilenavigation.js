$(document).ready ( function () {
    $(document).on ("click", "#navmobile", function () {
          $( "#navbar li" ).toggle( "slow" );
          $('#navmobile').toggleClass("img2");
    });

});
