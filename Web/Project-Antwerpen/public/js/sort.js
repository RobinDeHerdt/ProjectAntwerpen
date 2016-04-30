

$('#sort1').on('click', function () {
  var $wrapper = $('.sortwrapper');

  $wrapper.find('.sort').sort(function (a, b) {
      return +a.dataset.date - +b.dataset.date;
  })
  .appendTo( $wrapper );
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
