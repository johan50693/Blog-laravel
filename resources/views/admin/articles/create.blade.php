@extends('admin.templates.main')

@section('title', 'Agregar Articulo')

@section('content')

	{!! Form::open(['route' => 'articles.store', 'method' => 'POST' , 'files' => 'true']) !!}

		<div class="form-group">
				{!! Form::label('title', 'Titulo') !!}
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título del artículo', 'required']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('category_id', 'Categoria') !!}
				{!! Form::select('category_id', $categories,null, ['class' => 'form-control', 'placeholder' => 'Título del artículo', 'required']) !!}
		</div>
	
		<div class="form-group">
			{!! Form::label('content', 'Contenido') !!}
			{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
				{!! Form::label('tags', 'Tag') !!}
				{!! Form::select('tags', $tags,null, ['class' => 'form-control', 'multiple', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('image', 'Imagen') !!}
			{!! Form::file('image') !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Agregar Artículo', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}


@endsection