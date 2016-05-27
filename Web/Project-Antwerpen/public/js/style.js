$( document ).ready(function() {
  /*var div = $(".thumbnail");
  div.hide();
    div.slideDown("slow");
    */

var $root = $('html, body');
$('a').click(function() {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
    return false;
});

    $('.fase').hide();

     $(".fasetab1").click(function(){
        $(".fase1").slideToggle("slow");
    });
     $(".fasetab2").click(function(){
        $(".fase2").slideToggle("slow");
    });
     $(".fasetab3").click(function(){
        $(".fase3").slideToggle("slow");
    });
     $(".fasetab4").click(function(){
        $(".fase4").slideToggle("slow");
    });
     $(".fasetab5").click(function(){
        $(".fase5").slideToggle("slow");
    });
     $(".fasetab6").click(function(){
        $(".fase6").slideToggle("slow");
    });
    

    $(".stars").click(function(event) {
                

        switch(event.target.id) {
    case "1":
        console.log("1");
        $("#1").removeClass( "rating" ).addClass( "stars-filled" );
        //$("#rating > span:before").css("content","'\2605'");
        
        break;
    case "2":
         console.log("2");
        break;
    case "3":
         console.log("3");
        break;
    case "4":
        console.log("4");
        break;
    case "5":
         console.log("5");
        break;
    default:
       
        console.log("default");
    }
    });





});