
$("#addMilestone").hide();
$("#milestoneButtonTogle div:first-child").hide();
function TogleForm() {
  $("#addMilestone").toggle();
  $("#btn-button-milestone" ).toggleClass( "btn-success" );
  $("#btn-button-milestone" ).toggleClass( "btn-info" );
  $("#btn-button-milestone").prop('value') == "Formulier minimaliseren" ? $("#btn-button-milestone").prop('value', 'Projectfase Toevoegen') : $("#btn-button-milestone").prop('value', 'Formulier minimaliseren');
  if ($("#milestoneButtonTogle div:first-child").is(":visible")) {
    $("#milestoneButtonTogle div:first-child").hide();
    $("#milestoneButtonTogle div:last-child").show();
  }else{
    $("#milestoneButtonTogle div:first-child").show();
    $("#milestoneButtonTogle div:last-child").hide();
  }
}
$("#btn-button-milestone").click(function() {  TogleForm() });
$('#milestoneButtonTogle div:first-child').on('click', function(){

  if($("#titel_mijlpaal").val() != "" && $("#milestone_image option").html() != ""  && $("#mijlpaal_info").val() != ""){
    TogleForm();
    $("#titel_mijlpaal").val("");
    document.getElementById("milestone_image").value="";
    $("#mijlpaal_info").val("");
    $("#error").addClass( "hidden" );
  }else {
    $("#error").toggleClass( "hidden" );

  }});
