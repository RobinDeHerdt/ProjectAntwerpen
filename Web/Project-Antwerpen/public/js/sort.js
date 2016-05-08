var $wrapper = $('.sortwrapper');
/*
$wrapper.find('.sort').sort(function (a, b) {
    return +a.dataset.date - +b.dataset.date;
})
.appendTo( $wrapper );
*/
sortByDate();

$('#sort1').on('click', function () {
    sortByDate();
});

function sortByDate() {

    $wrapper.find('.sort').sort(function(a,b){
      var date1  = $(a).data("date");
      date1 = date1.split('-');
      date1 = date1[0] +date1[1] -1 + date1[2];
      var date2  = $(b).data("date");
      date2= date2.split('-');
      date2= date2[0] +date2[1] -1 + date2[2];
      return date1 < date2 ? 1 : -1;
    }).each(function(){
        $wrapper.prepend(this);
    });


}


$('#sort').on('click', function () {

  $wrapper.find('.sort').sort(function (a, b) {
    var textA = $(a).data('theme').toString().charCodeAt(0);
    var textB = $(b).data('theme').toString().charCodeAt(0);
    return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
  })
  .appendTo( $wrapper );
});
//show & hide form --> project aanmaken --> milestone toevoegen
$("#addMilestone").hide();
$("#milestoneButtonTogle div:first-child").hide()
$("#btn-button-milestone").click(function() { $("#addMilestone").toggle();});
$('#btn-button-milestone').on('click', function(){
    $(this).prop('value') == "Formulier minimaliseren" ? $(this).prop('value', 'Mijlpaal Toevoegen') : $(this).prop('value', 'Formulier minimaliseren');
});
$( "#btn-button-milestone" ).click(function() {
  $( this ).toggleClass( "btn-success" );
    $( this ).toggleClass( "btn-info" );
});
$('#btn-button-milestone').on('click', function(){
  if ($("#milestoneButtonTogle div:first-child").is(":visible")) {
    $("#milestoneButtonTogle div:first-child").hide();
    $("#milestoneButtonTogle div:last-child").show();
  }else{
    $("#milestoneButtonTogle div:first-child").show();
    $("#milestoneButtonTogle div:last-child").hide();
  }
});
