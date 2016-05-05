var $wrapper = $('.sortwrapper');
/*
$wrapper.find('.sort').sort(function (a, b) {
    return +a.dataset.date - +b.dataset.date;
})
.appendTo( $wrapper );
*/

$('#sort1').on('click', function () {
  var $wrapper = $('.sortwrapper');

  $wrapper.find('.sort').sort(function(a,b){
    var date1  = $(a).data("date").toString();
    date1 = date1.split('-');
    date1 = date1[0] +date1[1] -1 + date1[2];
    var date2  = $(b).data("date").toString();
    date2= date2.split('-');
    date2= date2[0] +date2[1] -1 + date2[2];
    return date1 < date2 ? 1 : -1;
  }).each(function(){
      $wrapper.prepend(this);
  });

});

$('#sort').on('click', function () {

  var $wrapper = $('.sortwrapper');

  $wrapper.find('.sort').sort(function (a, b) {
    var va = $(a).data('theme').toString().charCodeAt(0);
    var vb = $(b).data('theme').toString().charCodeAt(0);
    if (va < 'a'.charCodeAt(0)) va += 100; // Add weight if it's a number
    if (vb < 'a'.charCodeAt(0)) vb += 100; // Add weight if it's a number
    return vb < va ? 1 : -1;
  })
  .appendTo( $wrapper );


});
