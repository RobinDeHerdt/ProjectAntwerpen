
$("#addMilestone").hide();
$("#milestoneButtonToggle div:first-child").hide();
function ToggleForm() {

  $("#addMilestone").toggle();
  $("#btn-button-milestone" ).toggleClass( "btn-success" );
  $("#btn-button-milestone" ).toggleClass( "btn-info" );

  $("#btn-button-milestone").prop('value') == "Formulier minimaliseren" ? $("#btn-button-milestone").prop('value', 'Projectfase Toevoegen') : $("#btn-button-milestone").prop('value', 'Formulier minimaliseren');
  if ($("#milestoneButtonToggle div:first-child").is(":visible")) 
  {
    $("#milestoneButtonToggle div:first-child").hide();
    $("#milestoneButtonToggle div:last-child").show();
  }
  else
  {
    $("#milestoneButtonToggle div:first-child").show();
    $("#milestoneButtonToggle div:last-child").hide();
  }
}

$("#btn-button-milestone").click(function() 
{  
  ToggleForm(); 
});

$('#milestoneButtonToggle div:first-child input').on('click', function(){
  if($("#titel_mijlpaal").val() != "" && $("#milestone_image").val() != '? undefined:undefined ?'  && $("#mijlpaal_info").val() != "" && $("#milestone_enddate").val() != "" && $("#milestone_startdate").val() != "")
  {
    $("#error").addClass( "hidden" );
    if($("#milestone_startdate").val() < $("#milestone_enddate").val())
    {
        ToggleForm();
        $("#titel_mijlpaal").val("");
        document.getElementById("milestone_image").value = "";
        $("#mijlpaal_info").val("");
        $("#milestone_enddate").val("");
        $("#milestone_startdate").val("");
        
        $("#datumerror").addClass( "hidden" );
    }
    else
    {
        $("#datumerror").removeClass( "hidden" );
    }
  }
  else 
  {
    $("#error").removeClass( "hidden" );
  }});
