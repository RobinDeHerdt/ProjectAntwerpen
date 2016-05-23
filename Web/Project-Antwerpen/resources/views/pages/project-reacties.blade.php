@extends('layout')

@section('title')
  Home
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" href="\css/reacties.css">
	@if(Session::has('commented'))
    <div class="alert alert-success">
        <p>{{ Session::get('commented')}}</p>
    </div>
    @endif

	<div class="col-md-12 col-md-offset-2 reactieContainer" >
	<div class="col-md-10 col-md-offset-2 reactieBody">
		@foreach ($project->comments as $key=>$comment)
    <div class="User_comment">


    <div class="Profile_img">
      	<img src="{{ $comment->user->profileimage }}" >
    </div>
		<div class="comment_body">
			<h3>{{ $comment->user->firstname }}</h3>

			<p>{{ $comment->comment_body }}</p>
<<<<<<< HEAD
			
    		<h5>Gepost op: {{ $comment->created_at }}</h5>
    		<div class="rating">
			<span id="5">☆</span><span id="4">☆</span><span id="3">☆</span><span id="2">☆</span><span id="1">☆</span>
			</div>
    <!-- <h6>Gepost door: Dieter Vercammen</h6> -->
=======
    <h5>26/06/2016</h5>
    <h6>Gepost door: Dieter Vercammen</h6>
>>>>>>> RubenVO-master


			@if (Auth::user() && Auth::user()->isAdmin)
				<form role="form" method="POST" action="reacties/{{$comment->comment_id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="btn btn-danger btn-sm" type="submit" value="Verwijder deze comment">
				</form>
			@endif

      	<hr>
        </div>
		</div>
		@endforeach


		<div class="col-md-7" style="margin-left:5%">
		@if (Auth::guest())
			<strong>Je moet ingelogd zijn om een reactie te geven. Je kan <a href="\login">hier</a> inloggen.</strong>
			<br />
			<strong>Heb je nog geen account? Registreren kan <a href="\register">hier</a>.</strong>
	   	@else
	   		<!--<strong>Laat ons hier weten wat je van dit project vindt, {{ Auth::user()->firstname }}!</strong>-->
	   	 	<form role="form" method="POST" action="reacties">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        <div class="form-group">
		        	<div class="col-md-10 bannerReactie"><img src="\img/reactie.png"></div>
<<<<<<< HEAD
		            <!-- <input type="number" name="reactie" id="sterren" class="form-control input-md" placeholder="Sterren" required alt="Vul hier een reactie in op dit project"> -->
		            <!-- <input type="text" name="reactie" id="onderwerp" class="form-control input-md" placeholder="Onderwerp" required alt="Vul hier een reactie in op dit project"> -->
		            <div class="input-field form-control">	
		            <div class="rating" id="rating">
					<span id="5">☆</span><span id="4">☆</span><span id="3">☆</span><span id="2">☆</span><span id="1">☆</span>
					</div></div>
=======
		            <input type="number" name="reactie" id="sterren" class="form-control input-md" placeholder="Sterren" required alt="Vul hier een reactie in op dit project">
		            <input type="text" name="reactie" id="onderwerp" class="form-control input-md" placeholder="Onderwerp" required alt="Vul hier een reactie in op dit project">
>>>>>>> RubenVO-master
		            <textarea type="text" name="reactie" id="mening" class="form-control input-md" placeholder="Mening plaatsen" required alt="Vul hier een reactie in op dit project"></textarea>
		        </div>
		        <input type="submit" value="Reageer" class="btn btn-danger  input-md col-md-offset-11 btn-reageer" alt="Bevestig uw reactie">
	    	</form>
	   	@endif
	   	</div>
    </div>
   </div>
<script type="text/javascript">
var d = document.getElementById("reacties");
d.className += " active";
</script>
<script   src="https://code.jquery.com/jquery-2.2.3.js"   integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4="   crossorigin="anonymous"></script>
			<script type="text/javascript"> 
			$(document).ready(function() {
    			$("span").click(function(event) {
        		//get value here
    			});
			});</script>
@stop
