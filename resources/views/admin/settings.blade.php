<!DOCTYPE html>
<html>
<head>
	<title>OURCESU : Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
		<div class="header">
			<nav class="navbar navbar-inverse navbar-static-top">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">Dashboard</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav">
			      <li><a href="{{ url('/admin/pages') }}"><span class="glyphicon glyphicon-file"></span>&nbsp;Pages</a></li>
			      <li><a href="{{ url('/admin/images') }}"><span class="glyphicon glyphicon-picture"></span>&nbsp;Images</a></li>
			      <li><a href="{{ url('/admin/git') }}"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Git Pull</a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="{{ url('/admin/settings') }}"><span class="glyphicon glyphicon-cog"></span>&nbsp;Settings</a></li>
			      <li><a href="{{ url('/admin/logout') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Logout</a></li>
			    </ul>
			    </div>
			  </div>
			</nav>
		</div>
	
		<div class="content">
			<div class="container">
				<h1>Settings</h1>
				<h5>Logged in as 
				<b>
					{{ \Auth::guard('admin')->user()->email }}
				</b>
				</h5>
			</div>
			<div class="container">
				<div class="dashboard-panel">
				<div class="row">
					<div class="col-md-4">
						<div class="password_img">
							<img src="{{ URL::asset('images/fingerprint.png') }}" class="img-responsive center-block" />
						</div>
					</div>
					<div class="col-md-8">
						<h4>Change Password</h4>
						<hr>
						<div class="row">
							<div class="col-md-5">
							{!! Form::open(array('route' => 'adminchangepwd','method'=>'POST')) !!}
							{!! Form::password('password', array('class' => 'form-control password input-sm','placeholder'=>'Current Password','id'=>'old_password')) !!} 
							<br>
							{!! Form::password('password', array('class' => 'form-control password input-sm','placeholder'=>'New Password','id'=>'new_password')) !!}
							<br>
							{!! Form::submit('&nbsp;&nbsp;SAVE&nbsp;&nbsp;', array('class' => 'btn btn-danger btn-sm login-btn','name'=>'save','id'=>'pwd_save')) !!}
							{!! Form::close() !!}
							</div>
						</div>

					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col-md-4">
					<br>
						<div class="account_img">
							<img src="{{ URL::asset('images/key.png') }}" class="img-responsive center-block">
						</div>
					</div>
					<div class="col-md-8">
						<h4>Add A New User</h4>
						<hr>
						<div class="row">
							<div class="col-md-5">
								{!! Form::open(array('route' => 'adduser','method'=>'POST')) !!}
								{!! Form::text('email',null, array('class' => 'form-control input-sm','placeholder'=>'Email','id'=>'New Email')) !!}
								<br>
								{!! Form::password('password', array('class' => 'form-control password input-sm','placeholder'=>'New Password','id'=>'user_password')) !!}
								<br>
								{!! Form::submit('&nbsp;&nbsp;SAVE&nbsp;&nbsp;', array('class' => 'btn btn-danger btn-sm login-btn','name'=>'save','id'=>'pwd_save')) !!}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
					
				</div>	
				</div>
			</div>
		</div>
</body>
</html>