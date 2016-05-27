@extends('layout')

@section('title')
  Reacties
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" href="\css/reacties.css">
	@if(Session::has('commented'))
    <div class="alert alert-success col-md-8 col-md-offset-2">
        <p>{{ Session::get('commented')}}</p>
    </div>
    @endif
    @if(Session::has('commentdeleted'))
    <div class="alert alert-success col-md-8 col-md-offset-2">
        <p>{{ Session::get('commentdeleted')}}</p>
    </div>
    @endif

	<div class="col-md-12 col-md-offset-2 reactieContainer" >
	<div class="col-md-9 col-md-offset-2 reactieBody">
		@foreach ($project->comments as $key=>$comment)
    <div class="User_comment col-md-12">


    <div class="Profile_img">
      	<img src="{{ $comment->user->profileimage }}" >
    </div>
		<div class=" container comment_body">
			<h3>{{ $comment->user->firstname }}</h3>

			<p>{{ $comment->comment_body }}</p>

    		<h5>Gepost op: {{ $comment->created_at }}</h5>
    		<div class="rating">
			<span id="5">☆</span><span id="4">☆</span><span id="3">☆</span><span id="2">☆</span><span id="1">☆</span>
			</div>

			@if ($loggedInUser && $loggedInUser->isAdmin)
				<form role="form" method="POST" action="reacties/{{$comment->comment_id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="btn btn-danger btn-sm" type="submit" value="Verwijder deze reactie">
				</form>
			@elseif ($loggedInUser && $loggedInUser->id == $comment->user_id)
				<form role="form" method="POST" action="reacties/{{$comment->comment_id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input class="btn btn-danger btn-sm" type="submit" value="Verwijder je reactie">
				</form>
			@endif

      	<hr>
        </div>
		</div>
		@endforeach


		<div class=" col-md-11" style="margin-left:5%">
		@if (Auth::guest())
			<strong>Je moet ingelogd zijn om een reactie te geven. Je kan <a href="\login">hier</a> inloggen.</strong>
			<br />
			<strong>Heb je nog geen account? Registreren kan <a href="\register">hier</a>.</strong>
	   	@else
	   		<!--<strong>Laat ons hier weten wat je van dit project vindt, {{ Auth::user()->firstname }}!</strong>-->
	   	 	<form role="form" method="POST" action="reacties">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        <div class="form-group">
		        	<div class="col-md-10 bannerReactie"><img class="reactieimg" src="\img/reactie.png"></div>
		            <!-- <input type="number" name="reactie" id="sterren" class="form-control input-md" placeholder="Sterren" required alt="Vul hier een reactie in op dit project"> -->
		            <!-- <input type="text" name="reactie" id="onderwerp" class="form-control input-md" placeholder="Onderwerp" required alt="Vul hier een reactie in op dit project"> -->
		            <div class="input-field form-control">
		            <div class="rating" id="rating">
					<span id="5">☆</span><span id="4">☆</span><span id="3">☆</span><span id="2">☆</span><span id="1">☆</span>
					</div></div>
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

@stop
