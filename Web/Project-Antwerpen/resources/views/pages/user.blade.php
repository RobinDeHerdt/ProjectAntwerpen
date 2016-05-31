@extends('layout')

@section('title')
  Profiel
@stop
@section('content')
<div class="col-md-10 col-md-offset-1">
	<div class="returnlink">
        <a href="/overzicht"> Terug naar overzicht</a>
    </div>
	<h2 style="margin-top:50px;">{{ $user->firstname }} {{  $user->lastname  }}</h2>
	<img id="profielfoto"src="{{$user->profileimage}}">
	<h1>{{ $user->points }} punten</h1>
	<h5>Jouw gegevens:</h5>
	<p>Voornaam: {{ $user->firstname }}</p>
	<p>Achternaam: {{  $user->lastname  }}</p>
	<p>E-mail: {{ $user->email }}</p>

	@if($user->age)
		<p>Leeftijd: {{ $user->age}}</p>
	@endif

	@if($user->gender_1male_2female == 1)
		<p>Geslacht: Man</p>
	@elseif ($user->gender_1male_2female == 2)
		<p>Geslacht: Vrouw</p>
	@endif

	@if($user->postalcode)
		<p>Postcode: {{$user->postalcode}}</p>
	@endif

	@if($user->created_at)
		<p>Geregistreerd op: {{$user->created_at}}</p>
	@endif

	<a href="/bewerkprofiel">Bewerk deze gegevens</a>

	@if($user->isAdmin)
	<div id="adminpaneel">
	<h1>Administratorpaneel</h1>
		<div class="adminwindow">
			<h3>Quizvragen</h3>
			<a href="/nieuwequizvraag">Maak quizvragen aan voor de mobiele applicatie</a><br>
			<a href="/verwijderquizvraag">Verwijder quizvragen van de mobiele applicatie</a>
			
		</div>
		<div class="adminwindow">
			<h3>Meningvragen</h3>
			
			<a href="/nieuwemeningvraag">Maak meningvragen aan voor de mobiele applicatie</a><br>
			<a href="/verwijdermeningvraag">Verwijder meningvragen van de mobiele applicatie</a>
		</div>
		<div class="adminwindow">
			<h3>Projecten</h3>
			
			<a href="/nieuwproject">Maak een project aan voor de website</a><br>
			<a href="/overzicht">Verwijder, kopieer of bewerk projecten vanuit de overzichtspagina</a>
		</div>
	</div>
	@endif
</div>
@endsection
