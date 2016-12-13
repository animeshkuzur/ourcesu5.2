<!DOCTYPE html>
<html>
<head>
	<title>OURCESU : Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ URL::asset('dist/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<!--<link href="{{ URL::asset('dist/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css">-->
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-1">
				<div class="back-btn">
				<a href="{{ url('/admin/dashboard') }}">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				</div>
			</div>
			<div class="col-xs-10">
				
			</div>
			<div class="col-xs-1">
				<a href="">
					<span class=""></span>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-xs-12">
						<div class="admin-loginpanel-logo">
							<img src="{{ URL::asset('images/Git-Logo.png') }}" class="img-responsiven center-block">
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<div class="admin-loginpanel">
						@if($errors)
							@if(count($errors))
								@foreach($errors->all() as $error)	
									<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									{{ $error }}
									</div>
								@endforeach				
							@endif
						@endif
						<h4>Git Pull Request</h4>
						<hr>
						{!! Form::open(array('route' => 'gitupdate','method'=>'POST')) !!}
						{!! Form::text('giturl', null, array('class' => 'form-control email','placeholder'=>'Git URL','id'=>'giturl')) !!}
						<br>
						{!! Form::submit('&nbsp;&nbsp;PULL&nbsp;&nbsp;', array('class' => 'btn btn-danger login-btn btn-block','name'=>'login','id'=>'login')) !!}

						@if(!empty($output))
							<hr>
							<div class="output">
								@foreach($output as $out)
									{{$out}}
								@endforeach
							</div>
						@else
							<br>
						@endif
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/bootstrap.min.js') }}"></script>
</body>
</html>