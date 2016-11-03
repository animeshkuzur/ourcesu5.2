<!DOCTYPE html>
<html lang="en">
	<head>
	@include('include.head')
	@yield('style')
	</head>
	<body>
		@include('include.header')
		@include('include.banner')
		@yield('content')
		@include('include.icons')
		@include('include.footer')
		@include('include.scripts')
		@yield('script')
	</body>
</html>