<!DOCTYPE html>
<html>
<head>
	<title>OURCESU : Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
		<div class="header">
			<nav class="navbar navbar-inverse navbar-static-top">
			  <div class="container-fluid">
			    <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span> 
			    </button>
			    <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">Dashboard</a>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav">
			      <li><a href="{{ url('/admin/pages') }}"><span class="glyphicon glyphicon-file"></span>&nbsp;Pages</a></li>
			      <li><a href="{{ url('/admin/images') }}"><span class="glyphicon glyphicon-picture"></span>&nbsp;Images</a></li>
			      <li><a href="{{ url('/admin/git') }}"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;Git Pull</a></li>
			      <li><a href="{{ url('/laravel-filemanager') }}" target="_blank"><span class="glyphicon glyphicon-modal-window"></span>&nbsp;File Manager</a></li>
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
				<h1>Upload Banner Images</h1>
				<h5>Logged in as 
				<b>
				{{ \Auth::guard('admin')->user()->email }}
				</b>
				</h5>
			</div>
			<div class="container">
				<div class="dashboard-panel">
					<div class="row">
						<div class="col-md-12">
							
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>