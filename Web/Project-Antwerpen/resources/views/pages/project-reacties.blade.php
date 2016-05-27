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
    		@for ($i = 0; $i < $comment->rating; $i++)
    			<img src="/img/star-rating.png">
			@endfor
			<!-- <span id="5">☆</span><span id="4">☆</span><span id="3">☆</span><span id="2">☆</span><span id="1">☆</span> -->
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


		<div class=" col-md-12 reactie-error">
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
					</div></div>
		            <textarea type="text" name="reactie" id="mening" class="form-control input-md" placeholder="Mening plaatsen" required alt="Vul hier een reactie in op dit project"></textarea>
		        </div>
		        <input type="submit" value="Reageer" class="btn btn-danger  input-md col-md-offset-11 btn-reageer" alt="Bevestig uw reactie">
	    	</form>
	   	@endif
	   	</div>
    </div>
   </div>
   <style type="text/css">
   		form .stars {
		  background: url("/../img/stars.png") repeat-x 0 0;
		  width: 150px;
		  margin: 0 auto;
		}
		 
		form .stars input[type="radio"] {
		  position: absolute;
		  opacity: 0;
		  filter: alpha(opacity=0);
		}
		form .stars input[type="radio"].star-5:checked ~ span {
		  width: 100%;
		}
		form .stars input[type="radio"].star-4:checked ~ span {
		  width: 80%;
		}
		form .stars input[type="radio"].star-3:checked ~ span {
		  width: 60%;
		}
		form .stars input[type="radio"].star-2:checked ~ span {
		  width: 40%;
		}
		form .stars input[type="radio"].star-1:checked ~ span {
		  width: 20%;
		}
		form .stars label {
		  display: block;
		  width: 30px;
		  height: 30px;
		  margin: 0!important;
		  padding: 0!important;
		  text-indent: -999em;
		  float: left;
		  position: relative;
		  z-index: 10;
		  background: transparent!important;
		  cursor: pointer;
		}
		form .stars label:hover ~ span {
		  background-position: 0 -30px;
		}
		form .stars label.star-5:hover ~ span {
		  width: 100% !important;
		}
		form .stars label.star-4:hover ~ span {
		  width: 80% !important;
		}
		form .stars label.star-3:hover ~ span {
		  width: 60% !important;
		}
		form .stars label.star-2:hover ~ span {
		  width: 40% !important;
		}
		form .stars label.star-1:hover ~ span {
		  width: 20% !important;
		}
		form .stars span {
		  display: block;
		  width: 0;
		  position: relative;
		  top: 0;
		  left: 0;
		  height: 30px;
		  background: url("/../img/stars.png") repeat-x 0 -60px;
		  -webkit-transition: -webkit-width 0.5s;
		  -moz-transition: -moz-width 0.5s;
		  -ms-transition: -ms-width 0.5s;
		  -o-transition: -o-width 0.5s;
		  transition: width 0.5s;
}
 </style>
<script type="text/javascript">
	var d = document.getElementById("reacties");
	d.className += "active";
</script>

@stop
