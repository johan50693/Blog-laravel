<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> @yield ('title','Default') Panel de administración </title>
	<link rel="stylesheet" href={{ asset('plugins/bootstrap/css/bootstrap.css') }}>
</head>
<body>
	
	@include('admin.templates.partial.nav')

	<section>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class=" panel-heading">
							@yield ('title','')
						</div>
						<div class=" panel-body">
							@include('flash::message')
							@include('admin.templates.partial.errors')
							@yield('content','')
						</div>
					</div>
				</div>
			</div>
		</div>
		

	</section>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<p> Mi Blog Derechos Reservados</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

	<script src={{ asset('plugins/jquery/js/jquery-3.1.1.min.js') }} ></script>
	<script src={{ asset('plugins/bootstrap/js/bootstrap.js') }} ></script>
</body>
</html>