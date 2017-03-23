@extends('admin.templates.main')

@section('title','Lista de Tags')


@section('content')

	<a href="{{ route('tags.create') }}" class="btn btn-info center-block">Crear Tag</a>

	<!-- Buscador de Tags-->

	{!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}

		<div class="input-group">
		   
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar' , 'aria-describedby'=> 'search']) !!}
			 <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>

		</div>
	{!! Form::close() !!}

	<!-- Fin del Buscador de Tags-->
			
	

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>


		@foreach($tags as $tag )
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				<td>
					
					<a href="{{ route('tags.edit',$tag) }}" class="btn btn-warning">
							<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
						</a> 
						<a href="{{ route('admin.tags.destroy',$tag->id) }}" class="btn btn-danger" onclick="return confirm('¿Desea Borrar esta categoría?')">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>

				</td>
			</tr>


		@endforeach

		</tbody>
	</table>
	{{ $tags->links() }}
@endsection