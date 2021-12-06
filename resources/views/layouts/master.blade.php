<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}" />
	<link rel="stylesheet" href="{{ asset('/assets/css/screen.css') }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	@yield("head")
</head>
	<body>
        @yield("content")
		

		<script src="{{ asset('/assets/js/main.js') }}"></script>
	</body>
</html>
