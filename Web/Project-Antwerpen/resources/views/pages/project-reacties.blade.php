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
	
	<div class="col-md-12 col-md-offset-3" style="position:relative; padding: 2em, 0; margin-top:2em; margin-bottom: 2em; width:90%; margin:0,auto" >
	<div class="col-md-8 " style=" margin-top:0; position:relative; margin:2em,0;">
	<div style="position: absolute;
    top: 0;
    left: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    box-shadow: 0 0 0 4px white, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.09); background:#c03b44">
	<img src="https://www.maptive.com/wp-content/uploads/2015/02/profile_female.png" style="display: block;
    width: 28px;
    height: 28px;
    overflow:hidden;
    position: relative;
    left: 45%;
    top: 45%;
    margin-left: -12px;
    margin-top: -12px;"></div>
	<div class="col-md-8 " style="position:relative; margin-left:60px; border-radius:0.25em;padding:1em" >
	
	

		@foreach ($project->comments as $key=>$comment) 
		<div class="comment_body">
			<h3 style="font-family: Open Sans; font-weight: bold; font-size:30px">{{ $comment->user->firstname }}</h3>
			
			<p style="font-family: Droid Serif, serif;
    color: #7f8c97;font-size:15px">{{ $comment->comment_body }}</p>
    <h6 style=" font-family: Droid Serif, serif;
    color: #a7bad4; margin-top:30px;	">26/06/2016</h6>
    <h6 style=" font-family: Droid Serif, serif;
    color: #a7bad4; margin-top:20px;	">Gepost door: Dieter Vercammen</h6>

			
			@if (Auth::user() && Auth::user()->isAdmin)
				<form role="form" method="POST" action="reacties/{{$comment->comment_id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">  
					<input type="submit" value="Verwijder deze comment (dees moet nog gestyled worde, en den tekst moet ook nog veranderd worde)">
				</form>
			@endif
		</div>

		
		<hr style="	border-top:1px solid #a7bad4; padding-top:-20px">
		@endforeach
		</div>

		<div class="col-md-8">
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
    </div>
   </div>
<script type="text/javascript">
var d = document.getElementById("reacties");
d.className += " active";
</script>
@stop