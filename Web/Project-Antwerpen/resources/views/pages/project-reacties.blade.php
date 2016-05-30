@extends('layout')

@section('title')
  Reacties
@stop
@extends('navigation-layout')
@section('scripts')
<link rel="stylesheet" href="\css/reacties.css">
<link rel="stylesheet" href="\css/rating.css">
@stop
@section('content')
<div class="projectdiv">
	<div class="col-md-12 col-md-offset-2 reactieContainer" >
	<div class="col-md-9 col-md-offset-2 reactieBody">
	@if(Session::has('commented'))
    <div class="alert alert-success flashmessage">
        <p>{{ Session::get('commented')}}</p>
    </div>
    @endif
    @if(Session::has('commentdeleted'))
    <div class="alert alert-success flashmessage">
        <p>{{ Session::get('commentdeleted')}}</p>
    </div>
    @endif
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
    		@for ($i = 0; $i < $comment->rating; $i++)
    			<img src="/img/star-rating.png">
			@endfor
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
		<div class=" col-md-12">
		@if (Auth::guest())
			<strong>Je moet ingelogd zijn om een reactie te geven. Je kan <a href="\login">hier</a> inloggen.</strong>
			<br />
			<strong>Heb je nog geen account? Registreren kan <a href="\register">hier</a>.</strong>
	   	@else
	   	 	<form role="form" method="POST" action="reacties">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        <div class="form-group">
		        	<div class="col-md-10 bannerReactie">
		        		<img class="reactieimg" src="\img/reactie.png">
					</div>
		            <div class="input-field form-control">
			            <div class="rating" id="rating">
							<div class="stars">
						        <input type="radio" name="rating" class="star-1" id="star-1" value="1"/>
						        <label class="star-1" for="star-1">1</label>
						        <input type="radio" name="rating" class="star-2" id="star-2" value="2"/>
						        <label class="star-2" for="star-2">2</label>
						        <input type="radio" name="rating" class="star-3" id="star-3" value="3"/>
						        <label class="star-3" for="star-3">3</label>
						        <input type="radio" name="rating" class="star-4" id="star-4" value="4"/>
						        <label class="star-4" for="star-4">4</label>
						        <input type="radio" name="rating" class="star-5" id="star-5" value="5"/>
						        <label class="star-5" for="star-5">5</label>
						        <span></span>
						    </div>
						</div>
					</div>
					@if ($errors->has('rating'))
			       		<span class="validationerror">Geef dit project alstublieft ook een rating!</span>
    				@endif
		            <textarea type="text" name="reactie" id="mening" class="form-control input-md" placeholder="Mening plaatsen" required alt="Vul hier een reactie in op dit project">{{old('reactie') }}</textarea>
		        </div>
    			@if ($errors->has('reactie'))
			        <span class="validationerror">Je hebt nog geen reactie ingegeven.</span>
    			@endif
		        <input type="submit" value="Reageer" class="btn btn-danger btn-block btn-reageer" alt="Bevestig uw reactie">
	    	</form>
	   	@endif
	   	</div>
    </div>
   </div>
 </div>
<script type="text/javascript">
	var d = document.getElementById("reacties");
	d.className += "active";
</script>
@stop
