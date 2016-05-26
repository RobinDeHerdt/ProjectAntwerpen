@extends('layout')

 @section('title')
   Nieuwe meningvraag
 @stop

 @section('content')
 <link rel="stylesheet" href="/css/donut-graph.css">
 <div class="col-md-offset-3 col-md-6">
 	<form method="post" action="">
		{!! csrf_field() !!}
    <select class="c-select form-control input-md" id="Project_names" name="Project_names" alt="Kies een project waaraan u een mening wilr toevoegen" value="{{old('project->thema')}}">
        <!-- <option selected disabled>Thema</option> -->

        @foreach ($projects as $projectnaam)

          <option value="fa-car"              alt="Mobiliteit">   {{$projectnaam->project_name}}   </option>
	      @endforeach
    </select>
		<input type="text" name="opinionquestionbody" id="addOpinionQuestion">
		<input type="submit" value="Meningvraag toevoegen" class="btn btn-success meningbutton" id="btnAddOpinionQuestion">
	</form>
</div>

<script type="text/javascript">
	var d = document.getElementById("meningen");
	d.className += " active";
</script>
@stop
