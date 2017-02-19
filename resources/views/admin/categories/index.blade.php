@extends('admin.templates.main')

@section('title', 'Lista de Categorias')

@section('content')

<a href="{{ url('admin/categories/create')}}" class="btn btn-info center-block"> Crear Categoría</a><br>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>

			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id}}</td>
				<td>{{ $category->name}}</td>
				<td>
						<a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
							<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
						</a> 
						<a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-danger" onclick="return confirm('¿Desea Borrar esta categoría?')">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						</a>
			   </td>
			</tr>


			@endforeach
		</tbody>
	</table>
	{{ $categories->links() }}
@endsection