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
				<a href="{{ url('/') }}">
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
							<img src="{{ URL::asset('images/logo.png') }}" class="img-responsiven center-block">
						</div>
					</div>
				</div>
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
						<h4>Admin Login</h4>
						<hr>
						{!! Form::open(array('route' => 'adminvalidate','method'=>'POST')) !!}
						{!! Form::text('email', null, array('class' => 'form-control email','placeholder'=>'Email','id'=>'email')) !!}
						<br>
						{!! Form::password('password', array('class' => 'form-control password','placeholder'=>'Password','id'=>'password')) !!}
						<br>
						<a href="#" class="btn btn-default cancel-btn">&nbsp;Cancel&nbsp;</a>
						{!! Form::submit('&nbsp;&nbsp;Login&nbsp;&nbsp;', array('class' => 'btn btn-danger login-btn','name'=>'login','id'=>'login')) !!}
						<br><br>
						<label>{!! Html::linkRoute('forgot', 'Forgot your password?') !!}</label>			
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