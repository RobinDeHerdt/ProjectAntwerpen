@extends('layout')

@section('title')
  Meningen
@stop
@extends('navigation-layout')
@section('content')
<link rel="stylesheet" href="/css/donut-graph.css">

<h1 id="meningvraag"></h1>

<div class="chart-wrapper">
  <button onclick='prev();replay();' class="prevbutton" type="button" name="button">Prev</button>
<button onclick='next();replay();' class="nextbutton" type="button" name="button" href="questions_json">Next</button>
<input type="button" id="Graphdata" name="Graphdata" value="{{json_encode($questions)}}">


</div>




<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="/js/donutgraph.js" ></script>



<script type="text/javascript">
var d = document.getElementById("meningen");
d.className += " active";
</script>
@stop
