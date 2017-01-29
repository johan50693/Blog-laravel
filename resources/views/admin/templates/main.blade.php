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

		@yield('content','')

	</section>

	<script src={{ asset('plugins/jquery/js/jquery-3.1.1.min.js') }} ></script>
	<script src={{ asset('plugins/bootstrap/js/bootstrap.js') }} ></script>
</body>
</html>