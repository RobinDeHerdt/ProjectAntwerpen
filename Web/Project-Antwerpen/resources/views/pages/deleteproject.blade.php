@extends('layout')

@section('title')
  Verwijder project
@stop

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<h3>Je staat op het punt het project '{{$project->project_name}}' te verwijderen.</h3>
		<h4>Ben je zeker dat je dit project wil verwijderen?</h4>
		<br />
		<form method="post" action="">
			{!! csrf_field() !!}
			<input type="submit" name="confirmDelete" value="Ja, verwijder dit project" class="btn btn-block btn-danger">
		</form>

		<h3><a href="/overzicht">Annuleren</a></h3>
	</div>
	
@stop