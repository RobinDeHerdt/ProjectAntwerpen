var $divs = $("div.box");

$('#sort1').on('click', function () {
  var $wrapper = $('.sortwrapper');

  $wrapper.find('.sort').sort(function (a, b) {
      return -a.dataset.percentage - -b.dataset.percentage;
  })
  .appendTo( $wrapper );
});

$('#sort').on('click', function () {
    var $wrapper = $('.sortwrapper');

    $wrapper.find('.sort').sort(function (a, b) {
        return +a.dataset.percentage - +b.dataset.percentage;
    })
    .appendTo( $wrapper );
});
