var $divs = $("div.box");

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
     return $(a).text() > $(b).text();
  })
  .appendTo( $wrapper );


});
