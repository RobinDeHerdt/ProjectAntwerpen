
@foreach ($content as $data)
	{{ $data["title"] }}
	{{ $data["info"] }}
	{{ $data["icon"] }}
	{{ $data["startdate"] }}
	{{ $data["enddate"] }}
@endforeach
