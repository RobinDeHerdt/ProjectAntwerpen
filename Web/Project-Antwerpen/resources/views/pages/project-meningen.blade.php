@extends('layout')

@section('title')
  Meningen
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" href="/css/donut-graph.css">

<h1>Dit is een mening MeningVraag?</h1>

<div class="chart-wrapper">
  <button onclick='replay()' class="prevbutton" type="button" name="button">Prev</button>
<button onclick='replay()' class="nextbutton" type="button" name="button">Next</button>
</div>




<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="/js/donutgraph.js" ></script>



<script type="text/javascript">
var d = document.getElementById("meningen");
d.className += " active";
</script>
@stop
