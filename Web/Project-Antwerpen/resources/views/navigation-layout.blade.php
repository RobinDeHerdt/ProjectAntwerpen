@section('navigation-layout')
<ul class="nav nav-tabs" style="width:100%">
    <li><a href="{{ url('/tijdlijn') }}">Tijdlijn</a></li>
    <li><a href="{{ url('/uitleg') }}">Uitleg</a></li>
    <li><a href="{{ url('/map') }}">Map</a></li>
    <li><a href="{{ url('/stemmen') }}">Stemmen</a></li>
    <li><a href="{{ url('/comments') }}">Comments</a></li>
  </ul>

  <style type="text/css">
  
  li {
    width:20%;
    text-align: center;
  }
  </style>
 @stop