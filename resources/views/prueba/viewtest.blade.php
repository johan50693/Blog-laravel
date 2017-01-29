
	
	<h1>{{ $prueba -> title }}</h1>

	<br>

@foreach($prueba->tags as $tag)

	{{ $tag-> name }}

@endforeach
