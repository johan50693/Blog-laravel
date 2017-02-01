
@extends('admin.templates.main')

@section('title', 'Mostrar Usuarios')

@section('content')

	<a href="{{ url('admin/users/create')}}" class="btn btn-info center-block"> Registrar Usuario</a><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Tipo</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					
					<td>

					@if($user->type == 'admin')

						<span class="label label-danger">{{ $user->type}}</span>
					@else

						<span class="label label-primary">{{ $user->type}}</span>
					@endif

					</td>

					<td><a href="" class="btn btn-danger"></a> <a href="" class="btn btn-primary"></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
{{ $users->links() }}
@endsection