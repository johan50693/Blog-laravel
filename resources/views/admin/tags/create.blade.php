@extends('admin.templates.main')

@section('title','Agregar Tag')

@section('content')

		{!! Form::open(['route'	=>	'tags.store', 'method'	=>	'POST']) !!}

		<div class="form-group">
			{!! Form::label('name', 'Nombre') !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Tag', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}

@endsection