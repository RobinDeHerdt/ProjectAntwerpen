@extends('layout')

@section('title')
  Home
@stop
@extends('navigation-layout')
@section('content')
	@if(Session::has('commented'))
    <div class="alert alert-success">
        <p>{{ Session::get('commented')}}</p>
    </div>
    @endif

	<div class="col-md-4 col-md-offset-4">
		@foreach ($project->comments as $key=>$comment) 
		<div class="comment_body">
			<h3>{{ $comment->user->firstname }}</h3>
			<hr>
			<p>{{ $comment->comment_body }}</p>
			
			@if (Auth::user() && Auth::user()->isAdmin)
				<form role="form" method="POST" action="reacties/{{$comment->comment_id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">  
					<input type="submit" value="Verwijder deze comment (dees moet nog gestyled worde, en den tekst moet ook nog veranderd worde)">
				</form>
			@endif
		</div>
		<br />
		<hr>
		@endforeach
		@if (Auth::guest())
			<strong>Je moet ingelogd zijn om een reactie te geven. Je kan <a href="\login">hier</a> inloggen.</strong>
			<br />
			<strong>Heb je nog geen account? Registreren kan <a href="\register">hier</a>.</strong>
	   	@else
	   		<strong>Laat ons hier weten wat je van dit project vindt, {{ Auth::user()->firstname }}!</strong>
	   	 	<form role="form" method="POST" action="reacties">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">              
		        <div class="form-group">
		            <input type="text" name="reactie" id="reactie" class="form-control input-md" placeholder="Schrijf een reactie" required alt="Vul hier een reactie in op dit project">
		        </div>
		        <input type="submit" value="Reageer" class="btn btn-danger btn-block" alt="Bevestig uw reactie">
	    	</form>
	   	@endif
    </div>
<script type="text/javascript">
var d = document.getElementById("reacties");
d.className += " active";
</script>
@stop