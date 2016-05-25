@extends('layout')

@section('title')
  Meningen
@stop
@extends('navigation-layout')
@section('content')


<link rel="stylesheet" href="/css/donut-graph.css">
<button onclick='replay()'>Replay</button>
<div class="chart-wrapper"></div>

<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="/js/donutgraph.js" ></script>



<script type="text/javascript">
var d = document.getElementById("meningen");
d.className += " active";
</script>
	Meningen
@stop
