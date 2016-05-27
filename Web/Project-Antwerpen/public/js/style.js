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

  






});