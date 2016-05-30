@extends('layout')

@section('title')
  Verwijder project
@stop

@section('content')
<div class="container">
    <div class="row centered-form">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default loginform">
                <div class="panel-heading">Project verwijderen</div>
                <div class="panel-body">
                	<h3>Je staat op het punt het project '{{$project->project_name}}' te verwijderen.</h3>
					<h4>Ben je zeker dat je dit project wil verwijderen?</h4>
					<br />
					<form method="post" action="">
						{!! csrf_field() !!}
						<input type="submit" name="confirmDelete" value="Ja, verwijder dit project" class="btn btn-danger">
					</form>
					<h3><a href="/overzicht">Annuleren</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
