@extends('layout')

@section('title')
  Profiel
@stop


@section('content')

<div>
	<h3>{{ $user->firstname }} {{  $user->lastname  }}</h3>
	<img src="{{$user->profileimage}}">
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
</div>

@endsection
