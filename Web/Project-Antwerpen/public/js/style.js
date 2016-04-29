$(window).load(function() {
    
    $("input").removeClass("preload");//prevent trantion on load

    $(".registreertab").not(".active").mouseover(function(){
        
        $(".logintab").addClass('loginhover');
        $(this).addClass('registreerhover');

    });
    $(".registreertab").not(".active").mouseleave(function(){
        
        $(".logintab").removeClass('loginhover');
        $(this).removeClass('registreerhover');
    });

    
    $(".logintab2").not(".active").mouseover(function(){
        
        $(".registreertab2").addClass('loginhover2');
        $(this).addClass('registreerhover2');
    });
    $(".logintab2").not(".active").mouseleave(function(){
        
        $(".registreertab2").removeClass('loginhover2');
        $(this).removeClass('registreerhover2');
    });

    
    

});
